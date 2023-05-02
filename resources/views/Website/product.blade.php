@extends('layout')

@section('title', $product->product_title)

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')


    @component('components.breadcrumbs')
    <a href="/">Home</a>
    <i class="fa fa-chevron-right breadcrumb-separator"></i>
    <span><a href="{{ route('shop.index') }}">Product</a></span>
    <i class="fa fa-chevron-right breadcrumb-separator"></i>
    <span>{{ $product->product_title }}</span>
    <style> 
    .service_image{
        text-align: left;
    }
    </style>
@endcomponent


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
<div class="product-section ">
    <div class="product-section-information">
        <div class="product-section-image">
            <img src="{{ $product->images }}"  alt="product" class="active" id="currentImage">
        </div>
        <div class="product-section-images">
            <div class="product-section-thumbnail selected">
                <img src="{{$product->images }}" alt="product">
            </div>
        </div>
    </div>

    <div class="product-section-information">
        <h1 class="product-section-title">{{ $product->product_title }}</h1>
        <div class="product-section-subtitle">{{ $product->details }}</div>
        <div class="product-section-price">Rs. {{ $product->price }}</div>
        <div ><h4>{!! $product->description !!}</h4></div>

        @if ($product->quantity > 0)
            <form action="{{ route('cart.store', $product) }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="button button-plain">Add to Cart</button>
            </form>
        @endif
    </div>
</div>
</div> <!-- end product-section -->

<div class="container" style="margin-bottom: 50px">
    <!-- Tabs content -->
    <div class="tab-content" id="ex-content">
        <ul class="nav nav-tabs">
            @foreach ($tab->all() as $tabs)
            <li><a data-toggle="tab" aria-expanded="true" href="#{{$tabs->label}}" >{{ $tabs->label}}</a></li> 
            @endforeach
        </ul>
            @foreach ($tab->all() as $tabname)
                <div id="{{$tabname->label}}" class="tab-pane fade in">
                    <div class="tab-ctn dash-pro-item">
                        <div class="table-responsive"> 
                            <div class="blog-post-body">
                                <p class="p-bottom-20">{!!$tabname->description!!}</p>
                            </div>    
                        </div>
                    </div> 
                </div>
            @endforeach
    </div> 

</div>
    <!-- Tabs content -->


{{-- @include('partials.might-like') --}}
    <script>
        (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.product-section-thumbnail');

            images.forEach((element) => element.addEventListener('click', thumbnailClick));

            function thumbnailClick(e) {
                currentImage.classList.remove('active');

                currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    currentImage.classList.add('active');
                })

                images.forEach((element) => element.classList.remove('selected'));
                this.classList.add('selected');
            }

        })();
    </script>
    @endsection