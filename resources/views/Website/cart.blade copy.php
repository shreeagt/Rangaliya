@extends('layouts.main')
@push('title')
<title>blogs</title>  
@endpush
@section('main-section')
<div class="cart-section container d-cart-block">
    {{-- <div class=" container"> --}}
    <div>
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

        <h2>{{ $cart_products->count() }} item(s) in Shopping Cart</h2>

        <div class="cart-table">
           
            @foreach ($cart_products as $item)
            <div class="cart-table-row">
                <div class="cart-table-row-left">
                    
                    <a href="{{ url('/services-view/'.$item->product_url) }}"><img src="{{$item->images}}" alt="item" class="cart-table-img"></a>
                    <div class="cart-item-details">
                        <div class="cart-table-item"><a href="{{ url('/services-view/'.$item->product_url) }}">{{ $item->product_title}}</a></div>
                        <div class="cart-table-description">{!! $item->description !!}</div>
                    </div>
                </div>
                <div class="cart-table-row-right">
                    <div class="cart-table-actions">
                        <form action="{{ route('cart.destroy', $item->product_cart_id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="cart-options">Remove</button>
                        </form>

                        <form action="{{ route('cart.switchToSaveForLater', $item->product_cart_id) }}" method="POST">
                            {{ csrf_field() }}

                            <button type="submit" class="cart-options">Save for Later</button>
                        </form>
                    </div>
                    <div>
                        <select class="quantity" data-id="{{ $item->product_cart_id }}" data-productQuantity="{{ $item->quantity }}">
                            @for ($i = 1; $i < 5 + 1 ; $i++)
                                <option {{ $item->product_quantity == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>{{ (int)$item['price'] * $item['product_quantity'] }}</div>
                    {{-- $cart_subtotal+((int)$item['product_quantity'] * (int)$item['price']); --}}
                </div>
            </div> <!-- end cart-table-row -->
            @endforeach

        </div> <!-- end cart-table -->

        @if (! session()->has('coupon'))

            <a href="#" class="have-code">Have a Code?</a>

            <div class="have-code-container">
                <form action="{{ route('coupon.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="coupon_code" id="coupon_code">
                    <button type="submit" class="button button-plain">Apply</button>
                </form>
            </div> <!-- end have-code-container -->
        @endif

        <div class="cart-totals">
            <div class="cart-totals-left">
                Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
            </div>

            <div class="cart-totals-right">
                <div>
                    Subtotal <br>
                    @if (session()->has('coupon'))
                        Code ({{ session()->get('coupon')['name'] }})
                        <form action="{{ route('coupon.destroy') }}" method="POST" style="display:block">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" style="font-size:14px;">Remove</button>
                        </form>
                        <hr>
                        New Subtotal <br>
                    @endif
                    Tax ({{config('cart.tax')}}%)<br>
                    <span class="cart-totals-total">Total</span>
                </div>
                <div class="cart-totals-subtotal">
                    {{ $cart_subtotal }} <br>
                    @if (session()->has('coupon'))
                        -{{$discount }} <br>&nbsp;<br>
                        <hr>
                        {{ $newSubtotal }} <br>
                    @endif
                    {{ $newTax }} <br>
                    <span class="cart-totals-total">{{$newTotal}}</span>
                </div>
            </div>
        </div> <!-- end cart-totals -->

        <div class="cart-buttons">
            <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
            <a href="{{ route('checkout.index') }}" class="button-primary">Proceed to Checkout</a>
        </div>

        @else

            <h3>No items in Cart!</h3>
            <div class="spacer"></div>
            <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
            <div class="spacer"></div>

        @endif
    </div>
</div> <!-- end cart-section -->

<script src="{{ asset('js/app.js') }}"></script>
<script>
    (function(){
        const classname = document.querySelectorAll('.quantity')

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

@endsection