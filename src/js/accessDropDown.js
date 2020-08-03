const accessDropDown = () => {
  const dropDownLink = document.querySelectorAll('.menu-item-has-children > a');

  dropDownLink.forEach((link) => {
    const subMenu = link.nextElementSibling;
    const subMenuLinks = subMenu.querySelectorAll('a');
    const lastLinkIndex = subMenuLinks.length - 1;
    const lastLink = subMenuLinks[lastLinkIndex];
    link.setAttribute('aria-haspopup', 'true');
    link.setAttribute('aria-expanded', 'false');
    // class to prevent link redirect
    link.classList.add('link-disabled');

    // Prevent Dropdown Parent Link from going somewhere
    link.addEventListener('click', function (e) {
      if (this.classList.contains('link-disabled')) {
        e.preventDefault();
      }
      link.classList.replace('link-disabled', 'link-enabled');
    });

    // Open menu if user hits enter or space
    link.addEventListener('keydown', function (e) {
      if (e.keyCode === 13 || e.keyCode === 32) {
        toggleAriaExpanded();
        link.nextElementSibling.classList.add('sub-menu__open');
      }

      // If user tabs backwards past Top Nav item with submenu
      // remove sub-menu__open class and toggle aria-expanded
      // reset link-disabled
      if (e.shiftKey && e.keyCode === 9) {
        toggleAriaExpanded();
        link.nextElementSibling.classList.remove('sub-menu__open');
        // Reset Link State
        link.classList.replace('link-enabled', 'link-disabled');
      }
    });

    // If user is at last link in submenu and is not tabbing backwards
    // remove sub-menu__open class and toggle aria-expanded
    // reset link-disabled
    lastLink.addEventListener('keydown', function (e) {
      if (!e.shiftKey && e.keyCode === 9) {
        link.nextElementSibling.classList.remove('sub-menu__open');
        toggleAriaExpanded();
        // Reset Link State
        link.classList.replace('link-enabled', 'link-disabled');
      }
    });

    // aria-expanded toggle
    function toggleAriaExpanded() {
      if (link.getAttribute('aria-expanded') === 'true') {
        link.setAttribute('aria-expanded', 'false');
      } else {
        link.setAttribute('aria-expanded', 'true');
      }
    }
  });
};

export default accessDropDown;
