const searchToggle = () => {
  const openSearchBar = document.querySelector('#open-search-bar');
  const searchBar = document.querySelector('.header-widget-area');

  // toggle search bar
  openSearchBar.addEventListener('click', () => {
    searchBar.classList.toggle('is-active');
  });
};

export default searchToggle;
