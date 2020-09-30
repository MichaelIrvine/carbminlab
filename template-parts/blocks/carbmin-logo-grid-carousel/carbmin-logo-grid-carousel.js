(function ($) {
  /**
   * initializeBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date    15/4/19
   * @since   1.0.0
   *
   * @param   object $block The block jQuery element.
   * @param   object attributes The block attributes (only available when editing).
   * @return  void
   */
  var initializeBlock = function ($block) {
    $block.find('.logo_carousel_slide').slick({
      dots: false,
      infinite: false,
      autoplay: false,
      initialSlide: 0,
      speed: 300,
      slidesToShow: 5,
      centerMode: false,
      adaptiveHeight: true,
      setPosition: true,
      arrows: true,
      prevArrow: '.slick-button-prev',
      nextArrow: '.slick-button-next',

      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            adaptiveHeight: true,
          },
        },
      ],
    });
  };

  // Initialize each block on page load (front end).
  $(document).ready(function () {
    $('.carbmin-logo-grid-carousel').each(function () {
      initializeBlock($(this));
    });
  });

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction(
      'render_block_preview/type=carbmin-logo-grid-carousel',
      initializeBlock
    );
  }
})(jQuery);
