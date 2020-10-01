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
    console.log($block);
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
      prevArrow: `<button type="button" class="slick-button-prev">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 668">
          <path
            d="M12 304L304 12c17-16 43-16 59 0s16 42 0 59L100 334l263 263c16 16 16 43 0 59s-42 16-59 0L12 363c-16-16-16-42 0-59z"
            fill="#ffffff" />
        </svg>
      </button>`,
      nextArrow: `<button type="button" class="slick-button-next">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 668">
          <path
            d="M363 364L71 656c-17 16-43 16-59 0s-16-42 0-59l263-263L12 71C-4 55-4 28 12 12s42-16 59 0l292 293c16 16 16 42 0 59z"
            fill="#ffffff" />
        </svg>
      </button>`,

      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 4,
          },
        },
        {
          breakpoint: 980,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 400,
          settings: {
            arrows: false,
            slidesToShow: 1,
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
