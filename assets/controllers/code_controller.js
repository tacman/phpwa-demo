'use strict';

import { Controller } from '@hotwired/stimulus';
import hljs from 'highlight.js';
import 'highlight.js/styles/nord.min.css';

export default class extends Controller {
  connect() {
      hljs.highlightElement(this.element);
  }
}
