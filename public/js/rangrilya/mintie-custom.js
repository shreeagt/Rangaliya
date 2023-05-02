// @codingStandardsIgnoreStart
/**
 * Hello
 *
 * @package mintie
 */

'use strict';

// Get all Prev element siblings.

var _typeof2 = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

var prevSiblings = function prevSiblings(target) {
  var siblings = [],
      n = target;

  while (n = n.previousElementSibling) {
    siblings.push(n);
  }

  return siblings;
};

// Get all Next element siblings.
var nextSiblings = function nextSiblings(target) {
  var siblings = [],
      n = target;

  while (n = n.nextElementSibling) {
    siblings.push(n);
  }

  return siblings;
};

// Get all element siblings.
var siblings = function siblings(target) {
  var prev = prevSiblings(target) || [],
      next = nextSiblings(target) || [];

  return prev.concat(next);
};

// Run scripts only elementor loaded.
function onElementorLoaded(callback) {
  if (undefined === window.elementorFrontend || undefined === window.elementorFrontend.hooks) {
    setTimeout(function () {
      onElementorLoaded(callback);
    });

    return;
  }

  callback();
}

// Open cart sidebar.
function open_cart_sidebar() {
  document.body.classList.add('cart-sidebar-open');
}

// Event cart sidebar open.
function event_cart_sidebar_open() {
  document.body.classList.add('updating-cart');
  document.body.classList.remove('cart-updated');
}

// Event cart sidebar close.
function event_cart_sidebar_close() {
  document.body.classList.add('cart-updated');
  document.body.classList.remove('updating-cart');
}

// Close cart sidebar.
function close_cart_sidebar() {
  var close_cart_sidebar_btn = document.getElementById('close-cart-sidebar'),
      overlay = document.getElementById('shop-overlay');

  /*USE `ESC` KEY*/
  document.body.addEventListener('keyup', function (e) {
    if (27 === e.keyCode) {
      document.body.classList.remove('cart-sidebar-open');
    }
  });

  /*USE CLOSE BUTTON*/
  if (close_cart_sidebar_btn) {
    close_cart_sidebar_btn.addEventListener('click', function () {
      return document.body.classList.remove('cart-sidebar-open');
    });
  }

  /*USE OVERLAY*/
  if (overlay) {
    overlay.addEventListener('click', function () {
      document.body.classList.remove('cart-sidebar-open');
    });
  }
}

// Product load more button.
function productInfiniteScroll() {
  if (!document.body.classList.contains('has-product-load-more-button')) {
    return;
  }

  var btn = document.getElementsByClassName('load-more-product-btn')[0],
      products = document.querySelector('ul.products');
  if (!btn || !products) {
    return;
  }

  btn.addEventListener('click', function (e) {
    e.preventDefault();

    btn.classList.add('loading');

    var request = new Request(btn.href, {
      method: 'GET',
      credentials: 'same-origin',
      headers: new Headers({
        'Content-Type': 'text/xml'
      })
    });

    fetch(request).then(function (res) {
      res.text().then(function (text) {
        var wrapper = document.createElement('div');
        wrapper.innerHTML = text;

        var resProduct = wrapper.querySelectorAll('ul.products > li'),
            resBtn = wrapper.querySelector('.load-more-product-btn');

        resProduct.forEach(function (e, i) {
          e.classList.add('loaded');
          e.style.transitionDelay = '0.' + i + 's';
          products.appendChild(e);
          setTimeout(function () {
            e.classList.remove('loaded');
          }, 50);
        });

        if (history.pushState) {
          window.history.pushState(null, null, btn.href);
        }

        if (resBtn) {
          btn.setAttribute('href', resBtn.href);
        } else {
          btn.parentNode.removeChild(btn);
        }

        btn.classList.remove('loading');

        quick_view_ajax();
      });
    }).catch(function (error) {
      console.log(error);
    });
  });
}

// Variation swatch.
function variation_swatch() {
  var selector = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '#shop-quick-view .variations_form';

  var var_form = jQuery(selector);
  if (!var_form.length) {
    return;
  }

  if (undefined !== (typeof wc_add_to_cart_variation_params === 'undefined' ? 'undefined' : _typeof2(wc_add_to_cart_variation_params))) {
    var_form.wc_variation_form();
    var_form.find('.variations select').change();
  }

  if ('undefined' !== typeof jQuery.fn.tawcvs_variation_swatches_form) {
    var_form.tawcvs_variation_swatches_form();
  }
}

// Easyzoom.
function reinit_easy_zoom(selector) {

  if (!selector.length || window.matchMedia('( max-width: 991px )').matches || document.body.classList.contains('quick-view-open')) {
    return;
  }

  var easyZoom = selector.easyZoom(),
      api = easyZoom.data('easyZoom');

  api.teardown();
  api._init();
}

// Discount.
function quantityDiscount() {
  jQuery('.quantity-discount-table').on('change', 'input[name="quantity_discount"]', function () {
    var newQuantity = jQuery(this).val();

    var $productSummary = jQuery('.summary');
    var $qty = $productSummary.find('.quantity .qty');

    if ($productSummary.length > 0) {
      $qty.val(newQuantity).trigger('change');
    }
  });
}

