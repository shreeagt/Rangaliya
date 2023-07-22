@include('layouts.headerrang')
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/cart.css') }}" type='text/css' media='all' />
<style>
   .woocommerce-cart .woocommerce-cart-form {
    width: 54.4%;
    padding-right: 0;
}

.woocommerce-cart .cart-collaterals {
    width: 40%;
    padding-top: 10px;
}

button.button.button-plain.single_add_to_cart_button.alt {
    padding: 10px 20px;
}

@media only screen and (max-width:768px) {
   .woocommerce-cart .woocommerce-cart-form {
    width: 100%;
    padding-right: 0;
    text-align: center;
}

.woocommerce-cart .cart-collaterals {
    width: 100%;
}
}
</style>
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
</div>

   <div class="container">
      <div id="page-10" class="post-10 page type-page status-publish hentry">
         <header class="entry-header">
         </header>
         <div class="woocommerce">
            <div class="woocommerce-notices-wrapper"></div>
            <div class="woocommerce-cart-form">
               <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                  <tbody>
                     <img src="{{ $product->images }}" style="width:80%" alt="image" class="loaded tns-complete">
                  </tbody>
               </table>
            </div>
            <div class="cart-collaterals">
               <div class="cart_totals ">
                  <div class="summary entry-summary">
                     <h1 class="product_title entry-title">{{ $product->product_title }}</h1>
                     <p class="price woobt-price-9788">
                        <span class="woocommerce-Price-amount amount">
                           <bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ $product->price }}</bdi>
                        </span>
                     </p>

                     <div class="woocommerce-product-details__short-description">
                        <p>{{ $product->details }}</p>
                     </div>
                     
                     <div class="woocommerce-product-details__short-description">
                        <p>{!! $product->description !!}</p>
                     </div>

                     
                     @if ($product->quantity > 0)
                           <form action="{{ route('cart.store', $product) }}" method="POST">
                              {{ csrf_field() }}
                              <button type="submit" class="button button-plain single_add_to_cart_button alt">Add to Cart</button>
                           </form>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
@include('layouts.footerrang')