import Tooltip from 'tooltip.js';

export default {
  init() {
    // JavaScript to be fired on all pages

    const menuItems = document.querySelectorAll('.menu-item.has-submenu');

    menuItems.forEach( item => {
        let submenu = item.nextElementSibling;

        new Tooltip(item, {
            title: submenu,
            placement: 'bottom',
            html: true,
            offset: 10,
        });
    })
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