function toggleWcTabs() {
  var $reviewsSummary = jQuery('.reviews-summary');

  $reviewsSummary.on('click', '.tm-button', function (e) {
    e.preventDefault();

    var $el = jQuery(this),
        href = $el.attr('href'),
        $wcTab = jQuery(href),
        $tabNavItem = jQuery('#' + $wcTab.attr('aria-labelledby')),
        $formWrapper = jQuery('.question-form-wrapper, #review_form_wrapper', $wcTab),
        $formParent = jQuery('.question-list-container, .reviews-content', $wcTab);

    if ($wcTab.css('display') === 'none') {
      $wcTab.show().siblings('.wc-tab').hide();
      $tabNavItem.addClass('active').siblings().removeClass('active');
      $formWrapper.slideDown();
    } else {
      $formWrapper.slideToggle();
    }

    var tabNavHeight = jQuery('.wc-tabs').outerHeight(true),
        headerHeight = 0,
        formPos = $formParent.offset().top,
        offset;

    if (jQuery(document.body).hasClass('header-sticky-enable')) {
      headerHeight = jQuery('#page-header').outerHeight();
    }

    offset = formPos - tabNavHeight - headerHeight;
    offset = offset > 0 ? offset : 0;

    jQuery('html, body').animate({ scrollTop: offset });
  });
}

function uploadAttachmentHandler() {
  jQuery(document.body).on('click', '.comment-form__attachment-button', function () {
    var $attachmentButton = jQuery(this).closest('.comment-form').find('.comment-form-attachment__input');
    $attachmentButton.trigger('click');
  });
}

// Add to cart.
function single_add_to_cart() {
  var popup = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

  if (!document.body.classList.contains('ajax-single-add-to-cart')) {
    return;
  }

  var _cart = document.querySelectorAll('form.cart');

  if (true == popup) {
    _cart = document.querySelectorAll('#shop-quick-view form.cart');
  }

  if (!_cart) {
    return;
  }

  var _loop = function _loop(i, j) {

    var _input = _cart[i].getElementsByClassName('qty')[0],
        _max = _input ? parseInt(_input.getAttribute('max')) : 0,
        _btn = _cart[i].getElementsByClassName('single_add_to_cart_button')[0],
        _in_cart = _cart[i].getElementsByClassName('in-cart-qty')[0],
        _in_stock = _in_cart ? _in_cart.getAttribute('data-in_stock') : false,
        _out_of_stock = _in_cart ? _in_cart.getAttribute('data-out_of_stock') : false,
        _not_enough = _in_cart ? _in_cart.getAttribute('data-not_enough') : false,
        _valid_qty = _in_cart ? _in_cart.getAttribute('data-valid_qty') : false;

    if (!_btn || 'A' == _btn.tagName || _cart[i].classList.contains('grouped_form') || _cart[i].classList.contains('mnm_form') || !_input) {
      return {
        v: void 0
      };
    }

    _btn.addEventListener('click', function (e) {
      e.preventDefault();

      var _cart_sidebar = document.getElementsByClassName('cart-sidebar-content')[0],
          _item_count = document.getElementsByClassName('shop-cart-count'),
          _in_cart_qty = parseInt(_in_cart.value),
          single_atc_id = 0,
          _qty = '',
          variation_id = null,
          items = {},
          xhr = new XMLHttpRequest();

      xhr.open('post', mintie_ajax.url);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

      if (_cart[i].classList.contains('variations_form')) {
        single_atc_id = _cart[i].querySelector('[name="product_id"]').value;
        variation_id = _cart[i].querySelector('[name="variation_id"]').value;
        _qty = parseInt(_input.value);

        var product_attr = _cart[i].querySelectorAll('select[name^="attribute"]');

        product_attr.forEach(function (x) {
          var attr_name = x.name,
              attr_value = x.value;

          items[attr_name] = attr_value;
        });
      } else {
        single_atc_id = _cart[i].querySelector('[name="add-to-cart"]').value;
        _qty = parseInt(_input.value);
      }

      /*ALERT IF NOT VALID QUANTITY*/
      if (_qty < 1 || isNaN(_qty)) {
        alert(_valid_qty);
        return;
      }

      /*CONDITION IF STOCK MANAGER ENABLE*/
      if ('yes' == _in_stock) {
        if (_in_cart_qty == _max) {
          alert(_out_of_stock);
          return;
        }

        if (+_qty + +_in_cart_qty > _max) {
          alert(_not_enough);
          return;
        }
      }

      /*UPDATE in_cart VALUE*/
      _in_cart.value = +_in_cart.value + +_input.value;
      /*OPEN && CLOSE CART SIDEBAR ACTION*/
      event_cart_sidebar_open();
      open_cart_sidebar();
      close_cart_sidebar();
      // Add loading animation.
      _btn.classList.add('loading');

      xhr.addEventListener('readystatechange', function () {
        if (4 === xhr.readyState) {
          var s_data = JSON.parse(xhr.responseText);

          if (200 === s_data.status) {
            /*UPDATE PRODUCT COUNT*/
            for (var c = 0, cl = _item_count.length; c < cl; c++) {
              _item_count[c].innerHTML = s_data.item;
            }
            /*APPEND CONTENT*/
            _cart_sidebar.innerHTML = s_data.content;
          }
        }
      });

      xhr.addEventListener('load', function () {
        event_cart_sidebar_close();
        _btn.classList.remove('loading');
      });

      xhr.send('action=single_add_to_cart&nonce=' + mintie_ajax.nonce + '&product_id=' + single_atc_id + '&product_qty=' + _qty + '&variation_id=' + variation_id + '&variations=' + JSON.stringify(items));
    });
  };

  for (var i = 0, j = _cart.length; i < j; i++) {
    var _ret = _loop(i, j);

    if ((typeof _ret === 'undefined' ? 'undefined' : _typeof(_ret)) === "object") {
      return _ret.v;
    }
  }
}

