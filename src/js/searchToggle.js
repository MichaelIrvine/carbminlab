const searchToggle = () => {
  const header = document.querySelector('.inner-header__container');
  const openSearchBar = document.querySelector('#open-search-bar');
  const searchBar = document.querySelector('.header-widget-area');
  const menuToggleButton = document.querySelector('.menu-toggle');

  // toggle search bar
  openSearchBar.addEventListener('click', () => {
    searchBar.classList.toggle('is-active');

    // Toggle ARIA Pressed attribute
    if (openSearchBar.getAttribute('aria-pressed') === 'true') {
      openSearchBar.setAttribute('aria-pressed', 'false');
    } else {
      openSearchBar.setAttribute('aria-pressed', 'true');
    }

    if (searchBar.classList.contains('is-active')) {
      menuToggleButton.disabled = true;
      menuToggleButton.setAttribute('aria-disabled', 'true');
    } else {
      menuToggleButton.disabled = false;
      menuToggleButton.setAttribute('aria-disabled', 'false');
    }
  });

  document.addEventListener('click', (e) => {
    const isHeader = header.contains(e.target);
    const isSearchBar = searchBar.contains(e.target);

    if (
      !isSearchBar &&
      !isHeader &&
      searchBar.classList.contains('is-active')
    ) {
      searchBar.classList.remove('is-active');

      // Toggle ARIA Pressed attribute
      if (openSearchBar.getAttribute('aria-pressed') === 'true') {
        openSearchBar.setAttribute('aria-pressed', 'false');
      } else {
        openSearchBar.setAttribute('aria-pressed', 'true');
      }

      if (searchBar.classList.contains('is-active')) {
        menuToggleButton.disabled = true;
        menuToggleButton.setAttribute('aria-disabled', 'true');
      } else {
        menuToggleButton.disabled = false;
        menuToggleButton.setAttribute('aria-disabled', 'false');
      }
    }
  });
};

export default searchToggle;
