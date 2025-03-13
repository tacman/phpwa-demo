'use strict';

import { Controller } from '@hotwired/stimulus';
import Reveal from 'reveal.js';
import Markdown from 'reveal.js/plugin/markdown/markdown.esm.js';
import 'reveal.js/dist/reveal.css';
import 'reveal.js/dist/theme/serif.css';

export default class extends Controller {
  deck = null;
  connect() {
    this.deck = new Reveal({
      plugins: [Markdown],
    });
    this.deck.initialize();
  }

  message({detail}) {
    const {data} = detail;
    if (data.message === 'next') {
      this.next();
    }
    if (data.message === 'previous') {
      this.previous();
    }
  }

  next() {
    this.deck.next();
  }

  previous() {
    this.deck.prev();
  }
}
