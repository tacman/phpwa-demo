// *** Service Worker *** //
/*
    This is the service worker file. It will be populated with the rules you define in the
    configuration file.
    You can define here custom rules depending on your application needs.
 */

registerPushTask(structuredPushNotificationSupport);
//registerPushTask(simplePushNotificationSupport);

registerNotificationAction('google', async () => {
  await clients.openWindow('https://google.com');
});
registerNotificationAction('linkedin', async () => {
  await clients.openWindow('https://linkedin.com');
});
registerNotificationAction('', async () => {
  await clients.openWindow('https://facebook.com');
});
