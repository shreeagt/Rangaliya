@extends('layout')

@section('title', 'Products')

@section('extra-css')
    <!-- <link rel="stylesheet" href="{{ asset('css/algolia.css') }}"> -->
@endsection

@section('content')

    @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shop</span>
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

    <div class="section-title-bg text-center m-bottom-40">
        <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>Our services</strong></h2>
        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">We write quality content regularly. check them out!</p>
    </div>

    
    <!--BLog single section-->
    <section class="blog-index">

        <!--Container-->
        <div class="container clearfix">
  
            <div class="row">
      
                <div class="col-md-8 m-bottom-40">
          
                    <div class="row multi-columns-row">
                         @forelse ($categoryProduct as $product)
               
                    <!-- === Blog item 1 === -->
                        <div class="col-sm-6 m-bottom-40">
                            <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                <div class="blog-media">
                                <a href="{{ route('shop.show', $product->id) }}"><img src="{{ $product->images }}" alt="product" class="img-responsive wow fadeInLeft animated"  style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInLeft;"></a>

                                </div><!--post media-->
                                
                                
                                <div class="blog-post-body">
                                    <h4> <a href="{{ route('shop.show', $product->id) }}"><div class="product-name">{{ $product->name }}</div></a></h4>
                                    <p class="p-bottom-20">{{ $product->uasage }}</p>
                                    <a href="blog_single_post.html" class="read-more">Read More >></a>
                                </div><!--post body-->                   
                            </div> <!-- /.blog -->  
                        </div> <!-- /.inner-col -->
                         @empty
                    <div style="text-align: left">No items found</div>
                    @endforelse

                   

                    <div class="blog-pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="disabled">
                                <span>
                                    <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                                </span>
                                </li>
                                <li class="active">
                                <span>1 <span class="sr-only">(current)</span></span>
                                </li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> <!-- /.blog-pagination -->
                </div>
            </div> <!-- /.col -->               
                
                
                <div class="col-md-4 sidebar">
            
                <!-- Widget 1 -->
                <div class="widget widget-search">
                        <form action="#" class="search-form">
                            <input type="text" onfocus="if(this.value == 'Search') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search'; }"  value="Search">
                            <input type="submit" class="submit-search" value="Ok">
                        </form>
                </div> <!--End widget-->
                
                
                <!-- Widget 2 -->
                <div class="widget">
                    <h4>Categories</h4>
                    <ul class="cat-list">
                    @foreach ($categories as $category)
                        <li class="{{$category->slug }}"><a href="{{ route('mamta')}}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul> 
                </div> <!--End widget-->
                    
                <!-- Widget 3 -->
                <div class="widget">
                    <h4>Popular tags</h4>
                    <ul class="tag-list">
                     @foreach ($products as $product)
                        <li><a href="{{ route('shop.show', $product->id) }}"><div class="product-keywords">{{ $product->seo_keywords }}</div></a></li>
                        @endforeach
                    </ul>
                </div> <!--End widget-->  
            
            </div> <!-- /.col -->
    
        </div> <!-- /.row -->
      

    </section><!--End blog single section-->

    


   

@endsection

@section('extra-js')
<link href="css/animate.css" rel="stylesheet">
    <link href="css/font-awesome/font-awesome.min.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet" />
    <link href="css/YTPlayer.css" rel="stylesheet" />
    <link rel="stylesheet" href="inc/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="inc/owlcarousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="inc/revolution/css/settings.css" />
    <link rel="stylesheet" href="inc/revolution/css/layrs.css" />
    <link rel="stylesheet" href="inc/revolution/css/navigation.css" />
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection