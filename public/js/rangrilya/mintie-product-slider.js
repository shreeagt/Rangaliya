/**
 * Product Slider JS
 *
 * @package mintie
 */

'use strict';

(function ($) {

  /**
	 * Product Slider
	 *
	 * @param $scope The widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */
  var WidgetProductSlider = function WidgetProductSlider($scope, $) {
    /**
		 * Slider JS
		 */
    var slide = $scope.find('.js-products-slider'),
        show = $scope.find('.product-js-products-slider').attr('data-show') || 1,
        showtablet = $scope.find('.product-js-products-slider').attr('data-show-tablet') || show,
        showmobile = $scope.find('.product-js-products-slider').attr('data-show-mobile') || show,
        showarrows = slide.attr('data-arrow');

    if (showarrows === 'yes') {
      showarrows = true;
    } else {
      showarrows = false;
    }

    $(slide).on('init', function (event, slick) {
      quick_view_ajax();
    });

    $(slide).slick({
      dots: true,
      arrows: showarrows,
      infinite: true,
      centerMode: true,
      centerPadding: '0px',
      slidesToShow: show,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 3000,
      appendDots: $scope.find(".product-slider-dots"),
      customPaging: function customPaging(slider, i) {
        return '<span class="dots-bullet"></span>';
      },
      responsive: [{
        breakpoint: 1622,
        settings: { slidesToShow: show }
      }, {
        breakpoint: 960,
        settings: { slidesToShow: showtablet }
      }, {
        breakpoint: 600,
        settings: { slidesToShow: showmobile }
      }]
    });
  };

  $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/mintie-product-slider.default', WidgetProductSlider);
  });
})(jQuery);