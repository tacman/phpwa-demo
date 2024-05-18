// *** Service Worker *** //
/*
    This is the service worker file. It will be populated with the rules you define in the
    configuration file.
    You can define here custom rules depending on your application needs.
 */
console.log('Service Worker Loaded...');

addEventListener("backgroundfetchsuccess", (event) => {
  const registration = event.registration;
  event.waitUntil(async () => {
    const cache = await caches.open("movies");
    const records = await registration.matchAll();
    const cachePromises = records.map(async (record) => {
      const response = await record.responseReady;
      await cache.put(record.request, response);
    });

    await Promise.all(cachePromises);
    event.updateUI({ title: "Move download complete" });
  });
});
