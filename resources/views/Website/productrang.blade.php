@include('layouts.headerrang')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" rel="stylesheet" crossorigin="anonymous">
<script>
   $(function(){
   $(".xzoom-main, .xzoom").xzoom-main({
        zoomWidth: 400,
        tint: "333",
        Xoffset: 15,
   });
});
</script>
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{ asset('css/rangrilya/cart.css') }}" type='text/css'
media='all' />
<style>
    a {
        text-decoration: none;
    }

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

    .small-img-group {
        display: flex;
        justify-content: space-between;
    }

    .small-img-col {
        flex-basis: 24%;
        cursor: pointer;
    }






    .xzoom-gallery{margin-top:10px}.xzoom{margin-top:40px}
</style>
<main id="main" class="page-content woocommerce-cart woocommerce-page mb-10">
    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    <section class="sproduct my-5 pt-5">
        <div class="row justify-content-evenly">
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100 pb-1 xzoom-main" src="{{ $product->images }}" xoriginal="{{ $product->images }}" alt="">

                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="/img/logo.png" class="xzoom" xoriginal="{{ $product->images }}" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ $product->images }}" class="xzoom" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ $product->images }}" class="xzoom" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ $product->images }}" class="xzoom" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-12">
                <div class="product-section-information">
                    <nav class="woocommerce-breadcrumb"><a href="{{ route('landing-page') }}">Home</a> <span>·</span> <a
                            href="/our-product">Shop</a>
                        <h1 class="product-section-title">{{ $product->product_title }}</h1>
                        <div class="product-section-subtitle">{{ $product->details }}</div>
                        <div class="product-section-price"> <strong>Rs.{{ $product->price }}</strong></div>
                        <div class="product-section-description">
                            <p>{!! $product->description !!}</p>
                        </div>
                        

                        @if ($product->quantity > 0)
                            <form action="{{ route('cart.store', $product) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="button button-plain single_add_to_cart_button alt">Add to
                                    Cart</button>
                            </form>
                        @endif
                </div>
            </div>
        </div>
    </section>
</main>
@include('layouts.footerrang')
