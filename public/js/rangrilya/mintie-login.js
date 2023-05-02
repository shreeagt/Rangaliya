/**
 * Login js
 *
 * @package mintie
 */

'use strict';

(function ($) {
  /**
	 * Widget Login
	 *
	 * @param $scope The widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */
  var WidgetLogin = function WidgetLogin() {
    $('.js-call-popup-login').on('click', function () {
      $('.js-poup-login').addClass('active');
      $('.js-bg-popup-login').addClass('active');
    });

    $('.js-close-popup-login').on('click', function () {
      $('.js-poup-login').removeClass('active');
      $('.js-bg-popup-login').removeClass('active');
    });

    $('.js-bg-popup-login').on('click', function () {
      $('.js-poup-login').removeClass('active');
      $('.js-bg-popup-login').removeClass('active');
    });

    $(document).keyup(function (e) {
      if (e.keyCode == 27) {
        $('.js-poup-login').removeClass('active');
        $('.js-bg-popup-login').removeClass('active');
      }
    });
  };

  $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/mintie-login.default', WidgetLogin);
  });
})(jQuery);