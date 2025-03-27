'use strict';

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  connect() {
    // Send an event on PageDown or PageUp
    document.addEventListener('keydown', (event) => {
      if (event.key === 'PageDown') {
        document.getElementById('next').click();
      } else if (event.key === 'PageUp') {
        document.getElementById('previous').click();
      }
    });
  }
}
