'use strict';

import { Controller } from '@hotwired/stimulus';
import hljs from 'highlight.js';
import 'highlight.js/styles/nord.min.css';

export default class extends Controller {
  static targets = ['output'];

  connect() {
    console.log('connect');
  }
  onMessage({detail}) {
    if (Number.isInteger(detail.remaining)) {
      this.outputTarget.innerText = detail.remaining;
    }
  }
}
