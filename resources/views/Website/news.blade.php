@extends('layouts.main')
@push('title')
<title>News and artical</title>  
@endpush
@section('main-section')


<div class="section-title-bg text-center m-bottom-40">
    <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>News and artical
        </strong></h2>
    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
    <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">We write quality content regularly. check them out!</p>
</div>
  
    <!--BLog single section-->
    <section class="blog-index">

        <!--Container-->
        <div class="container clearfix">
            <div class="row multi-columns-row">
                <!-- === Blog item 1 === -->
                <?php
                //dd($case);
                ?>
                <?php foreach($news as $item) { ?>  
                <div class="col-sm-6 m-bottom-40">
                    <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="<?php echo url('/news/'.$item->news_url); ?>">
                                <img src="{{$item->news_thumbnail}}" alt="{{$item->news_title}}"/></a>
                        </div><!--post media-->
                        
                        <div class="blog-post-info clearfix">
                            <span class="time"><i class="fa fa-calendar"></i>
                                {{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</span>
                        </div><!--post info-->
                        
                        <div class="blog-post-body">
                            <h4><a class="title" href="<?php echo url('/news/'.$item->news_url); ?>">
                                {{ $item->news_title }} </a></h4>
                            <p class="p-bottom-20">{{$item->news_description}}</p>
                            <a href="<?php echo url('/news/'.$item->news_url); ?>" class="read-more">Read More >></a>
                        </div>
                        <!--post body-->                   
                    </div> <!-- /.blog -->
                </div> <!-- /.inner-col -->
                <?php } ?>

                <div class="blog-pagination">
                    {{-- <nav aria-label="Page navigation">
                        <ul class="pagination">
                            {{ $news->links() }}
                        </ul>
                    </nav> --}}
                </div> <!-- /.blog-pagination -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section><!--End blog single section-->
@endsection