{{-- @extends('layout') --}}
@extends('layouts.main')

@section('title', 'My Orders')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

{{-- @section('content') --}}

@section('main-section')

    @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>My Orders</span>
    @endcomponent

    {{-- <div class="container">
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

    <div class="products-section my-orders container">
        <div class="sidebar">

            <ul>
              <li><a href="{{ route('users.edit') }}">My Profile</a></li>
              <li class="active"><a href="{{ route('orders.index') }}">My Orders</a></li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">My Orders</h1>
            </div>

            <div>
                @foreach ($orders as $order)
                <div class="order-container">
                    <div class="order-header">
                        <div class="order-header-items">
                            <div>
                                <div class="uppercase font-bold">Order Placed</div>
                                <div>{{ presentDate($order->created_at) }}</div>
                            </div>
                            <div>
                                <?php $counter = 23189; ?>
                                <div class="uppercase font-bold">Order ID</div>
                                <div>{{ $counter }}{{ $order->id }}</div>
                            </div><div>
                                <div class="uppercase font-bold">Total</div>
                                <div>Rs.{{ $order->billing_total }}</div>
                            </div>
                        </div>
                        <div>
                            <div class="order-header-items">
                                <div><a href="{{ route('orders.show', $order->id) }}">Order Details</a></div>
                                <div>|</div>
                                <div><a href="#">Invoice</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="order-products">
                        @foreach ($order->products as $product)
                            <div class="order-product-item">
                                <div><img src="{{ asset($product->images) }}" alt="Product Image"></div>
                                <div>
                                    <div>
                                        <a href="{{ route('shop.show', $product->id) }}">{{ $product->name }}</a>
                                    </div>
                                    <div>Rs. {{ $product->price }}</div>
                                    <div>Quantity: {{ $product->pivot->quantity }}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div> <!-- end order-container -->
                @endforeach
            </div>

            <div class="spacer"></div>
        </div>
    </div> --}}



    <div class="m-bottom-40 m-top-40">
        <div class="container d-cart-block " >
        
            <div class="multi-columns-row ">
        
                <div class="products-header justify-center">
                    <h1 class="">My Orders</h1>
                </div>

                <div class="col-sm-4"> 
                    <div class="sidebar">
                        <ul>
                           <a href="{{ route('users.edit') }}" > <li class="active list-sidebar">My Profile</li></a>
                          <a href="{{ route('order.index') }}" style="color:#ed5f5e;font-weight:600"><li class="list-sidebar">My Orders</li></a>
                        </ul>
                    </div> <!-- end sidebar -->
                </div>

                <div class="col-sm-8">
                    <div class="my-profile">
                        <div id="owl-orders" class="owl-carousel owl-theme testimonial ">
                     @foreach ($orders as $order)
                     <div class="testimonial-item">
                        <div class="order-container m-top-10 M-bottom-10">
                            <div class="order-header">
                                <div class="order-header-items">
                                    <div class="multi-columns-row">
                                        <div class="uppercase font-bold col-xs-6 p-top-10 p-bottom-10">Order Placed</div>
                                        <div class="col-xs-6 p-top-10 p-bottom-10">{{ presentDate($order->created_at) }}</div>
                                    </div>
                                    <div class="multi-columns-row">
                                        <?php $counter = 23189; ?>
                                        <div class="uppercase font-bold col-xs-6 p-top-10 p-bottom-10">Order ID</div>
                                        <div class="col-xs-6 p-top-10 p-bottom-10">{{ $counter }}{{ $order->id }}</div>
                                    </div>
                                    <div class="multi-columns-row">
                                        <div class="uppercase font-bold col-xs-6 p-top-10 p-bottom-10">Total</div>
                                        <div class="col-xs-6 p-top-10 p-bottom-10">Rs.{{ $order->billing_total }}</div>
                                    </div>
                                </div>
                            
                                    <div class="order-header-items multi-columns-row">
                                        <div class="col-xs-6 p-top-10 p-bottom-10"><a href="{{ route('orders.show', $order->id) }}" class="btn btn-main btn-theme wow fadeInUp animated animated">Order Details</a></div>
                                         <div class="col-xs-6 p-top-10 p-bottom-10"><a href="#">Invoice</a></div>
                                    </div>
                            
                            </div>

                            <div class="order-products">
                                @foreach ($order->products as $product)
                                    <div class="order-product-item ">
                                     
                                            <img src="{{ asset($product->images) }}" class="pro-image" alt="Product Image">
                                       
                                        <div class="">
                                            <div class=" p-top-10 p-bottom-10">
                                                <a href="{{ url('/services-view/'.$product->product_url) }}">{{ $product->product_title}}</a>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class=" p-top-10 p-bottom-10">Rs. {{ $product->price }}</div>
                                            <div class=" p-top-10 p-bottom-10">Quantity: {{ $product->pivot->quantity }}</div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>

                         </div> <!-- end order-container -->
                        @endforeach
                    </div>
                        <div class="spacer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
@endsection





@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection

