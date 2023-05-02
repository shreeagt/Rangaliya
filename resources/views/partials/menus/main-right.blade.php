<!-- <ul> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    @guest
    <li><a href="{{ route('landing-page') }}">Home</a></li>
<li><a href="{{ route('shop.index') }}">Services</a></li>
<!-- <li><a href="index.html#portfolio">Portfolio</a></li>
<li><a href="index.html#team">Team</a></li>
<li><a href="index.html#testimonials">Testimonials</a></li> -->


<li><a href="{{ route('blog.index') }}">blogs</a></li>                       
<li><a href="index.html#contact">Contact</a></li>


    <li><a href="{{ route('register') }}">Sign Up</a></li>
    <li><a href="{{ route('login') }}">Login</a></li>
    @else
    
    
    <li><a href="{{ route('landing-page') }}">Home</a></li>
    <li><a href="{{ route('shop.index') }}">Services</a></li>
    <li><a href="{{ route('blog.index') }}">blogs</a></li>                       
    <li><a href="{{ route('contact') }}">Contact</a></li>
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
<!-- </ul> -->
