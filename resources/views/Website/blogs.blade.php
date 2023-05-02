@extends('layouts.main')
@push('title')
<title>blogs</title> 
@foreach ($blogs as $item)
    <meta property="og:title" content="{{$item->meta_title}}">
    <meta property="og:site_name" content="webeasty">
    <meta property="og:description" content="{{$item->og_desc}}">
    <meta property="og:image" content="{{$item->og_image}}">
@endforeach
@endpush
@section('main-section')

{{-- @component('components.breadcrumbs')
    <a href="/">Home</a>
    <i class="fa fa-chevron-right breadcrumb-separator"></i>
    <span><a href="{{ route('blog.index') }}">blogs</a></span>
  
    
    <style> 
    .service_image{
        text-align: left;
    }
    </style>
    @endcomponent --}}

    <div class="section-title-bg text-center m-bottom-40">
        <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>Our Blogs</strong></h2>
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
                <?php foreach($blogs as $item) { ?>        
                <!-- === Blog item 1 === -->
                <div class="col-sm-6 m-bottom-40">
                    <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="<?php echo url('/blog/'.$item->blog_url); ?>"> 
                                <img src="{{$item->blog_thumbnail}}" alt="{{$item->banner_title}}"/></a>
                        </div><!--post media-->
                        
                        <div class="blog-post-info clearfix">
                            <span class="time"><i class="fa fa-calendar"></i>
                                {{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</span>
                        </div><!--post info-->
                        
                        <div class="blog-post-body">
                            <h4><a class="title" href="<?php echo url('/blog/'.$item->blog_url); ?>">
                                {{ $item->blog_title }} </a></h4>
                            <p class="p-bottom-20">{{ substr($item->blog_description, 0, 150)}}</p>
                            <a href="<?php echo url('/blog/'.$item->blog_url); ?>" class="read-more">Read More >></a>
                        </div><!--post body-->                   
                    </div> <!-- /.blog -->
                </div> <!-- /.inner-col -->
              
                <?php } ?>
            </div> <!-- /.inner-row -->

            <div class="blog-pagination">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        {{ $blogs->links() }}
                    </ul>
                </nav>
            </div> <!-- /.blog-pagination -->

        </div> <!-- /.col -->               
            
            
        <div class="col-md-4 sidebar">
        
            <!-- Widget 1 -->
            <div class="widget widget-search">
                <form action="#" class="search-form">
                 <input type="text" onfocus="if(this.value == 'Search') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search'; }"  value="Search">
                 <input type="submit" class="submit-search" value="Ok">
               </form>
            </div> <!--End widget-->

             <!-- Widget 3 -->
             <div class="widget">
                <h4>RECENT POSTS</h4>
                <ul class="tag-list">
                    <?php foreach($blogsLatest as $latest) { ?>
                        <li><a href="<?php echo url('/blog/'.$latest['blog_url']); ?>" class="blog_head">
                            {{ $latest['blog_title'] }}</a></li>
                    <?php  } ?>
                </ul>
            </div> <!--End widget-->
            
            <!-- Widget 2 -->
            <div class="widget">
                <h4>OUR POPULOR CATEGORIES</h4>
                <ul class="cat-list">
                    <li><a href="<?= env('APP_URL').'/blog/'?>">All</a></li>
                    <?php foreach($blog_categories as $cat) { ?>
                    <li> <a href="<?php echo url('/blog/category/'.$cat->category_slug); ?>">
                        {{ $cat->category_title}} </a> </li>
                    <?php } ?>
                </ul> 
            </div> <!--End widget-->
                           
        </div> <!-- /.col -->

    </div> <!-- /.row -->
    </div> <!-- /.container -->

</section><!--End blog single section-->
@endsection