// Product variations.
function product_variation() {
  var popup = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

  var _gallery = jQuery('.single-product-gallery');

  if (true === popup) {
    _gallery = jQuery('#shop-quick-view #quick-view-gallery');
  }

  if (!_gallery.length) {
    return;
  }

  _gallery.each(function (i) {
    var galleryItem = jQuery(this);

    /*PRODUCT IMAGE*/
    var _image = galleryItem.find('.pro-img-item:eq(0)'),
        _image_src = _image.find('img').prop('src'),


    /*PRODUCT THEMBNAIL*/
    _thumb = galleryItem.find('.pro-thumb:eq(0)'),
        _thumb_src = _thumb.find('img').prop('src'),


    /*EASY ZOOM ATTR*/
    _zoom = _image.data('zoom');

    reinit_easy_zoom(_image);

    /*event when variation changed=========*/
    jQuery(document.body).on('found_variation', 'form.variations_form:eq(' + i + ')', function (event, variation) {
      /*get image url form `variation`*/
      var full_url = variation.image.full_src,
          img_url = variation.image.src,
          thumb_url = variation.image.gallery_thumbnail_src,
          is_mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
          is_safari = /constructor/i.test(window.HTMLElement) || function (p) {
        return p.toString() === "[object SafariRemoteNotification]";
      }(!window['safari'] || typeof safari !== 'undefined' && safari.pushNotification);;

      /*change `src` image*/
      _image.find('img').prop('src', img_url);
      _thumb.find('img').prop('src', thumb_url);
      _image.attr('data-zoom', full_url);

      if (!is_mobile && !is_safari) {
        _image.addClass('image-is-loading');
        _image.find('img').prop('src', img_url).one('load', function () {
          _image.removeClass('image-is-loading');
        });
      }

      reinit_easy_zoom(_image);
    });

    /*reset variation========*/
    jQuery('.reset_variations').on('click', function (e) {
      e.preventDefault();

      /*change `src` image*/
      _image.find('img').prop('src', _image_src);
      _thumb.find('img').prop('src', _thumb_src);
      _image.attr('data-zoom', _zoom);

      reinit_easy_zoom(_image);
    });
  });
}

// Minus and Plus button.
function quantity() {
  var _selector = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'form.woocommerce-cart-form, form.cart';

  var j_quick_view = jQuery(_selector),
      _qty = j_quick_view.find('.quantity');

  if (!_qty.length || jQuery(_qty).hasClass('hidden')) return;

  _qty.prepend('<span class=\'modify-qty\' data-click=\'minus\'></span>').append('<span class=\'modify-qty\' data-click=\'plus\'></span>');

  var _qty_btn = j_quick_view.find('.modify-qty');

  jQuery(_qty_btn).on('click', function () {
    var t = jQuery(this),
        _input = t.parent().find('input'),
        currVal = parseInt(_input.val(), 10),
        max = parseInt(_input.prop('max'));

    if ('minus' === t.attr('data-click')) {
      if (currVal <= 0) {
        return;
      }

      if ('quantity' == _input.prop('name') && currVal <= 1) {
        return;
      }

      _input.val(currVal - 1).trigger('change');
    }

    if ('plus' === t.attr('data-click')) {
      if (currVal >= max) return;
      _input.val(currVal + 1).trigger('change');
    }

    jQuery('[name=\'update_cart\']').prop('disabled', false);
  });
}

function count_wishlist() {
  jQuery('body').on('woosw_change_count', function (event, count) {
    jQuery('.header-wishlist .count-wishlist').html(count);
  });
}

