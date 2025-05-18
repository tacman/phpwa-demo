'use strict';

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static targets = ['unavailable', 'list'];

  unavailable = () => {
    this.unavailableTarget.classList.remove('hidden');
  }

  show = ({ detail }) => {
    this.listTarget.classList.remove('hidden');
    this.listTarget.innerHTML = '';
    const { contacts } = detail;

    contacts.forEach(contact => {
      // Noms
      const names = this.deduplicate(contact.name || []);
      const primaryName = names[0] || 'Nom inconnu';
      const otherNamesHtml = names.slice(1).map(n =>
        `<p class="text-sm text-gray-500">${n}</p>`).join('');

      // Emails avec lien mailto:
      const emails = this.deduplicate(contact.email || []);
      const emailsHtml = emails.map(email =>
        `<p class="flex items-center text-sm text-gray-600">
          <span class="mr-2">✉️</span>
          <a href="mailto:${email}" class="hover:underline">${email}</a>
        </p>`).join('');

      // Téléphones formatés
      const phones = this.deduplicatePhones(contact.tel || []);
      const phonesHtml = phones.map(({ raw, formatted }) => {
        return `
          <p class="flex items-center text-sm text-gray-700">
            <span class="mr-2">📞</span>
            <a href="tel:${formatted}" class="hover:underline">${raw}</a>
          </p>`;
      }).join('');

      // Carte contact
      const contactCardHTML = `
        <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition space-y-4">
          <div>
            <h2 class="text-xl font-semibold text-gray-900 flex items-center">
              <span class="mr-2">👤</span>${primaryName}
            </h2>
            ${otherNamesHtml}
          </div>

          <div class="space-y-1 pt-2">
            ${emailsHtml || '<p class="text-sm text-gray-400 italic">Aucune adresse email</p>'}
          </div>

          <div class="pt-3 border-t border-gray-200 space-y-1">
            ${phonesHtml || '<p class="text-sm text-gray-400 italic">Aucun numéro</p>'}
          </div>
        </div>
      `;

      this.listTarget.insertAdjacentHTML('beforeend', contactCardHTML);
    });
  }

  sanitizePhoneNumber(input) {
    return input
      .normalize('NFKD')
      .replace(/[\s().-]/g, '');
  }

  deduplicate(array) {
    return Array.from(new Set(array.map(item => item.trim())));
  }

  deduplicatePhones(rawPhones) {
    const seen = new Set();
    const result = [];

    rawPhones.forEach(raw => {
      const formatted = this.sanitizePhoneNumber(raw);
      if (!seen.has(formatted)) {
        seen.add(formatted);
        result.push({ raw, formatted });
      }
    });

    return result;
  }
}
