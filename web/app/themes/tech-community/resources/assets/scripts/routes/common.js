import Tippy from 'tippy.js';

export default {
  init() {
    const menuItems = document.querySelectorAll('.menu-item.has-submenu');

    menuItems.forEach( item => {
        let submenu = item.nextElementSibling;
        /* eslint-disable */

        let t = Tippy(item, {
          position: 'bottom',
          interactive: true,
          arrow: true,
          html: submenu,
          performance: true,
          theme: 'light',
        });
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};