/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  const siteNavigation = document.getElementById('site-navigation');
  const searchBar = document.querySelector('.header-widget-area');
  const openSearchBar = document.querySelector('#open-search-bar');

  // Return early if the navigation don't exist.
  if (!siteNavigation) {
    return;
  }

  const button = siteNavigation.getElementsByTagName('button')[0];

  // Return early if the button don't exist.
  if ('undefined' === typeof button) {
    return;
  }

  const menu = siteNavigation.getElementsByTagName('ul')[0];

  // Hide menu toggle button if menu is empty and return early.
  if ('undefined' === typeof menu) {
    button.style.display = 'none';
    return;
  }

  if (!menu.classList.contains('nav-menu')) {
    menu.classList.add('nav-menu');
  }

  // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
  button.addEventListener('click', function () {
    siteNavigation.classList.toggle('toggled');

    // Toggle aria expanded
    if (button.getAttribute('aria-expanded') === 'true') {
      button.setAttribute('aria-expanded', 'false');
    } else {
      button.setAttribute('aria-expanded', 'true');
    }

    // Toggle aria disabled
    if (openSearchBar.getAttribute('aria-disabled') === 'true') {
      openSearchBar.setAttribute('aria-disabled', 'false');
      openSearchBar.disabled = false;
    } else {
      openSearchBar.setAttribute('aria-disabled', 'true');
      openSearchBar.disabled = true;
    }

    // display search bar
    searchBar.classList.toggle('is-active');
  });

  // Toggle ARIA Pressed attribute
  const ariaPressedToggle = document.querySelector('[aria-pressed]');

  ariaPressedToggle.addEventListener('click', (e) => {
    let pressed = e.target.getAttribute('aria-pressed') === 'true';
    e.target.setAttribute('aria-pressed', String(!pressed));
  });

  // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
  document.addEventListener('click', function (event) {
    const isClickInsideNav = siteNavigation.contains(event.target);
    const isClickInsideSearch = searchBar.contains(event.target);

    if (
      !isClickInsideNav &&
      !isClickInsideSearch &&
      siteNavigation.classList.contains('toggled')
    ) {
      siteNavigation.classList.remove('toggled');
      button.setAttribute('aria-expanded', 'false');
      // hide search bar
      searchBar.classList.remove('is-active');

      // ARIA
      // Toggle aria expanded
      if (button.getAttribute('aria-expanded') === 'true') {
        button.setAttribute('aria-expanded', 'false');
      } else {
        button.setAttribute('aria-expanded', 'true');
      }
      // Toggle aria pressed
      if (button.getAttribute('aria-pressed') === 'true') {
        button.setAttribute('aria-pressed', 'false');
      } else {
        button.setAttribute('aria-pressed', 'true');
      }
      // Toggle aria disabled
      if (openSearchBar.getAttribute('aria-disabled') === 'true') {
        openSearchBar.setAttribute('aria-disabled', 'false');
        openSearchBar.disabled = false;
      } else {
        openSearchBar.setAttribute('aria-disabled', 'true');
        openSearchBar.disabled = true;
      }
    }
  });

  // Get all the link elements within the menu.
  const links = menu.getElementsByTagName('a');

  // Get all the link elements with children within the menu.
  const linksWithChildren = menu.querySelectorAll(
    '.menu-item-has-children > a, .page_item_has_children > a'
  );

  // Toggle focus each time a menu link is focused or blurred.
  for (const link of links) {
    link.addEventListener('focus', toggleFocus, true);
    link.addEventListener('blur', toggleFocus, true);
  }

  // Toggle focus each time a menu link with children receive a touch event.
  // for (const link of linksWithChildren) {
  //   link.addEventListener('touchstart', toggleFocus, false);
  // }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    if (event.type === 'focus' || event.type === 'blur') {
      let self = this;
      // Move up through the ancestors of the current link until we hit .nav-menu.
      while (!self.classList.contains('nav-menu')) {
        // On li elements toggle the class .focus.
        if ('li' === self.tagName.toLowerCase()) {
          self.classList.toggle('focus');
        }
        self = self.parentNode;
      }
    }

    if (event.type === 'touchstart') {
      const menuItem = this.parentNode;
      event.preventDefault();
      for (const link of menuItem.parentNode.children) {
        if (menuItem !== link) {
          link.classList.remove('focus');
        }
      }
      menuItem.classList.toggle('focus');
    }
  }
})();