// Quick view.
function quick_view_ajax() {

  var qv_btn = document.getElementsByClassName('product-quick-view-btn'),
      qv_box = document.getElementById('shop-quick-view'),
      qv_content = qv_box ? qv_box.getElementsByClassName('quick-view-content')[0] : false,
      qv_close_btn = qv_box ? qv_box.getElementsByClassName('quick-view-close-btn')[0] : false;

  if (!qv_box || !qv_btn.length) {
    return;
  }

  var _loop2 = function _loop2(_i, _j) {
    qv_btn[_i].addEventListener('click', function () {
      var qv_product_id = qv_btn[_i].getAttribute('data-pid'),
          qv_id = qv_box.getAttribute('data-view_id'),
          xhr = new XMLHttpRequest();

      if (qv_product_id === qv_id) {
        document.body.classList.add('quick-view-open');
        return;
      }

      qv_content.innerHTML = '';

      document.body.classList.add('quick-view-open', 'quick-viewing');

      var quick_view_close = function quick_view_close() {
        document.body.classList.remove('quick-view-open');
      };

      document.body.addEventListener('keyup', function (e) {
        if (27 === e.keyCode) {
          quick_view_close();
        }
      });

      qv_close_btn.addEventListener('click', function () {
        quick_view_close();
      });

      if (document.getElementById('shop-overlay')) {
        document.getElementById('shop-overlay').addEventListener('click', function () {
          quick_view_close();
        });
      }

      qv_box.setAttribute('data-view_id', qv_product_id);

      xhr.open('post', mintie_ajax.url);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
      xhr.send('action=quick_view&nonce=' + mintie_ajax.nonce + '&product_id=' + qv_product_id);

      xhr.addEventListener('readystatechange', function () {
        if (4 === xhr.readyState) {
          var _data = JSON.parse(xhr.responseText);

          if (200 === _data.status) {
            qv_content.innerHTML = _data.content;
          }
        }
      });

      xhr.addEventListener('load', function () {
        document.body.classList.remove('quick-viewing');

        quantity('#shop-quick-view .cart');

        /*TINY SLIDER FOR QUICKVIEW*/
        var qv_slider = function () {
          var qv_gallery = document.getElementById('quick-view-gallery');

          if (!qv_gallery || !qv_gallery.classList.contains('quick-view-slider')) {
            return;
          }

          var qv_carousel = tns({
            loop: false,
            container: '#quick-view-gallery',
            items: 1,
            mouseDrag: true
          });

          /*RESET SLIDER*/
          jQuery(document.body).on('found_variation', 'form.variations_form', function (event, variation) {
            qv_carousel.goTo('first');
          });

          jQuery('.reset_variations').on('click', function () {
            qv_carousel.goTo('first');
          });
        }();

        /*VARIATION PRODUCT FOR QUICKVIEW*/
        variation_swatch();
        product_variation(true);
        single_add_to_cart(true);
      });

      xhr.addEventListener('error', function () {
        return alert('Sorry, something went wrong. Please refresh this page to try again!');
      });
    });
  };

  for (var _i = 0, _j = qv_btn.length; _i < _j; _i++) {
    _loop2(_i, _j);
  }
}

// Sidebar menu.
function sidebar_menu() {
  /*TOGGLE SIDEBAR MENU*/
  var container = document.getElementById('theme-container'),
      btn = document.querySelectorAll('.menu-toggle-btn'),
      menuContent = document.getElementById('sidebar-menu-content'),
      menuOverlay = document.getElementById('menu-overlay');

  if (!btn.length) {
    return;
  }

  for (var i = 0, j = btn.length; i < j; i++) {
    btn[i].addEventListener('click', function () {
      document.documentElement.classList.add('has-menu-open');
      container.classList.add('menu-open');
    });
  }

  menuOverlay.addEventListener('click', function () {
    document.documentElement.classList.remove('has-menu-open');
    container.classList.remove('menu-open');
  });

  document.body.addEventListener('keyup', function (e) {
    if (27 === e.keyCode) {
      document.documentElement.classList.remove('has-menu-open');
      container.classList.remove('menu-open');
    }
  });

  /*MENU ACCORDION*/
  jQuery('.theme-sidebar-menu a').on('click', function (e) {
    e.preventDefault();

    var t = jQuery(this),
        s = t.siblings(),
        l = s.length;

    /*GO TO URL IF NOT SUB-MENU*/
    if (!l) {
      window.location.href = t.prop('href');
    }

    if (t.next().hasClass('show')) {
      t.next().removeClass('show');
      t.next().slideUp(200);
    } else {
      t.parent().parent().find('li .sub-menu').removeClass('show');
      t.parent().parent().find('li .sub-menu').slideUp(200);
      t.next().toggleClass('show');
      t.next().slideToggle(200);
    }
  });
}

// Sticky menu on mobile.
function sticky_menu_mobile() {
  if (!document.body.classList.contains('mobile-header-menu-sticky') || !window.matchMedia('( max-width: 991px )').matches) {
    return;
  }

  var themeMenuLayout = document.getElementById('theme-menu-layout'),
      menuLayout = themeMenuLayout.getElementsByClassName('menu-layout')[0],
      adminBar = document.getElementById('wpadminbar');

  // Set height for parent div.
  themeMenuLayout.style.height = menuLayout.offsetHeight + 'px';

  if (!adminBar) {
    return;
  }

  var adminBarHeight = adminBar.offsetHeight,
      pos = window.scrollY;

  function setup(pos, adminBarHeight) {
    if (pos >= adminBarHeight) {
      document.body.classList.add('mobile-header-fixed');
    } else {
      document.body.classList.remove('mobile-header-fixed');
    }
  }

  setup(pos, adminBarHeight);

  window.addEventListener('scroll', function () {
    pos = window.scrollY, adminBarHeight = adminBar.offsetHeight;

    setup(pos, adminBarHeight);
  });
}

// Product categories accordion.
function product_categories_accordion() {
  var accordion = jQuery('.product-categories.mintie-product-categories');
  if (!accordion.length) {
    return;
  }

  accordion.each(function (index) {
    var hasChild = jQuery(this).find('.cat-parent');
    if (!hasChild.length) {
      return;
    }

    hasChild.each(function (i) {
      // Create Toggle Button.
      var toggle = jQuery('<span class="accordion-cat-toggle ion-ios-arrow-right"></span>');

      // Append Toggle Button.
      var parent = jQuery(this);
      jQuery(parent).append(toggle);

      // Toggle Button click.
      toggle.on('click', function () {
        var button = jQuery(this),
            buttonParent = button.parent(),
            child = buttonParent.find('>ul'),
            state = button.data('state') || 1;

        // State update.
        switch (state) {
          case 1:
            button.data('state', 2);
            break;
          case 2:
            button.data('state', 1);
            break;
        }

        // Toggle child category.
        child.slideToggle(300);

        // Add active class.
        if (1 === state) {
          button.addClass('active');
          buttonParent.addClass('active');
        } else {
          button.removeClass('active');
          buttonParent.removeClass('active');
        }
      });
    });
  });
}

