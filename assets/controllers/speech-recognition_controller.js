'use strict';

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static values = {
    continuous: { type: Boolean, default: false },
    grammarString: { type: String, default: null },
    //grammarUri: { type: String, default: null },
    grammarWeight: { type: Number, default: 1 },
    interimResults: { type: Boolean, default: false },
    lang: { type: String, default: 'en-US' },
    maxAlternatives: { type: Number, default: 1 },
  };
  static targets = ['attributeOutput', 'contentOutput'];

  recognition = null;

  connect() {
    const supported = 'webkitSpeechRecognition' in window || 'SpeechRecognition' in window;
    if (!supported) {
      return;
    }

    this.recognition = new webkitSpeechRecognition() || new SpeechRecognition();
    if (this.grammarStringValue) {
      const speechRecognitionList = new webkitSpeechGrammarList() || new SpeechGrammarList();
      speechRecognitionList.addFromString(this.grammarValue, this.grammarWeightValue);
      this.recognition.grammars = speechRecognitionList;
    }
    this.recognition.continuous = this.continuousValue;
    this.recognition.lang = this.langValue;
    this.recognition.interimResults = this.interimResultsValue;
    this.recognition.maxAlternatives = this.maxAlternativesValue;
    this.recognition.addEventListener('result', this.onResult);
    this.recognition.addEventListener('audiostart', () => {
      this.dispatch('speech-recognition:audiostart');
    });
    this.recognition.addEventListener('audioend', () => {
      this.dispatch('speech-recognition:audioend');
    });
    this.recognition.addEventListener('start', () => {
      this.dispatch('speech-recognition:start');
    });
    this.recognition.addEventListener('end', () => {
      this.dispatch('speech-recognition:end');
    });
    this.recognition.addEventListener('error', (event) => {
      this.dispatch('speech-recognition:error', { error: event.error });
    });
    this.recognition.addEventListener('nomatch', () => {
      this.dispatch('speech-recognition:nomatch');
    });
    this.recognition.addEventListener('soundstart', () => {
      this.dispatch('speech-recognition:soundstart');
    });
    this.recognition.addEventListener('soundend', () => {
      this.dispatch('speech-recognition:soundend');
    });
    this.recognition.addEventListener('speechstart', () => {
      this.dispatch('speech-recognition:speechstart');
    });
    this.recognition.addEventListener('speechend', () => {
      this.dispatch('speech-recognition:speechend');
    });
  }

  start() {
    this.recognition.start();
  }

  stop() {
    this.recognition.stop();
  }

  onResult = (event) => {
    const length = event.results.length;
    for (let i = event.resultIndex; i < length; i++) {
      const speechRecognitionResult = event.results[i];
      const alternatives = speechRecognitionResult.length;
      for (let j = 0; j < alternatives; j++) {
        const transcript = speechRecognitionResult[j].transcript.trim();
        if (transcript === '') {
          continue;
        }
        this.dispatch('speech-recognition:result', { transcript: transcript, isFinal: speechRecognitionResult.isFinal, confidence: speechRecognitionResult[j].confidence });
        this.attributeOutputTargets.forEach((element) => element.setAttribute('data-speech-recognition', transcript));
        this.contentOutputTargets.forEach((element) => element.textContent += transcript+'\n');
      }
    }
  }
}
