'use strict';

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static targets = ['video', 'canvas', 'snapshot', 'startButton', 'stopButton', 'alert'];
  static values = {
    rate: { type: Number, default: 100 },
  }

  ctx = null;
  media = null;
  intervalId = null;

  connect () {
    document.addEventListener('pwa--barcode-detection:unsupported', () => this.unsupported());
    document.addEventListener('pwa--barcode-detection:detected', ({detail: barcodes}) => this.drawDetections(barcodes));
  }

  disconnect () {
    document.removeEventListener('pwa--barcode-detection:unsupported', () => this.unsupported());
    document.removeEventListener('pwa--barcode-detection:detected', ({detail: barcodes}) => this.drawDetections(barcodes));
  }

  unsupported = () => {
    this.canvasTarget.setAttribute('hidden', '');
    this.startButtonTarget.setAttribute('hidden', '');
    this.stopButtonTarget.setAttribute('hidden', '');
    this.alertTarget.removeAttribute('hidden');
  }

  start = async () => {
    this.media = await navigator.mediaDevices.getUserMedia({video: { facingMode: "environment" }, audio: false});
    this.videoTarget.srcObject = this.media;
    this.intervalId = setInterval(() => this.updateImage(), this.rateValue);
    if (this.ctx === null) {
      this.ctx = this.canvasTarget.getContext('2d');
    }
    this.canvasTarget.removeAttribute('hidden');
  }

   stop = async() => {
    clearInterval(this.intervalId);
    if (this.media !== null) {
      this.media.getTracks().forEach(track => track.stop());
      this.media = null;
      this.videoTarget.srcObject = null;
    }
    this.canvasTarget.setAttribute('hidden', '');
  }

  updateImage = () => {
    this.canvasTarget.width = this.videoTarget.videoWidth;
    this.canvasTarget.height = this.videoTarget.videoHeight;
    this.ctx.drawImage(this.videoTarget, 0, 0);
    this.snapshotTarget.src = this.canvasTarget.toDataURL('image/png');
    this.application.getControllerForElementAndIdentifier(this.element, 'pwa--barcode-detection').detect({params: {target: this.snapshotTarget}});
  }

  drawDetections = (barcodes) => {
    if (barcodes.length === 0) {
      return;
    }
    for (const barcode of barcodes) {
      const { cornerPoints, boundingBox, rawValue, format } = barcode;
      const valueToDisplay = `${rawValue}`

      if (cornerPoints.length >= 4) {
        this.ctx.strokeStyle = 'lime';
        this.ctx.lineWidth = 2;
        this.ctx.beginPath();
        this.ctx.moveTo(cornerPoints[0].x, cornerPoints[0].y);
        for (let i = 1; i < cornerPoints.length; i++) {
          this.ctx.lineTo(cornerPoints[i].x, cornerPoints[i].y);
        }
        this.ctx.closePath();
        this.ctx.stroke();
      }

      this.ctx.fillStyle = 'red';
      for (const point of cornerPoints) {
        this.ctx.beginPath();
        this.ctx.arc(point.x, point.y, 3, 0, 2 * Math.PI);
        this.ctx.fill();
      }

      const padding = 4;
      const fontSize = 16;
      this.ctx.font = `${fontSize}px sans-serif`;

      const valueText = rawValue;
      const formatText = `[${format}]`;

      const valueWidth = this.ctx.measureText(valueText).width;
      const formatWidth = this.ctx.measureText(formatText).width;

      const boxX = boundingBox.x;
      const topY = boundingBox.y - fontSize - padding;
      const bottomY = boundingBox.y + boundingBox.height + fontSize + padding;

      const finalTopY = topY < 0 ? boundingBox.y + padding + fontSize : topY;
      this.ctx.fillStyle = 'rgba(0, 0, 0, 0.7)';
      this.ctx.fillRect(boxX - padding, finalTopY - fontSize, valueWidth + padding * 2, fontSize + padding / 2);
      this.ctx.fillStyle = 'white';
      this.ctx.fillText(valueText, boxX, finalTopY);

      if (bottomY + fontSize < this.canvasTarget.height) {
        this.ctx.fillStyle = 'rgba(0, 0, 0, 0.7)';
        this.ctx.fillRect(boxX - padding, bottomY - fontSize, formatWidth + padding * 2, fontSize + padding / 2);
        this.ctx.fillStyle = 'white';
        this.ctx.fillText(formatText, boxX, bottomY);
      }
    }
  }
}