// Product featured.
function featured_product() {
  var featured = jQuery('.widget-featured-carousel-product');
  if (!featured.length) {
    return;
  }

  featured.each(function () {
    var t = jQuery(this),
        perRow = t.data('slider_per_row'),
        arrows = t.parent().find('.widget-featured-carousel-product-arrow'),
        arrowPrev = arrows.find('.prev-arrow'),
        arrowNext = arrows.find('.next-arrow');

    t.slick({
      rows: 1,
      slidesPerRow: perRow,
      prevArrow: arrowPrev,
      nextArrow: arrowNext
    });
  });
}

// On change product category
function onChangeProductCategorySearchForm() {
  var cate_el = jQuery('select[name="product_cat"]');
  cate_el.on('change', function () {
    var searchFormWrap = jQuery(this).closest('.mintie-search-form__inner'),
        searchField = searchFormWrap.find('.mintie-search-form__field'),
        loader = searchFormWrap.find('.mintie-search-form__loader'),
        result_area = searchFormWrap.find('.mintie-search-form__suggestions'),
        curr_product_cat = jQuery(this).val();

    if ('' === searchField.val()) {
      result_area.html('');
      return false;
    }

    if (searchField.val().length < 3) {
      return false;
    }

    jQuery.ajax({
      method: 'get',
      url: global.url,
      data: {
        action: 'mintie_ajax_search_handler',
        _ajax_nonce: global.nonce,
        product_cat: curr_product_cat,
        search_key: searchField.val()
      },
      dataType: 'json',
      beforeSend: function beforeSend() {
        loader.addClass('fa-spin is-active');
      },
      success: function success(res) {
        loader.removeClass('fa-spin is-active');
        var suggestions = res.suggestions;
        var suggestions_count = suggestions.length;

        result_area.html('');

        var result = '';

        for (var i = 0; i < suggestions_count; i++) {
          result += '<div class="autocomplete-suggestion"><a href="' + suggestions[i].url + '">';
          if (suggestions[i].thumbnail && '1' === mintie_ajax_search.display_image) {
            result += '<div class="autocomplete-suggestion__thumbnail">' + suggestions[i].thumbnail + '</div>';
          }
          result += '<div class="autocomplete-suggestion__content">';
          result += '<h3 class="autocomplete-suggestion__title"><span>' + suggestions[i].value + '</span></h3>';
          if (suggestions[i].price && '1' === mintie_ajax_search.display_price) {
            result += suggestions[i].price;
          }
          if (suggestions[i].excerpt && '1' === mintie_ajax_search.display_excerpt) {
            result += '<div class="autocomplete-suggestion__excerpt">' + suggestions[i].excerpt + '</div>';
          }
          result += '</div>';
          result += '</a></div>';
        }

        if (suggestions[0] && -1 !== suggestions[0].id && '1' === mintie_ajax_search.btn_view_all && '0' !== mintie_ajax_search.limit_search_results) {
          if (parseInt(mintie_ajax_search.limit_search_results) <= suggestions_count) {
            result += '<div class="mintie-btn-view-all">';
            result += '<a href="#" class="mintie-js-click-submit">' + mintie_ajax_search.btn_view_all_txt + '</a>';
            result += '</div>';
          }
        }

        var new_result = highlight_text(searchField.val(), result);

        result_area.html('<div class="autocomplete-suggestions">' + new_result + '</div>');
      },
      error: function error() {}
    });
  });
}

// Click submit search form
function button_click_submit(btn_class) {
  var searchForm = jQuery('.js-search-form');
  if (btn_class) {
    jQuery(document).on('click', btn_class, function (e) {
      e.preventDefault();
      searchForm.find('form').get(0).submit();
    });
  }
}

