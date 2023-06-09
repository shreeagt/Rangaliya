@include('layouts.headerrang')
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/cart.css') }}" type='text/css' media='all' />
<div id="theme-page-header">
   <div class="page-header ">
      <div class="container">
         <div id="theme-bread">
            <h1 class="page-title entry-title">
               Checkout		
            </h1>
            <nav class="woocommerce-breadcrumb"><a href="/">Home</a> <span>·</span> Checkout</nav>
         </div>
      </div>
   </div>
</div>
<main id="main" class="page-content">
   <div class="container">
      <div id="page-11" class="post-11 page type-page status-publish hentry">
         <header class="entry-header">
         </header>
         <div class="woocommerce">
            <form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">
               <p>If you have a coupon code, please apply it below.</p>
               <p class="form-row form-row-first">
                  <input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="">
               </p>
               <p class="form-row form-row-last">
                  <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
               </p>
               <div class="clear"></div>
            </form>
            <div class="woocommerce-notices-wrapper"></div>

                <form name="storeCheckout"  class="checkout woocommerce-checkout" action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
               <div class="col2-set" id="customer_details">
                  <div class="col-1">
                     <div class="woocommerce-billing-fields">
                        <h3>Billing details</h3>
                        
                        <div class="woocommerce-billing-fields__field-wrapper">
                            
                           <p class="form-row  validate-required" id="billing_first_name_field" data-priority="10">
                            <label for="billing_first_name" class="">Name<abbr class="required" title="required">*</abbr></label>
                            <span class="woocommerce-input-wrapper">
                                <input type="text" class="input-text" id="name" name="name" value="{{ old('name') }}" required>
                            </span>
                           </p>

                         
                           <p class="form-row address-field validate-required form-row-wide"  data-priority="50">
                            <label for="billing_address_1" class="">Address<abbr class="required" title="required">*</abbr></label>
                            <span class="woocommerce-input-wrapper">
                                <input type="text" class="input-text" id="address" name="address" value="{{ old('address') }}" required>
                             </span>
                           </p>

                           <p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                                <label for="billing_city" class="">Town / City<abbr class="required" title="required">*</abbr></label>
                                <span class="woocommerce-input-wrapper">
                                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                </span>
                            </p>

                           <p class="form-row address-field validate-required validate-postcode form-row-wide" id="billing_postcode_field" data-priority="90" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
                            <label for="billing_postcode" class="">PIN Code<abbr class="required" title="required">*</abbr></label>
                            <span class="woocommerce-input-wrapper">
                              <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                            </span>
                          </p>

                           <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                            <label for="billing_phone" class="">Phone<abbr class="required" title="required">*</abbr></label>
                            <span class="woocommerce-input-wrapper">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                            </span>
                           </p>

                           <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                            <label for="billing_email" class="">Email address&nbsp;<abbr class="required" title="required">*</abbr></label>
                            <span class="woocommerce-input-wrapper">
                                @if (auth()->user())
                                <input type="email" class="input-text" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                                @else
                                <input type="email" class="input-text" id="email" name="email" value="{{ old('email') }}" required>
                              @endif
                            </span>
                          </p>
                        </div>

                     </div>
                  </div>
                  <!-- <div class="col-2">
                     <div class="woocommerce-shipping-fields">
                        <div class="shipping_address" style="display: none;">
                           <div class="woocommerce-shipping-fields__field-wrapper">
                              <p class="form-row form-row-first validate-required" id="shipping_first_name_field" data-priority="10"><label for="shipping_first_name" class="">First name&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="shipping_first_name" id="shipping_first_name" placeholder="" value="" autocomplete="given-name"></span></p>
                              <p class="form-row form-row-last validate-required" id="shipping_last_name_field" data-priority="20"><label for="shipping_last_name" class="">Last name&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="shipping_last_name" id="shipping_last_name" placeholder="" value="" autocomplete="family-name"></span></p>
                              <p class="form-row form-row-wide" id="shipping_company_field" data-priority="30"><label for="shipping_company" class="">Company name&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="shipping_company" id="shipping_company" placeholder="" value="" autocomplete="organization"></span></p>
                              <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_country_field" data-priority="40">
                                 <label for="shipping_country" class="">Country / Region&nbsp;<abbr class="required" title="required">*</abbr></label>
                                 <span class="woocommerce-input-wrapper">

                                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-label="Country / Region" role="combobox"><span class="select2-selection__rendered" id="select2-shipping_country-container" role="textbox" aria-readonly="true" title="United States (US)">United States (US)</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                              <noscript><button type="submit" name="woocommerce_checkout_update_totals" value="Update country / region">Update country / region</button></noscript></span></p>
                              <p class="form-row address-field validate-required form-row-wide" id="shipping_address_1_field" data-priority="50"><label for="shipping_address_1" class="">Street address&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="shipping_address_1" id="shipping_address_1" placeholder="House number and street name" value="" autocomplete="address-line1" data-placeholder="House number and street name"></span></p>
                              <p class="form-row address-field form-row-wide" id="shipping_address_2_field" data-priority="60"><label for="shipping_address_2" class="screen-reader-text">Apartment, suite, unit, etc.&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="shipping_address_2" id="shipping_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="" autocomplete="address-line2" data-placeholder="Apartment, suite, unit, etc. (optional)"></span></p>
                              <p class="form-row address-field validate-required form-row-wide" id="shipping_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="shipping_city" class="">Town / City&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="shipping_city" id="shipping_city" placeholder="" value="" autocomplete="address-level2"></span></p>
                              <p class="form-row address-field validate-required validate-state form-row-wide" id="shipping_state_field" data-priority="80" data-o_class="form-row form-row-wide address-field validate-required validate-state">
                                 <label for="shipping_state" class="">State&nbsp;<abbr class="required" title="required">*</abbr></label>
                                 <span class="woocommerce-input-wrapper">

                                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-label="State" role="combobox"><span class="select2-selection__rendered" id="select2-shipping_state-container" role="textbox" aria-readonly="true" title="California">California</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                 </span>
                              </p>
                              <p class="form-row address-field validate-required validate-postcode form-row-wide" id="shipping_postcode_field" data-priority="90" data-o_class="form-row form-row-wide address-field validate-required validate-postcode"><label for="shipping_postcode" class="">ZIP Code&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="" value="" autocomplete="postal-code"></span></p>
                           </div>
                        </div>
                     </div>
                  </div> -->
               </div>
               <h3 id="order_review_heading">Your order</h3>
               <div id="order_review" class="woocommerce-checkout-review-order">
                  <table class="shop_table woocommerce-checkout-review-order-table" style="position: static; zoom: 1;">
                     <thead>
                        <tr>
                           <th class="product-name">Product</th>
                           <th class="product-total">Subtotal</th>
                        </tr>
                     </thead>
                     <tbody>
                     @if (($cart_products->count())>0)
                     @foreach ($cart_products as $item)
                        <tr class="cart_item">
                            <td class="product-name">
                            <img src="{{$item->images}}" alt="item" class="checkout-table-img check-image">
                            </td> 
                           <td class="product-name">
                           <span class="woocommerce-Price-amount amount">
                                <bdi>
                                {{ $item->name }}
                                </bdi>
                            </span>	
                           
                          
                        
                        
                        </td>


                           <td class="product-total">
                              <span class="woocommerce-Price-amount amount">
                                <bdi>
                                <span class="woocommerce-Price-currencySymbol">₹</span>{{ $item->price}}
                                </bdi>
                            </span>					
                           </td>
                        </tr>
                        @endforeach
                        @endif
                     </tbody>
                     <tfoot>
                        <tr class="cart-subtotal">
                           <th>Subtotal</th>
                           @if (session()->has('coupon'))
                            Discount ({{ session()->get('coupon')['name'] }}) :
                            <br>
                            <hr>
                            New Subtotal <br>
                        @endif

                           <td>
                            <span class="woocommerce-Price-amount amount"><bdi>
                                @if (($cart_products->count())>0)
                                   <span class="woocommerce-Price-currencySymbol">₹</span>{{($cart_subtotal) }}</bdi></span>
                                @endif
                                @if (($cart_products->count())>0 && session()->has('coupon'))
                                    -{{ ($discount) }} <br>
                                    <hr>
                                    @if(isset($newSubtotal))
                                    <span class="woocommerce-Price-currencySymbol">₹</span>{{ ($newSubtotal) }}</bdi></span>
                     
                                @endif
                                @endif

                      
                            </span>
                          </td>

                        </tr>
                        <tr class="woocommerce-shipping-totals shipping">
                           <th>Tax({{config('cart.tax')}}%)</th>

                           <td data-title="Shipping">
                           @if(isset($newTax))
                           ₹  {{ ($newTax) }} 
                              @endif
                           </td>
                        </tr>
                        <tr class="order-total">
                           <th>Total</th>
                           <td>
                            <strong>
                                <span class="woocommerce-Price-amount amount">
                                    <bdi>                                       
                                    @if(isset($newTotal))
                                        ₹ {{ ($newTotal) }}
                                     @endif
                                  </bdi>
                                </span>
                            </strong>
                         </td>
                        </tr>
                     </tfoot>
                  </table>
                  <div id="payment" class="woocommerce-checkout-payment" style="position: static; zoom: 1;">
                     <!-- <ul class="wc_payment_methods payment_methods methods">
                        <li class="wc_payment_method payment_method_bacs">
                           <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked" data-order_button_text="">
                           <label for="payment_method_bacs">
                           Direct bank transfer 	</label>
                           <div class="payment_box payment_method_bacs">
                              <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                           </div>
                        </li>
                        <li class="wc_payment_method payment_method_cheque">
                           <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" data-order_button_text="">
                           <label for="payment_method_cheque">
                           Check payments 	</label>
                           <div class="payment_box payment_method_cheque" style="display:none;">
                              <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                           </div>
                        </li>
                        <li class="wc_payment_method payment_method_cod">
                           <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" data-order_button_text="">
                           <label for="payment_method_cod">
                           Cash on delivery 	</label>
                           <div class="payment_box payment_method_cod" style="display:none;">
                              <p>Pay with cash upon delivery.</p>
                           </div>
                        </li>
                     </ul> -->
                     <div class="form-row">
                        <!-- <noscript>
                           Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.			<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals">Update totals</button>
                        </noscript> -->
                        <!-- <div class="woocommerce-terms-and-conditions-wrapper">
                           <div class="woocommerce-privacy-policy-text">
                              <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="https://mintie.boostifythemes.com/?page_id=3" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                           </div>
                        </div> -->
                        <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Place order</button>
                        <input type="hidden" id="totalAmt" value='<?php echo $newTotal ?>'/>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</main>
@include('layouts.footerrang')