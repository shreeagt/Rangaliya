<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta name="description" content="N.Agency - Responisve Landing Page for Agency">
    <meta name="keywords" content="">
    <meta name="author" content="tabthemes">
    @stack('title')
    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/webeasty/bootstrap.min.css') }}" rel="stylesheet">
    <!-- CSS Files For Plugin -->
    <link href="{{ asset('css/webeasty/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/webeasty/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/webeasty/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/webeasty/YTPlayer.css') }}" rel="stylesheet" />
 
    <link rel="stylesheet" href="{{asset('css/webeasty/owl.carousel.min.css') }}">
 
    <link rel="stylesheet" href="{{asset('css/webeasty/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/webeasty/settings.css') }}">
    <link rel="stylesheet" href="{{asset('css/webeasty/layers.css') }}">
    <link rel="stylesheet" href="{{asset('css/webeasty/navigation.css') }}">

    <link href="{{ asset('css/webeasty/style.css') }}" rel="stylesheet">
  </head>
<body>

<style>
    .menu-item-has-children{
        position: relative;
    }

    .bg-white{
        background:#FFFFFF;
        transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    }

    .menu-item-has-children .boostify-menu-child {
    position: absolute;
    top: 100%;
    left: 0;
    background: #FFFFFF;
    color:#434343;
    font-size: 14px;
    z-index: 99999;
    line-height: 1.2em;
    visibility: hidden;
}

 .menu-item-has-children:hover > .sub-mega-menu, .boostify-menu .menu-item-has-children:hover > .sub-menu {
    visibility: visible;
    opacity: 1;
    z-index: 9999999;
    transform: translateY(0%);
    transition-delay: 0s, 0s, 0.3s;
}

 .boostify-menu .sub-menu-default {
    background-color: #FFFFFF;
}

 .sub-menu-default {
    width: 250px;
    border-radius: 3px 3px 3px 3px;
}

.menu-item-has-children:hover > .boostify-menu-child {
    visibility: visible;
}

.menu-item-has-children:hover > .boostify-menu-child a {
      /* font-family: 'Montserrat', sans-serif; */
      font-family: 'DM Sans', sans-serif;
    font-weight: 500;
    padding: 0 17px;
    line-height: 2;
    color: #000;
    font-size: 16px;
    text-transform: uppercase;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
</style>
   <!-- Start Navigation -->
   <header class="nav-solid" id="home">

<nav class="navbar navbar-fixed-top">

    <div class="navigation">
        <!-- <div class="container-fluid"> -->
        <div class="container bg-white">
            <div class="row">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Logo -->
                    <div class="logo-container">
                        <h2>
                        <div class="logo-wrap local-scroll">
                            {{-- <a href="{{ route('landing-page') }}">
                                LOGO
                            @include('partials.menus.main')

                            </a> --}}
                            <a href="#home">
                                RangRilya
                                <!-- <img class="logo" src="img/ManickO-Final-Logo-1.png" alt="logo" data-rjs="2"> -->
                              </a>

                        </div>
                        </h2>
                        <div class="top-nav-right">
                        {{-- @include('partials.menus.main-right') --}}
                        </div>
                    </div>
                </div> <!-- end navbar-header -->

                <div class="col-md-8 col-xs-12 nav-wrap">
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('landing-page') }}">Home</a></li>

                            <li><a href="{{ route('blog.index') }}">blogs</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-has-children">
                                <a href="{{ route('team') }}">Pages<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <div class="boostify-menu-child">
                                <ul id="menu-menu-page-4" class="sub-menu sub-menu-default">
                                <li><a href="{{ route('shop.index') }}">Product</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-957"><a href="https://mintie.boostifythemes.com/about-v1/">About v1</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-956"><a href="#">About v2</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-960"><a href="{{ route('contact') }}">Contact</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-958"><a href="{{ route('news') }}">News and artical</a></li>
                                </ul>
                            </div>
                        </li>                     
                            <!-- <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="{{ route('news') }}">News and artical</a></li> -->
                            @guest
                            <li><a href="{{ route('register') }}">Sign Up</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @else
                            <li>
                                <a href="{{route('users.edit')}}">My Account</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            @endguest
                            <li><a href="{{ route('cart.index') }}">Cart
                            @if (isset(auth()->user()->id))
                            <span class="cart-count"><span>{{ \App\Model\ProductCart::where('user_id', '=', auth()->user()->id)->get()->count() }}</span></span>
                            @endif
                            </a></li>
                            <li>
                            <?php  
                            // if(isset(auth()->user()->id)){
                            // $tmp = \App\Wishlist::where('user_id', '=', auth()->user()->id)->get()->toArray();
                            ?>
                            {{-- {{dd($tmp)}} --}}
                            {{-- <a>Wishlist</a>
                            <select name="wishlist" id="wishlist" class="">
                                <option></option>
                                @foreach($tmp as $wishlist)
                                    @php $product_name = $wishlist['product_name'];
                                    // dd($product_name);
                                    @endphp
                                    <a href="{{ route('shop.show', $product_name ) }}"><option value="">{{ $product_name }} <img src="{{ $wishlist['images'] }}" width="20" height="15"></option></a>
                                @endforeach
                            </select> --}}

                            {{-- @if(!empty($tmp))
                                <a href="{{ route('show.wishlist') }}">Wishlist</a>
                            @endif --}}
                            </li>

                            {{-- @foreach($items as $menu_item)
                                <li>
                                    <a href="{{ $menu_item->link() }}">
                                        {{ $menu_item->title }}
                                        @if ($menu_item->title === 'Cart')
                                            @if (Cart::instance('default')->count() > 0)
                                            <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                                            @endif
                                        @endif
                                    </a>
                                </li>
                            @endforeach --}}
                        </ul>

                    </div>
                </div> <!-- /.col -->

            </div> <!-- /.row -->
        </div> <!--/.container -->
    </div> <!-- /.navigation-overlay -->
</nav> <!-- /.navbar -->

</header>
