const accessibleDropDown = () => {
  const dropDownLink = document.querySelectorAll('.menu-item-has-children > a');

  dropDownLink.forEach((link) => {
    const buttonEl = `<button class="drop-down-btn">
    <svg xmlns="http://www.w3.org/2000/svg" data-name="drop-down-arrow" viewBox="0 0 100 125" width="16px" height="16px">
    <path d="M45.17 64.83a4 4 0 005.66 0l29-29a4 4 0 00-5.66-5.66L48 56.34 21.83 30.17a4 4 0 10-5.66 5.66z" fill="#00053e"/>
    </svg>
    </button>`;

    link.insertAdjacentHTML('afterend', buttonEl);
  });

  document.querySelectorAll('.drop-down-btn').forEach((btn) => {
    const subMenu = btn.nextElementSibling;
    const subMenuLinks = subMenu.querySelectorAll('a');
    const lastLinkIndex = subMenuLinks.length - 1;
    const lastLink = subMenuLinks[lastLinkIndex];
    btn.setAttribute('aria-haspopup', 'true');
    btn.setAttribute('aria-expanded', 'false');

    // Open menu if user hits enter or space
    btn.addEventListener('keydown', function (e) {
      if (e.keyCode === 13 || e.keyCode === 32) {
        toggleAriaExpanded();
        btn.nextElementSibling.classList.toggle('sub-menu__open');
      }

      // If user tabs backwards past Top Nav item with submenu
      // remove sub-menu__open class and toggle aria-expanded
      // reset btn-disabled
      if (e.shiftKey && e.keyCode === 9) {
        toggleAriaExpanded();
        btn.nextElementSibling.classList.remove('sub-menu__open');
        // Reset Link State
        btn.classList.replace('btn-enabled', 'btn-disabled');
      }
    });

    // If user is at last btn in submenu and is not tabbing backwards
    // remove sub-menu__open class and toggle aria-expanded
    // reset btn-disabled
    lastLink.addEventListener('keydown', function (e) {
      if (!e.shiftKey && e.keyCode === 9) {
        btn.nextElementSibling.classList.remove('sub-menu__open');
        toggleAriaExpanded();
        // Reset Link State
        btn.classList.replace('btn-enabled', 'btn-disabled');
      }
    });

    // aria-expanded toggle
    function toggleAriaExpanded() {
      if (btn.getAttribute('aria-expanded') === 'true') {
        btn.setAttribute('aria-expanded', 'false');
      } else {
        btn.setAttribute('aria-expanded', 'true');
      }
    }
  });
};

export default accessibleDropDown;
