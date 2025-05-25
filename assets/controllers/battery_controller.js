'use strict';

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static targets = ['charging', 'level', 'chargingTime', 'dischargingTime'];
  connect() {
    this.element.addEventListener('pwa--battery:updated', (event) => this.update(event));
  }

  update = ({detail}) => {
    const { charging, level, chargingTime, dischargingTime } = detail;
    this.chargingTarget.innerText = charging ? 'Yes' : 'No';
    this.levelTarget.innerText = `${level * 100}%`
    this.chargingTimeTarget.innerText = this.formatSeconds(chargingTime);
    this.dischargingTimeTarget.innerText = this.formatSeconds(dischargingTime);
  }

  formatSeconds = (s) => {
    if (!isFinite(s)) {
      return '∞';
    }

    if (s === 0) {
      return 'done';
    }

    const h = Math.floor(s / 3600).toString().padStart(2, '0');
    const m = Math.floor((s % 3600) / 60).toString().padStart(2, '0');
    const sec = Math.floor(s % 60).toString().padStart(2, '0');
    return `${h}:${m}:${sec}`;
  }
}
