/**
 * Ajax Product Filter
 *
 * @package mintie
 */

'use strict';

var mintieSliderPrice = function mintieSliderPrice() {
  var sliderPriceSelector = jQuery('.price_slider:not(.ui-slider)');
  if (!sliderPriceSelector.length) {
    return;
  }

  jQuery('input#min_price, input#max_price').hide();
  jQuery('.price_slider, .price_label').show();

  var min_price = jQuery('.price_slider_amount #min_price').data('min'),
      max_price = jQuery('.price_slider_amount #max_price').data('max'),
      step = jQuery('.price_slider_amount').data('step') || 1,
      current_min_price = jQuery('.price_slider_amount #min_price').val(),
      current_max_price = jQuery('.price_slider_amount #max_price').val();

  sliderPriceSelector.slider({
    range: true,
    animate: true,
    min: min_price,
    max: max_price,
    step: step,
    values: [current_min_price, current_max_price],
    create: function create(event, ui) {
      jQuery('.price_slider_amount #min_price').val(current_min_price);
      jQuery('.price_slider_amount #max_price').val(current_max_price);

      jQuery(document.body).trigger('price_slider_create', [current_min_price, current_max_price]);
    },
    slide: function slide(event, ui) {
      jQuery('input#min_price').val(ui.values[0]);
      jQuery('input#max_price').val(ui.values[1]);

      jQuery(document.body).trigger('price_slider_slide', [ui.values[0], ui.values[1]]);
    },
    change: function change(event, ui) {
      jQuery(document.body).trigger('price_slider_change', [ui.values[0], ui.values[1]]);
    }
  });
};

// Sort by.
var mintieSortBy = function mintieSortBy() {
  var order = document.querySelector('.woocommerce-ordering'),
      orderby = order ? order.querySelector('.orderby') : false,
      eWrap = order ? order.closest('.elementor-element') || order.closest('.e-element') : false;

  if (!order || !orderby || eWrap) {
    return;
  }

  // Disable submit form by Woocommerce js.
  jQuery('.woocommerce-ordering').on('submit', function (e) {
    e.preventDefault();
  });
  order.insertAdjacentHTML('beforeend', '<button type="submit" class="hidden"></button>');

  orderby.addEventListener('change', function () {
    var button = order.querySelector('[type="submit"]');
    if (button) {
      mintieShopFilter();
      button.click();
    }
  });
};

// Select woocommerce.
var mintieSelectWoo = function mintieSelectWoo() {
  var woo = document.querySelectorAll('[class*="dropdown_layered_nav_"]');
  woo.forEach(function (element, index) {
    var classNames = Array.from(element.classList),
        getSpecialAttr = classNames.filter(function (el) {
      return el.includes('dropdown_layered_nav_');
    });

    var selector = getSpecialAttr.length ? '.' + getSpecialAttr.join() : false;

    // Continue.
    if (!selector) {
      return;
    }

    // Update value on change.
    jQuery(selector).eq(index).on('change', function () {
      var that = jQuery(this),
          slug = that.val(),
          name = selector.replace('.dropdown_layered_nav_', ''),
          form = that.closest('form'),
          filter = form ? form.find('input[name="filter_' + name + '"]') : [];

      if (filter.length) {
        slug = slug && slug.includes(',') ? slug.join(',') : slug;
        filter.val(slug);
      }

      // Submit form on change if standard dropdown.
      if (!that.attr('multiple')) {
        form.submit();
      }
    });

    // Use Select2 enhancement if possible.
    if (jQuery().selectWoo) {
      var firstOption = jQuery(selector).eq(index).find('option:eq(0)'),
          anyLabel = firstOption.length ? firstOption.html() : '';

      var wc_layered_nav_select = function wc_layered_nav_select() {
        jQuery(selector).eq(index).selectWoo({
          placeholder: decodeURIComponent(anyLabel),
          minimumResultsForSearch: 5,
          width: '100%',
          allowClear: false
        });
      };
      wc_layered_nav_select();
    }
  });
};