// Ajax search form.
function ajax_search_form() {
  var searchFormContainer = jQuery('.js-search-form'),
      searchFormWrap = searchFormContainer.find('.mintie-search-form__inner'),
      searchButton = jQuery('.js-search-button'),
      closeButton = searchFormWrap.find('.js-close-search-form'),
      searchField = searchFormWrap.find('.js-search-field'),
      loader = searchFormWrap.find('.mintie-search-form__loader'),
      result_area = searchFormWrap.find('.mintie-search-form__suggestions');

  searchButton.on('click', function () {
    searchFormContainer.addClass('is-open');
    searchField.focus();
  });

  closeButton.on('click', function (e) {
    e.preventDefault();
    searchFormContainer.removeClass('is-open');
  });

  /* HIT `ESC` KEY TO CLOSE DIALOG SEARCH */
  document.body.addEventListener('keyup', function (e) {
    if (27 === e.keyCode) {
      searchFormContainer.removeClass('is-open');
    }
  });

  var delay;

  searchField.on('input', function () {

    var curr_val = jQuery(this).val();
    if ('' === curr_val) {
      if (result_area.hasClass('open')) {
        result_area.removeClass('open');
      }
      result_area.html('');
      clearTimeout(delay);
      return false;
    }

    if (curr_val.length < 3) {
      return false;
    }

    if ('undefined' !== typeof delay) {
      clearTimeout(delay);
    }
    delay = setTimeout(function () {
      jQuery.ajax({
        method: 'get',
        url: global.url,
        data: {
          action: 'mintie_ajax_search_handler',
          _ajax_nonce: global.nonce,
          product_cat: jQuery('#product_cat').val(),
          search_key: searchField.val()
        },
        dataType: 'json',
        beforeSend: function beforeSend() {
          loader.addClass('fa-spin is-active');
        },
        success: function success(res) {
          loader.removeClass('fa-spin is-active');
          var suggestions = res.suggestions;
          var suggestions_count = suggestions.length;

          result_area.html('');

          var result = '';

          for (var i = 0; i < suggestions_count; i++) {
            result += '<div class="autocomplete-suggestion"><a href="' + suggestions[i].url + '">';
            if (suggestions[i].thumbnail && '1' === mintie_ajax_search.display_image) {
              result += '<div class="autocomplete-suggestion__thumbnail">' + suggestions[i].thumbnail + '</div>';
            }
            result += '<div class="autocomplete-suggestion__content">';
            result += '<h3 class="autocomplete-suggestion__title"><span>' + suggestions[i].value + '</span></h3>';
            if (suggestions[i].price && '1' === mintie_ajax_search.display_price) {
              result += suggestions[i].price;
            }
            if (suggestions[i].excerpt && '1' === mintie_ajax_search.display_excerpt) {
              result += '<div class="autocomplete-suggestion__excerpt">' + suggestions[i].excerpt + '</div>';
            }
            result += '</div>';
            result += '</a></div>';
          }
          if (suggestions[0] && -1 !== suggestions[0].id && '1' === mintie_ajax_search.btn_view_all && '0' !== mintie_ajax_search.limit_search_results) {
            if (parseInt(mintie_ajax_search.limit_search_results) <= suggestions_count) {
              result += '<div class="mintie-btn-view-all">';
              result += '<a href="#" class="mintie-js-click-submit">' + mintie_ajax_search.btn_view_all_txt + '</a>';
              result += '</div>';
            }
          }

          var new_result = highlight_text(searchField.val(), result);

          if (!result_area.hasClass('open')) {
            result_area.addClass('open');
          }
          result_area.html('<div class="autocomplete-suggestions">' + new_result + '</div>');
        },
        error: function error() {
          if (result_area.hasClass('open')) {
            result_area.removeClass('open');
          }
        }
      });
    }, 500);
  });
}

// Ajax search product
function ajax_search_product() {
  var widget_wrap = jQuery('.widget-ajax-search-mintie');
  var searchForm = widget_wrap.find('.mintie-search-form'),
      searchField = searchForm.find('.mintie-search-form__field'),
      loader = widget_wrap.find('.mintie-search-form__loader'),
      product_cat = searchForm.find('select[name="product_cat"]'),
      result_area = widget_wrap.find('.mintie-search-form__suggestions');

  var delay;

  searchField.on('input', function () {

    var curr_val = jQuery(this).val();
    if ('' === curr_val) {
      if (result_area.hasClass('open')) {
        result_area.removeClass('open');
      }
      result_area.html('');
      clearTimeout(delay);
      return false;
    }

    if (curr_val.length < 3) {
      return false;
    }

    if ('undefined' !== typeof delay) {
      clearTimeout(delay);
    }
    delay = setTimeout(function () {
      jQuery.ajax({
        method: 'get',
        url: global.url,
        data: {
          action: 'mintie_ajax_search_handler',
          _ajax_nonce: global.nonce,
          product_cat: product_cat.val(),
          search_key: searchField.val()
        },
        dataType: 'json',
        beforeSend: function beforeSend() {
          loader.addClass('fa-spin is-active');
        },
        success: function success(res) {
          loader.removeClass('fa-spin is-active');
          var suggestions = res.suggestions;
          var suggestions_count = suggestions.length;

          result_area.html('');

          var result = '';

          for (var i = 0; i < suggestions_count; i++) {
            result += '<div class="autocomplete-suggestion"><a href="' + suggestions[i].url + '">';
            if (suggestions[i].thumbnail && '1' === mintie_ajax_search.display_image) {
              result += '<div class="autocomplete-suggestion__thumbnail">' + suggestions[i].thumbnail + '</div>';
            }
            result += '<div class="autocomplete-suggestion__content">';
            result += '<h3 class="autocomplete-suggestion__title"><span>' + suggestions[i].value + '</span></h3>';
            if (suggestions[i].price && '1' === mintie_ajax_search.display_price) {
              result += suggestions[i].price;
            }
            if (suggestions[i].excerpt && '1' === mintie_ajax_search.display_excerpt) {
              result += '<div class="autocomplete-suggestion__excerpt">' + suggestions[i].excerpt + '</div>';
            }
            result += '</div>';
            result += '</a></div>';
          }

          if (suggestions[0] && -1 !== suggestions[0].id && '1' === mintie_ajax_search.btn_view_all && 0 !== mintie_ajax_search.limit_search_results) {

            if (parseInt(mintie_ajax_search.limit_search_results) <= suggestions_count) {
              result += '<div class="mintie-btn-view-all">';
              result += '<a href="#" class="mintie-js-click-submit">' + mintie_ajax_search.btn_view_all_txt + '</a>';
              result += '</div>';
            }
          }

          var new_result = highlight_text(searchField.val(), result);

          if (!result_area.hasClass('open')) {
            result_area.addClass('open');
          }
          result_area.html('<div class="autocomplete-suggestions">' + new_result + '</div>');
        },
        error: function error() {
          if (result_area.hasClass('open')) {
            result_area.removeClass('open');
          }
        }
      });
    }, 500);
  });
}

