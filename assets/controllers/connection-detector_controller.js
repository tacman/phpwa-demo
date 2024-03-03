import { Controller } from '@hotwired/stimulus';

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ['pill', 'description', 'color']

  connect() {
    if (navigator.onLine) {
      this.showOnline();
    } else {
      this.showOffline();
    }

    window.addEventListener("offline", () => {
      this.showOffline();
    });
    window.addEventListener("online", () => {
      this.showOnline();
    });
  }

disconnect() {
    window.removeEventListener("offline");
    window.removeEventListener("online");
  }

  cleanupClasses() {
    this.colorTarget.classList.remove('text-green-800', 'border-green-300', 'bg-green-50', 'dark:text-green-300', 'dark:border-green-800');
    this.colorTarget.classList.remove('text-red-800', 'border-red-300', 'bg-red-50', 'dark:text-red-300', 'dark:border-red-800');
    this.colorTarget.classList.remove('text-yellow-800', 'border-yellow-300', 'bg-yellow-50', 'dark:text-yellow-300', 'dark:border-yellow-800');
  }

  showOnline() {
    this.cleanupClasses();
    this.colorTarget.classList.add('text-green-800', 'border-green-300', 'bg-green-50', 'dark:text-green-300', 'dark:border-green-800');
    this.pillTarget.innerHTML = 'Online';
    this.descriptionTarget.innerHTML = 'You are currently online. You can now continue using the application.';
  }

  showOffline() {
    this.cleanupClasses();
    this.colorTarget.classList.add('text-red-800', 'border-red-300', 'bg-red-50', 'dark:text-red-300', 'dark:border-red-800');
    this.pillTarget.innerHTML = 'Offline';
    this.descriptionTarget.innerHTML = 'You are currently offline. Please check your internet connection and try again.';
  }
}
