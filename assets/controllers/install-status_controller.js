'use strict';

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static targets = ['button'];
  notInstalled = () => {
    console.log('notInstalled');
    this.element.removeAttribute('hidden');
  }

  installed = () => {
    console.log('installed');
    this.element.setAttribute('hidden', '');
  }
}
