const fixedHeader = () => {
  const header = document.querySelector('.site-header');
  const searchBar = document.querySelector('.header-widget-area');
  const smallScreenMenu = document.querySelector('.nav-menu');
  const subMenus = document.querySelectorAll('.sub-menu');

  if (header.classList.contains('fixed')) {
    let headerHeight = header.clientHeight;
    let searchBarHeight = searchBar.clientHeight;
    let smallScreenMenuPos = headerHeight + searchBarHeight;

    // Adjust body top padding to account for Fixed Header
    document.body.style.paddingTop = `${headerHeight}px`;
    // Top position for menu on small screens
    smallScreenMenu.style.top = `${smallScreenMenuPos}px`;
    // Top position for Sub Menu on larger screens
    subMenus.forEach((subMenu) => {
      subMenu.style.top = `${headerHeight}px`;
    });
  }
};

export default fixedHeader;