// Dropdown select categories.
var mintieDropdownSelectCategory = function mintieDropdownSelectCategory() {
  var dropdown = document.querySelectorAll('.widget_product_categories .dropdown_product_cat');
  if (!dropdown.length) {
    return;
  }

  dropdown.forEach(function (ele) {
    ele.addEventListener('change', function () {
      var selectVal = ele.value.trim(),
          thisPage = mintie_ajax_shop_filter.shop_url,
          homeUrl = mintie_ajax_shop_filter.home_url;

      if (!selectVal) {
        return;
      }

      if (homeUrl.includes('?')) {
        thisPage = homeUrl + '&product_cat=' + selectVal;
      } else {
        thisPage = homeUrl + '?product_cat=' + selectVal;
      }

      location.href = thisPage;
    });
  });
};

// Flexible sidebar on mobile.
var mintieFlexibleSidebarMobile = function mintieFlexibleSidebarMobile() {
  var sidebarToggle = document.querySelector('.js-sidebar-toggle');
  var toggleIcon = document.querySelector('.toggle-icon');
  var shopSidebar = document.querySelector('.shop-sidebar');
  var sidebarOverlay = document.querySelector('.sidebar-overlay');

  if (sidebarToggle && sidebarOverlay && toggleIcon) {
    sidebarToggle.addEventListener('click', function (e) {
      e.preventDefault();
      shopSidebar.classList.toggle('is-visible');
      sidebarOverlay.classList.toggle('is-visible');
      document.body.classList.toggle('hide-scrollbar');
      this.classList.toggle('is-active');
      if (toggleIcon.classList.contains('ion-android-options')) {
        toggleIcon.classList.remove('ion-android-options');
        toggleIcon.classList.add('ion-android-close');
      } else {
        toggleIcon.classList.remove('ion-android-close');
        toggleIcon.classList.add('ion-android-options');
      }
    });

    sidebarOverlay.addEventListener('click', function () {
      shopSidebar.classList.remove('is-visible');
      this.classList.remove('is-visible');
      document.body.classList.remove('hide-scrollbar');
      sidebarToggle.classList.remove('is-active');
      toggleIcon.classList.remove('ion-android-close');
      toggleIcon.classList.add('ion-android-options');
    });
  }
};

var mintieScrollToShopContent = function mintieScrollToShopContent() {
  var scrollEl = document.querySelector('.shop-content');
  scrollEl.scrollIntoView();
};

var mintieCloseFlexibleSidebarMobile = function mintieCloseFlexibleSidebarMobile() {
  var sidebarToggle = document.querySelector('.js-sidebar-toggle');
  var toggleIcon = document.querySelector('.toggle-icon');
  var shopSidebar = document.querySelector('.shop-sidebar');
  var sidebarOverlay = document.querySelector('.sidebar-overlay');
  if (sidebarToggle && sidebarOverlay && toggleIcon) {
    shopSidebar.classList.remove('is-visible');
  }
};

