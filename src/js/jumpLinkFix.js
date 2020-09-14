const jumpLinkFix = () => {
  const headers = document.querySelectorAll('h2');

  headers.forEach((header) => {
    if (header.id !== '') {
      header.classList.add('jump-link');
    }
  });
};

export default jumpLinkFix;
