const searchToggle = () => {
  const openSearchBar = document.querySelector('#open-search-bar');
  const searchBar = document.querySelector('.header-widget-area');

  // toggle search bar
  openSearchBar.addEventListener('click', () => {
    searchBar.classList.toggle('is-active');

    // Toggle ARIA Pressed attribute
    if (openSearchBar.getAttribute('aria-pressed') === 'true') {
      openSearchBar.setAttribute('aria-pressed', 'false');
    } else {
      openSearchBar.setAttribute('aria-pressed', 'true');
    }
  });
};

export default searchToggle;
