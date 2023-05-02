@extends('layouts.main')
@push('title')
    <title>product</title>
@endpush
@section('main-section')

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

    <div class="section-title-bg text-center m-bottom-40">
        <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>Our Product</strong></h2>
        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">We write quality content
            regularly. check them out!</p>
    </div>


    <!--BLog single section-->
    <section class="blog-index">

        <!--Container-->
        <div class="container clearfix">

            <div class="row">

                <div class="col-md-8 m-bottom-40">

                    <div class="row multi-columns-row">
                        @forelse ($products as $product)
                            <!-- === Blog item 1 === -->
                            <div class="col-sm-6 m-bottom-40">
                                <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                    <div class="blog-media">
                                        <a href="<?php
                                             echo url('/product-view/'. $product->product_title); ?>">
                                            <img src="{{ $product->images }}"
                                                alt="product" class="img-responsive wow fadeInLeft animated"
                                                style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInLeft;">
                                            
                                            </a>

                                    </div>
                                    <!--post media-->


                                    <div class="blog-post-body">
                                        <h4> <a href="<?php echo url('/services-view/'.$product->product_url); ?>">
                                                <div class="product-name">
                                                    {{ $product->product_title }}</div>
                                            </a></h4>
                                        {{-- <p class="p-bottom-20">{{ $product->description	}}</p> --}}
                                        <p class="p-bottom-20"> {!! $product->description !!}</p>
                                       
                                        <a href="<?php echo url('/services-view/'.$product->product_url); ?>" class="read-more">Read More >></a>
                                    </div>
                                    <!--post body-->
                                </div> <!-- /.blog -->
                            </div> <!-- /.inner-col -->
                        @empty
                            <div style="text-align: left">No items found</div>
                        @endforelse

                    </div>
                </div> <!-- /.col -->

                <div class="col-md-4 sidebar">

                    <!-- Widget 1 -->
                    <div class="widget widget-search">
                        <form action="#" class="search-form">
                            <input type="text" onfocus="if(this.value == 'Search') { this.value = ''; }"
                                onblur="if(this.value == '') { this.value = 'Search'; }" value="Search">
                            <input type="submit" class="submit-search" value="Ok">
                        </form>
                    </div>
                    <!--End widget-->


                    <!-- Widget 2 -->
                    <div class="widget">
                        <h4>Categories</h4>
                        <ul class="cat-list">
                            @foreach ($categories as $category)
                                <li class="{{ $category->slug_url }}">
                                    <a href="{{ route('shop.index', ['category' => $category->slug_url]) }}">{{ $category->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--End widget-->

                    <!-- Widget 3 -->
                    <div class="widget">
                        <h4>Popular tags</h4>
                        <ul class="tag-list">
                            @foreach ($products as $product)
                                <li><a href="{{ route('shop.index', ['category' => $category->slug_url]) }}">
                                        <div class="product-keywords">{{ $product->meta_keywords }}</div>
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!--End widget-->

                </div> <!-- /.col -->

            </div> <!-- /.row -->

            <div class="blog-pagination">
                <nav aria-label="Page navigation">

                    {{ $products->links() }}

                </nav>
            </div> <!-- /.blog-pagination -->

    </section>
    <!--End blog single section-->
@endsection