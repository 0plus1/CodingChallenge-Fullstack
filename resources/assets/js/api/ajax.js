export default class ajax {
  constructor() {
    document.addEventListener('DOMContentLoaded', () => {
      const jsAction = document.querySelectorAll('.js-action');
      jsAction.forEach((link) => {
        const event = link.dataset.event || 'click';
        link.addEventListener(event, (e) => {
          const target = e.target;
          ajax[target.dataset.action](target.dataset.url, target.dataset.param);
        });
      });
    });
  }

  static callapi(url, param) {
    fetch(url, {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
      },
    }).then(response => response.json())
      .then((data) => {
        // Work with JSON data here
        console.table(data[param]);
      })
      .catch((err) => {
        console.error('Could not access metadata');
      });
  }
}
