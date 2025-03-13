'use strict';

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  connect() {
    // Envoie événement au PageDown et au PageUp du clavier
    document.addEventListener('keydown', (event) => {
      if (event.key === 'PageDown') {
        document.getElementById('next').click();
      } else if (event.key === 'PageUp') {
        document.getElementById('previous').click();
      }
    });
  }
}
