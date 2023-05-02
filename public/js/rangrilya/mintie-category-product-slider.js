/**
 * Product category
 *
 * @package mintie
 */

'use strict';

// Product category slider.

(function ($) {
  var categoryProduct = $('.mintie-category-slider-shop');

  categoryProduct.slick({
    slidesToScroll: 1,
    useTransform: false,
    mobileFirst: true,
    responsive: [{
      breakpoint: 1199,
      settings: {
        slidesToShow: 6
      }
    }, {
      breakpoint: 992,
      settings: {
        slidesToShow: 5
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 4
      }
    }, {
      breakpoint: 575,
      settings: {
        slidesToShow: 2
      }
    }]
  });

  $('.category-slider-shop .arrows-prev').click(function () {
    categoryProduct.slick('slickPrev');
  });

  $('.category-slider-shop .arrows-next').click(function () {
    categoryProduct.slick('slickNext');
  });
})(jQuery);