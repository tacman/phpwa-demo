'use strict';

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static targets = ['message'];

  connect() {
    this.element.addEventListener('pwa--wake-lock:updated', (event) => this.update(event));
  }

  update = ({detail}) => {
    this.messageTarget.innerText = detail.wakeLock ? 'Locked' : 'Unlocked';
  }
}
