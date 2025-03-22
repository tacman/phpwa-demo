'use strict';

import { Controller } from '@hotwired/stimulus';
import 'highlight.js/styles/nord.min.css';

export default class extends Controller {
  static targets = ['list'];
  addToList({detail}) {
    const a = document.createElement('a');
    a.href = detail.data;
    a.innerText = detail.data;
    a.target = '_blank';
    a.rel = 'noopener noreferrer nofollow';

    const li = document.createElement('li');
    li.appendChild(a);

    this.listTarget.appendChild(li);
  }
}
