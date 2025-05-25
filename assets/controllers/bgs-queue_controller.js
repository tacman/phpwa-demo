'use strict';

import { Controller } from '@hotwired/stimulus';
import hljs from 'highlight.js';
import 'highlight.js/styles/nord.min.css';

export default class extends Controller {
  static targets = ['output'];
  static values = {
    channel: { type: String },
  };

  bc = null;

  connect = () => {
    if (!this.channelValue) {
      this.dispatchEvent('error', { reason: 'No channel provided.' });
      return
    }
    this.bc = new BroadcastChannel(this.channelValue);
    this.bc.onmessage = (event) => this.onMessage(event.data);
    this.bc.postMessage({ type: 'status-request' });
  }

  disconnect = () => {
    if (this.bc !== null) {
      this.bc.close();
    }
  }

  replay = () => {
    this.bc.postMessage({ type: 'replay-request' });
  }

  onMessage({remaining}) {
    if (Number.isInteger(remaining)) {
      this.outputTarget.innerText = remaining;
    }
  }
}
