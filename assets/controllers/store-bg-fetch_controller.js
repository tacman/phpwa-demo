'use strict';

import { Controller } from '@hotwired/stimulus';
import 'highlight.js/styles/nord.min.css';

export default class extends Controller {
  static targets = ['missing', 'cached', 'progress', 'progressBar'];

  connect () {
    this.missingTargets.forEach((element) => {
      element.classList.add('hidden');
    });
    this.cachedTargets.forEach((element) => {
      element.classList.add('hidden');
    });
    this.progressTargets.forEach((element) => {
      element.classList.add('hidden');
    });
  }
  onCache = async () => {
    this.missingTargets.forEach((element) => {
      element.classList.add('hidden');
    });
    this.cachedTargets.forEach((element) => {
      element.classList.remove('hidden');
    });
    this.progressTargets.forEach((element) => {
      element.classList.add('hidden');
    });
  }
  onMissing = async () => {
    this.missingTargets.forEach((element) => {
      element.classList.remove('hidden');
    });
    this.cachedTargets.forEach((element) => {
      element.classList.add('hidden');
    });
    this.progressTargets.forEach((element) => {
      element.classList.add('hidden');
    });
  }

  onFailure = async ({detail}) => {
    this.missingTargets.forEach((element) => {
      element.classList.remove('hidden');
    });
    this.cachedTargets.forEach((element) => {
      element.classList.add('hidden');
    });
    this.progressTargets.forEach((element) => {
      element.classList.add('hidden');
    });
  }

  onProgress = async ({detail}) => {
    this.missingTargets.forEach((element) => {
      element.classList.add('hidden');
    });
    this.cachedTargets.forEach((element) => {
      element.classList.add('hidden');
    });
    this.progressTargets.forEach((element) => {
      element.classList.remove('hidden');
    });
    if (detail.downloadTotal && detail.downloaded && detail.downloadTotal > 0  && detail.downloaded > 0) {
      this.progressBarTargets.forEach((element) => {
      element.style.width = (detail.downloaded / detail.downloadTotal) * 100 + '%';
      element.innerText = Math.round(detail.downloaded / detail.downloadTotal * 100) + '%';
      });
    }
  }
}
