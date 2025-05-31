/* ========================================================================
 * DOM-based Routing
 * Project: Thorn by Synmek
 * 
 * Description:
 * This modular front-end routing system runs JavaScript based on the body 
 * classes of each WordPress page. It uses a namespace object (Thorn) where 
 * each key corresponds to a page (e.g. 'home', 'about_us') and fires their 
 * respective init/finalize methods accordingly.
 * 
 * Usage:
 * - Page-specific JS goes inside a matching object under the `Thorn` namespace.
 * - Body classes are automatically converted (e.g., 'about-us' becomes 'about_us').
 * - Use `common` for scripts you want on every page.
 * - You can rename `Thorn` to fit your own project if preferred.
 * 
 * To add your own page:
 * 1. Add a new entry in the `Thorn` object using the page’s body class.
 * 2. Add `init()` and/or `finalize()` methods inside it as needed.
 * 3. WordPress will auto-fire that code on the matching page.
 * 
 * Example:
 * If your body class is `contact-us`, create a `contact_us` key like:
 * 
 * contact_us: {
 *   init() { console.log('Contact page init'); }
 * }
 * 
 * ======================================================================== */

(function($) {

  const Thorn = {
    // Common scripts for all pages
    common: {
      init() {
        // JavaScript to be fired on all pages
        console.log('Common init fired');
      },
      finalize() {
        // JavaScript to be fired on all pages after page-specific init
        console.log('Common finalize fired');
      }
    },

    // Home page
    home: {
      init() {
        console.log('Home init fired');
      },
      finalize() {
        console.log('Home finalize fired');
      }
    },

    // About Us page
    about_us: {
      init() {
        console.log('About Us init fired');
      }
    }
  };

  // Utility for firing the appropriate scripts
  const UTIL = {
    fire(func, funcname = 'init', args) {
      const namespace = Thorn;
      if (
        func !== '' &&
        namespace[func] &&
        typeof namespace[func][funcname] === 'function'
      ) {
        namespace[func][funcname](args);
      }
    },
    loadEvents() {
      UTIL.fire('common');

      $(document.body.className.replace(/-/g, '_').split(/\s+/)).each(function(_, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      UTIL.fire('common', 'finalize');
    }
  };

  // DOM Ready
  $(document).ready(UTIL.loadEvents);

})(jQuery);
