'use strict';

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static targets = ['subscribeButton', 'unsubscribeButton', 'sendButton'];

  connect() {
    document.addEventListener('pwa--web-push:subscribed', () => {
      this.subscribeButtonTarget.setAttribute('hidden', '');
      this.unsubscribeButtonTarget.removeAttribute('hidden');
      this.sendButtonTarget.removeAttribute('hidden');

    });
    document.addEventListener('pwa--web-push:unsubscribed', () => {
      this.subscribeButtonTarget.removeAttribute('hidden');
      this.unsubscribeButtonTarget.setAttribute('hidden', '');
      this.sendButtonTarget.setAttribute('hidden', '');
    });
    document.addEventListener('pwa--web-push:error', () => {
      this.subscribeButtonTarget.removeAttribute('hidden');
      this.unsubscribeButtonTarget.setAttribute('hidden', '');
      this.sendButtonTarget.setAttribute('hidden', '');
    });
    document.addEventListener('pwa--web-push:denied', () => {
      this.subscribeButtonTarget.removeAttribute('hidden');
      this.unsubscribeButtonTarget.setAttribute('hidden', '');
      this.sendButtonTarget.setAttribute('hidden', '');
    });
  }
  async send() {
    const serviceWorkerRegistration = await navigator.serviceWorker.ready;
    const subscription = await serviceWorkerRegistration.pushManager.getSubscription();

    if (!subscription) {
      alert('Please enable push notifications');
      return;
    }

    const supportedContentEncodings = PushManager.supportedContentEncodings || ['aesgcm'];
    const jsonSubscription = subscription.toJSON();

    try {
      await fetch('/notify', {
        method: 'POST',
        body: JSON.stringify({
          ...jsonSubscription,
          supportedContentEncodings,
        }),
        headers: {
          'Content-Type': 'application/json',
        },
      });
    } catch (error) {
      console.error('Failed to send push notification', error);
    }
  }
}
