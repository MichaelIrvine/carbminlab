const accessDropDown = () => {
  const dropDownLink = document.querySelectorAll('.menu-item-has-children > a');

  dropDownLink.forEach((link) => {
    link.setAttribute('aria-haspopup', 'true');
    link.setAttribute('aria-expanded', 'false');

    link.addEventListener('click', function (e) {
      e.preventDefault();
    });

    link.addEventListener('keydown', function (e) {
      if (e.keyCode === 13 || e.keyCode === 32) {
        console.log(link.nextElementSibling);

        if (link.getAttribute('aria-expanded') === 'true') {
          link.setAttribute('aria-expanded', 'false');
        } else {
          link.setAttribute('aria-expanded', 'true');
        }

        link.nextElementSibling.classList.toggle('sub-menu__open');
      }
    });

    if (link.nextElementSibling) {
      const subMenu = link.nextElementSibling;
      const subMenuLinks = subMenu.querySelectorAll('a');
      const lastLinkIndex = subMenuLinks.length - 1;
      const lastLink = subMenuLinks[lastLinkIndex];

      lastLink.addEventListener('blur', function () {
        link.nextElementSibling.classList.remove('sub-menu__open');
        if (link.getAttribute('aria-expanded') === 'true') {
          link.setAttribute('aria-expanded', 'false');
        } else {
          link.setAttribute('aria-expanded', 'true');
        }
      });
    }
  });
};

export default accessDropDown;
