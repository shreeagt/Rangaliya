@include('layouts.headerrang')
<!-- <link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/style3.css') }}" type='text/css' media='all' /> -->
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/cart.css') }}" type='text/css' media='all' />
<style>
   .mb-10{
   margin-bottom: 10px;
   }
   .woocommerce-cart .woocommerce-cart-form th {
   background: #fdf6f0;
   }
</style>
<div id="theme-page-header">
   <div class="page-header ">
      <div class="container">
         <div id="theme-bread">
            <h1 class="page-title entry-title">
               Cart		
            </h1>
            <nav class="woocommerce-breadcrumb"><a href="/">Home</a> <span>·</span> Cart</nav>
         </div>
      </div>
   </div>
</div>
<main id="main" class="page-content woocommerce-cart woocommerce-page mb-10">
   <div class="container">
   @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		
   @if ($cart_products->count() > 0)
   <h3>{{ $cart_products->count() }} items in Shopping Cart</h3>
      <div id="page-10" class="post-10 page type-page status-publish hentry">
         <header class="entry-header">
         </header>
         <div class="woocommerce">
            <div class="woocommerce-notices-wrapper"></div>
            <div class="woocommerce-cart-form" >
               <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                  <thead>
                     <tr>
                        <th class="product-remove">&nbsp;</th>
                        <th class="product-thumbnail">&nbsp;</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Subtotal</th>
                     </tr>
                  </thead>
                  <tbody>
				  @foreach ($cart_products as $item)
                     <tr class="woocommerce-cart-form__cart-item cart_item">
                        <td class="product-remove">

						<form action="{{ route('cart.destroy', $item->product_cart_id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="cart-options remove">×</button>
                        </form>

                           <!-- <a href="{{ route('cart.destroy', $item->product_cart_id) }}" class="remove" aria-label="Remove this item" data-product_id="9788" data-product_sku="OF58296-HFS">×</a>						 -->
                        </td>
                        <td class="product-thumbnail">
                           <a href="{{ url('/product-view/'.$item->product_title) }}"><img width="300" height="300" src="{{$item->images}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="image" decoding="async" loading="lazy" srcset="{{$item->images}}" sizes="(max-width: 300px) 100vw, 300px"></a>						
                        </td>
                        <td class="product-name" data-title="Product">
                           <a href="{{ url('/product-view/'.$item->product_title) }}">{{ $item->product_title}}</a>						
                        </td>
                        <td class="product-price" data-title="Price">
                           <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ (int)$item['price']  }}</bdi></span>						
                        </td>
                        <td class="product-quantity" data-title="Quantity">
						<select class="quantity" data-id="{{ $item->product_cart_id }}" data-productQuantity="{{ $item->quantity }}">
                            @for ($i = 1; $i < 5 + 1 ; $i++)
                                <option {{ $item->product_quantity == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
       
                        </td>
                        <td class="product-subtotal" data-title="Subtotal">
                           <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ (int)$item['price'] * $item['product_quantity'] }}</bdi></span>						
                        </td>
                     </tr>
					 @endforeach
					 @if (! session()->has('coupon'))
                     <tr>
                        <td colspan="6" class="actions">
							<div class="coupon">
								<form action="{{ route('coupon.store') }}" method="POST">
									{{ csrf_field() }}

									<label for="coupon_code">Coupon:</label> 
								<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"> 
								<button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>

								</form>
							</div>
                        </td>
                     </tr>
					 @endif
                  </tbody>
               </table>
			</div>

            <div class="cart-collaterals">
               <div class="cart_totals ">
                  <h2>Cart totals</h2>
                  <table cellspacing="0" class="shop_table shop_table_responsive">
                     <tbody>
                        <tr class="cart-subtotal">
                           <th>Subtotal</th>
                           <td data-title="Subtotal"><span class="woocommerce-Price-amount amount">
						    <bdi>
								<span class="woocommerce-Price-currencySymbol">₹</span>
								{{ $cart_subtotal }} <br>
							</bdi>
							</span>
			         	</td>
                        </tr>
                        <tr class="woocommerce-shipping-totals shipping">
                           <th> Tax ({{config('cart.tax')}}%)</th>
                           <td data-title="Shipping">
						   {{ $newTax }} 
						   <br>
                    @if (session()->has('coupon'))
                        -{{$discount }} <br>&nbsp;<br>
                        <hr>
                        {{ $newSubtotal }} <br>
                    @endif
                           </td>
                        </tr>
                        <tr class="order-total">
                           <th>Total</th>
                           <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{$newTotal}}</bdi></span></strong> </td>
                        </tr>
                     </tbody>
                  </table>
                  <div class="wc-proceed-to-checkout">
				  <a href="{{ route('shop.index') }}" style="margin-bottom: 10px;" class="button checkout-button button alt wc-forward">Continue Shopping</a>
                     <a href="{{ route('checkout.index') }}" class="checkout-button button alt wc-forward">
                     Proceed to checkout</a>
                  </div>
               </div>
            </div>

         </div>
      </div>
	  @else
	      <h3>No items in Cart!</h3>
            <div class="spacer"></div>
            <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
            <div class="spacer"></div>
	  @endif
   </div>
</main>

<script>
    (function(){
        const classname = document.querySelectorAll('.quantity')
// alert("hello");
        Array.from(classname).forEach(function(element) {

            element.addEventListener('change', function() {
                const id = element.getAttribute('data-id')
                const productQuantity = element.getAttribute('data-productQuantity')

                axios.patch(`/cart/${id}`, {
                    quantity: this.value,
                    productQuantity: productQuantity
                })
                .then(function (response) {
                    // console.log(response);
                    window.location.href = '{{ route('cart.index') }}'
                })
                .catch(function (error) {
                    // console.log(error);
                    window.location.href = '{{ route('cart.index') }}'
                });
            })
        })
    })();
</script>
@include('layouts.footerrang')