// Highlight text.
function highlight_text(val, old_str) {
  if (!val) {
    return old_str;
  }
  if (!old_str) {
    return false;
  }

  var regex = new RegExp(val, 'gi');
  return old_str.replace(regex, function (str, index) {
    var t = old_str.slice(0, index + 1),
        lastLt = t.lastIndexOf("<"),
        lastGt = t.lastIndexOf(">"),
        lastAmp = t.lastIndexOf("&"),
        lastSemi = t.lastIndexOf(";");
    if (lastLt > lastGt) return str; // inside a tag
    if (lastAmp > lastSemi) return str; // inside an entity
    return "<span class='mintie-hl-text'>" + str + "</span>";
  });
}

// Swatch list.
function swatch_list() {
  jQuery(document.body).on('click', '.p-attr-swatch', function () {
    var img_src = void 0,
        t = jQuery(this),
        src = t.data('src'),
        product = t.closest('.product'),
        img_wrap = product.find('.product-image-wrapper'),
        img = img_wrap.find('img'),
        origin_src = img.data('origin_src');

    img.prop('srcset', '');

    if (t.hasClass('active')) {
      img_src = origin_src;
      t.removeClass('active');
    } else {
      img_src = src;
      t.addClass('active').siblings().removeClass('active');
    }

    if (img.prop('src') == img_src) {
      return;
    }

    img_wrap.addClass('image-is-loading');

    img.prop('src', img_src).one('load', function () {
      return img_wrap.removeClass('image-is-loading');
    });
  });
}

// Product action.
function product_action() {
  var wc = document.body.classList.contains('woocommerce-js'),
      _overlay = document.getElementById('shop-overlay');
  if (!wc) {
    return;
  }

  /*VAR*/
  var shopping_cart_btns = Array.from(document.querySelectorAll('.js-cart-button'));

  /* OPEN CART SIDEBAR BY HEADER BUTTON */
  shopping_cart_btns.forEach(function (shopping_cart_btn) {
    shopping_cart_btn.addEventListener('click', function (e) {
      e.preventDefault();

      if (document.body.classList.contains('woocommerce-cart')) return;

      open_cart_sidebar();
      close_cart_sidebar();
    });
  });

  quantity();

  /*UPDATE SWATCH IMAGE WHEN VARIATION CLICK*/
  product_variation();

  /*AJAX SINGLE ADD TO CART*/
  single_add_to_cart();

  /*QUICK VIEW*/
  quick_view_ajax();

  /*GLOBAL*/
  jQuery(document.body).on('adding_to_cart', function () {
    event_cart_sidebar_open();
  }).on('added_to_cart', function () {
    open_cart_sidebar();
    close_cart_sidebar();
    event_cart_sidebar_close();
  }).on('click', '.add_to_wishlist', function () {
    /*ADDING TO WISHLIST*/
    this.classList.add('adding-to-wishlist');
  }).on('removed_from_cart', function () {
    /*RUN AFTER REMOVED PRODUCT FROM CART*/
    var run_after_removed_from_cart = function () {
      var _pid = '',
          _cart = document.getElementsByClassName('cart')[0],
          _btn = _cart ? _cart.getElementsByClassName('single_add_to_cart_buttons')[0] : false,
          _in_cart = _cart ? _cart.getElementsByClassName('in-cart-qty')[0] : false,
          _in_stock = _in_cart ? _in_cart.getAttribute('data-in_stock') : 'no',
          _qty = '',
          xhr = new XMLHttpRequest();

      if (!_cart || !_btn || 'no' == _in_stock) {
        return;
      }

      if (_cart.classList.contains('variations_form')) {
        _pid = _cart.querySelector('[name="product_id"]').value;
      } else {
        _pid = _btn.value;
      }

      xhr.open('post', mintie_ajax.url);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
      xhr.send('action=get_count_product_already_in_cart&product_id=' + _pid + '&nonce=' + mintie_ajax.nonce);
      xhr.addEventListener('readystatechange', function () {
        if (4 === xhr.readyState) {
          var i_data = JSON.parse(xhr.responseText);
          _in_cart.value = i_data.in_cart;
        }
      });
    }();
  }).on('updated_cart_totals', function () {
    quantity();
  });
}

// Scroll to top.
function scroll_to_top() {
  var scrollToTop = jQuery('.js-to-top');

  if (!scrollToTop.length) {
    return;
  }

  jQuery(window).on('scroll', function () {
    if (jQuery(this).scrollTop() > 200) {
      scrollToTop.addClass('is-visible');
    } else {
      scrollToTop.removeClass('is-visible');
    }
  });

  scrollToTop.on('click', function (e) {
    e.preventDefault();
    jQuery('html, body').animate({ scrollTop: 0 }, 500);
  });
}

// Sticky header.
function sticky_header() {
  var stickyHeader = jQuery('.js-sticky-header');
  var headerDOM = jQuery('#theme-menu-layout');

  if (!stickyHeader.length || !headerDOM.length) {
    return;
  }

  var headerOffsetTop = headerDOM.offset().top;
  var headerHeight = headerDOM.height();
  var stickyHeaderOffset = headerOffsetTop + headerHeight;

  jQuery(window).on('scroll', function () {
    if (jQuery(this).scrollTop() > stickyHeaderOffset) {
      stickyHeader.addClass('is-visible');
    } else {
      stickyHeader.removeClass('is-visible');
    }
  });
}