// Ajax shop filter.
var mintieShopFilter = function mintieShopFilter() {
  var sidebar = document.querySelector('.shop-sidebar');
  /*if ( ! sidebar ) {
		return;
	}*/

  var selector = document.querySelectorAll('.widget_rating_filter .wc-layered-nav-rating a, .mintie-clear-filter-item, .pf-link, .widget_layered_nav_filters a, .advanced-product-filter a, .woocommerce-widget-layered-nav a, .woocommerce-ordering [type="submit"], .widget.widget_price_filter [type="submit"], .woocommerce-product-search [type="submit"], .woocommerce-widget-layered-nav [type="submit"], .woocommerce-pagination a, .per-page-variation');
  if (!selector.length) {
    return;
  }

  var location = window.location;

  selector.forEach(function (element) {
    element.onclick = function (e) {
      if (document.body.classList.contains('single') || document.body.classList.contains('single-product')) {
        return;
      }

      e.preventDefault();

      var url = element.href,
          products = document.querySelector('ul.products'),
          offsetTop = products ? products.offsetTop : 0;

      // Filter by form.
      if ('submit' === element.type) {
        var form = element.closest('form'),
            getParam = form ? form.querySelectorAll('[name]') : [],
            params = {},
            validate = false;

        if (getParam.length) {
          getParam.forEach(function (input) {
            var inputValue = input.value.trim();

            // Continue.
            if ('paged' === input.name) {
              return;
            }

            if (inputValue) {
              params[input.name] = inputValue;
            } else if ('search' === input.type) {
              input.focus();
              validate = true;
            }
          });

          // Return.
          if (validate) {
            return;
          }

          var paramsToString = new URLSearchParams(params).toString();

          url = decodeURI(location.pathname + '?' + paramsToString);
        }
      }

      // Add loading animation.
      document.documentElement.classList.add('mintie-filter-updating');

      // Request.
      var request = new Request(url, {
        method: 'GET',
        credentials: 'same-origin',
        headers: new Headers({
          'Content-Type': 'text/html'
        })
      });
      // Fetch API.
      fetch(request).then(function (res) {
        return res.text();
      }).then(function (data) {
        var dom = new DOMParser(),
            doc = dom.parseFromString(data, 'text/html'),
            resPrimary = doc.querySelector('.shop-content'),
            resSecondary = doc.querySelector('.shop-sidebar'),
            resResult = resPrimary ? resPrimary.querySelector('.woocommerce-result-count') : false,
            resPagination = resPrimary ? resPrimary.querySelector('.woocommerce-pagination') : false,

        // Original DOM.
        primary = document.querySelector('.shop-content'),
            result = primary ? primary.querySelector('.woocommerce-result-count') : false,
            pagination = primary ? primary.querySelector('.woocommerce-pagination') : false;

        if (primary && resPrimary) {
          primary.innerHTML = resPrimary.innerHTML;
        }

        if (resSecondary) {
          sidebar.innerHTML = resSecondary.innerHTML;
        }

        if (result && resResult) {
          result.innerHTML = resResult.innerHTML;
        }

        if (pagination && resPagination) {
          pagination.innerHTML = resPagination.innerHTML;
        }
      }).catch(function (error) {
        console.log(error);
      }).finally(function () {
        if (history.pushState) {
          history.pushState(null, null, url);
        }

        mintieCloseFlexibleSidebarMobile();

        // Re-init quickview.
        if ('function' === typeof quick_view_ajax()) {
          quick_view_ajax();
        }

        // Re-init when new dom apply.
        mintieShopFilter();

        // Slider price.
        mintieSliderPrice();

        // Order by.
        mintieSortBy();

        // Select woocommerce.
        mintieSelectWoo();

        // Remove loading animation.
        document.documentElement.classList.remove('mintie-filter-updating');

        mintieDropdownSelectCategory();

        filter_toggle_button();

        // Dropdown layered nav.
        var dropdownLayeredNav = document.querySelectorAll('.shop-sidebar form.woocommerce-widget-layered-nav-dropdown');
        if (dropdownLayeredNav.length) {
          dropdownLayeredNav.forEach(function (nav) {
            var select = nav.querySelector('select.woocommerce-widget-layered-nav-dropdown'),
                input = nav.querySelector('input');
            if (!select || !input) {
              return;
            }

            if (select) {
              select.addEventListener('change', function () {
                input.value = select.value;
                nav.submit();
              });
            }
          });
        }

        // Scroll to products element.
        if (element.classList.contains('page-numbers') && products) {
          setTimeout(function () {
            window.scrollTo({
              top: offsetTop,
              left: 0,
              behavior: 'smooth'
            });
          }, 100);
        }

        mintieFlexibleSidebarMobile();

        mintieScrollToShopContent();
      });
    };
  });
};

// Filter Toggle Button.
function filter_toggle_button() {
  var button = jQuery('.js-filter-toggle-btn');
  var filter_area = jQuery('.mintie-shop-filter');

  jQuery(document).on('click', '.js-filter-toggle-btn', function () {
    filter_area.slideToggle(500, function () {
      if (jQuery(this).is(':visible')) {
        filter_area.addClass('open');
      } else {
        filter_area.removeClass('open');
      }
    });
  });
}

document.addEventListener('DOMContentLoaded', function () {
  mintieFlexibleSidebarMobile();
  mintieSortBy();
  mintieShopFilter();
  filter_toggle_button();
});