const searchToggle = () => {
  const toggle = document.querySelector('[aria-pressed]');
  const openSearchBar = document.querySelector('#open-search-bar');
  const closeSearchBar = document.querySelector('#close-search-bar');
  const searchBar = document.querySelector('.header-widget-area');

  // Toggle ARIA Pressed attribute
  toggle.addEventListener('click', (e) => {
    let pressed = e.target.getAttribute('aria-pressed') === 'true';
    e.target.setAttribute('aria-pressed', String(!pressed));
  });

  // open search bar
  openSearchBar.addEventListener('click', () => {
    searchBar.classList.add('is-active');

    setTimeout(() => {
      searchBar.classList.add('is-visible');
    }, 50);
  });

  // close search bar
  closeSearchBar.addEventListener('click', () => {
    searchBar.classList.remove('is-visible');
    setTimeout(() => {
      searchBar.classList.remove('is-active');
    }, 50);
  });
};

export default searchToggle;