// Preloader prepare.
function preload() {
  if (jQuery('#preloader').length) {
    jQuery('#preloader').delay(1000).fadeOut('slow');
  }
}

// Sub Menu Icon.
function subMenuIcon(e) {
  var n = 0 < arguments.length && void 0 !== e ? jQuery(e) : jQuery(".theme-primary-menu"),
      s = n.find(".menu-item-has-children>a");
  s.length && s.append('<span class="arrow-icon ion-ios-arrow-down"></span>');
  var a = n.find(".arrow-icon");

  jQuery(a).on("click", function (e) {
    e.preventDefault();

    var tn = jQuery(this),
        active = tn.find(".arrow-icon");
    active.toggleClass('active');
  });
}

// Remove class tns.
function removeClassTiny() {
  var classContainer = document.getElementsByClassName('single-gallery-vertical');
  if (classContainer) {
    jQuery('.tns-vertical').removeClass('tns-horizontal');
  }

  if (jQuery(window).width() > 768 && jQuery('#gallery-thumb').length > 0) {
    jQuery('.single-gallery-vertical .single-product-gallery .open-label-shop').css('left', '100px');
    jQuery('.single-gallery-vertical .single-product-gallery .sold-out-label').css('left', '100px');
    jQuery('.single-gallery-vertical .wrapper-product-content .onsale').css('left', '100px');
  }
}

// Sticky buy bottom.
function sticky_buy_bottom() {
  var stickyButton = jQuery('.sticky-add-to-cart-section'),
      body = jQuery('.product-template-default'),
      buttonDom = jQuery('.cart');

  if (stickyButton.length && buttonDom) {
    var stickOffsetTop = buttonDom.offset().top,
        headerHeight = buttonDom.height(),
        stickyHeaderButtonOffset = stickOffsetTop + headerHeight;

    jQuery(window).on('scroll', function () {
      if (jQuery(this).scrollTop() > stickyHeaderButtonOffset) {
        stickyButton.addClass('is-visible');
        body.addClass('is-sticky-button');
      } else {
        stickyButton.removeClass('is-visible');
        body.removeClass('is-sticky-button');
      }
    });
  }

  var scrollToSummary = jQuery('.js-to-summary');

  scrollToSummary.on('click', function (e) {
    e.preventDefault();
    jQuery('html, body').animate({
      scrollTop: jQuery('.variations_form').offset().top
    }, 200);
  });

  var scrollToGrouped = jQuery('.js-to-grouped');

  scrollToGrouped.on('click', function (e) {
    e.preventDefault();
    jQuery('html, body').animate({
      scrollTop: jQuery('.grouped_form').offset().top
    }, 200);
  });
}

// Space grid product.
function space_grid_product() {
  var classStyleShop = jQuery('.products .product .mintie-style-style1');

  if (classStyleShop.length > 0) {
    jQuery('.products .product').css('margin-bottom', '23px');
  }

  var classStyle3Shop = jQuery('.products .product .mintie-style-style3');

  if (classStyle3Shop.length > 0) {
    jQuery('.products .product').css('margin-bottom', '33px');
  }
}

function mintieProductToogle() {
  jQuery('.accordion-header').on('click', function () {
    jQuery(this).next('.accordion-content').slideToggle(400);
    jQuery(this).toggleClass('icon-active');
  });
}

document.addEventListener('DOMContentLoaded', function () {
  // Toogle product page
  mintieProductToogle();

  // Scroll to top.
  scroll_to_top();

  // Sticky header.
  sticky_header();

  // Sticky menu on mobile.
  sticky_menu_mobile();

  // Swatch list on Shop Archive.
  swatch_list();

  // Product action.
  product_action();

  quantityDiscount();

  count_wishlist();

  toggleWcTabs();

  uploadAttachmentHandler();

  // Ajax search form.
  ajax_search_form();

  ajax_search_product();

  onChangeProductCategorySearchForm();

  button_click_submit('.mintie-js-click-submit');

  filter_toggle_button;

  // Sidebar menu.
  sidebar_menu();

  // Widget: Accordion product category.
  product_categories_accordion();

  // Widget: Featured products.
  featured_product();

  // Product load more button.
  productInfiniteScroll();

  // Icon SubMenu.
  subMenuIcon();

  removeClassTiny();

  space_grid_product();

  sticky_buy_bottom();

  // FOR ELEMENTOR PREVIEW MODE.
  onElementorLoaded(function () {
    window.elementorFrontend.hooks.addAction('frontend/element_ready/global', function () {
      quantity();
    });
  });

  window.addEventListener('click', function (e) {
    var container = document.querySelectorAll('.mintie-search-form__inner');
    if (!container.length || container.length < 1) {
      return false;
    }

    container.forEach(function (el) {
      var filter_result_area = el.querySelector('.mintie-search-form__suggestions');
      if (filter_result_area && !el.contains(e.target)) {
        filter_result_area.classList.remove('open');
      }
    });
  });
});

document.addEventListener('readystatechange', function (event) {
  // When window loaded ( external resources are loaded too- `css`,`src`, etc...)
  if (event.target.readyState === "complete") {
    preload();
  }
});