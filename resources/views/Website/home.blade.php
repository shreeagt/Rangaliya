@extends('layouts.main')
@push('title')
<title>Home</title>  
@endpush
@section('main-section')



    <section class="parallax-bg" style="background-image: url('/img/webeasty-img/img/index_2-banner.jpg'); background-position: 50% 0px;" data-stellar-background-ratio="0.5">
        <!-- Section Title -->
            <div class="js-height-full container" style="height: 640px;">
                <div class="intro-content white-color text-center vertical-section">
                    <div class="vertical-content">
                    <h4 class="wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.8s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.8s; animation-name: fadeInDown;">Welcome to Ecommerce</h4>
                    <h1 class="wow zoomIn m-bottom-20 animated" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: zoomIn;">Responsive Agenecy Template</h1>
                    <a data-scroll="" href="#portfolio" class="btn btn-main btn-theme wow fadeInUp animated" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">View PortFolio</a>
                    </div>
                </div>
                <!-- Scroll Down -->
                <div class="scroll-next">
                    <a data-scroll="" href="#services" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                </div>
                <!-- End Scroll Down -->
            </div>
        </section>


        <section id="services" class="p-top-80 p-bottom-40">
            <div class="container">
                <div class="row">
    
                    <!-- Service Item 1 -->                  
                    <div class="col-md-4 m-bottom-20">              
                        <div class="service service-type-2 wow fadeIn animated" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeIn;">               
                            <div class="service-header clearfix">
                                <div class="service-icon pull-left">
                                    <i class="fa fa-desktop" aria-hidden="true"></i>
                                </div>
                                <h4>Our product</h4>
                            </div>
                            <div class="service-text">
                                <p>On at tolerably depending do perceived. Luckily eat joy see own shyness minuter. So before remark at depart Did son unreserved.</p>
                            </div>
                        </div>                   
                    </div> <!-- /.col -->
    
                    <!-- Service Item 2 -->                  
                    <div class="col-md-4 m-bottom-20">              
                        <div class="service service-type-2 wow fadeIn animated" data-wow-duration="1s" data-wow-delay="0.8s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.8s; animation-name: fadeIn;">               
                            <div class="service-header clearfix">
                                <div class="service-icon pull-left">
                                    <i class="fa fa-modx" aria-hidden="true"></i>
                                </div>
                                <h4>Our product</h4>
                            </div>
                            <div class="service-text">
                                <p>There spoke happy for you are out. Fertile how old address did showing because sitting replied six. Luckily eat joy see own shyness minuter.</p>
                            </div>
                        </div>                   
                    </div> <!-- /.col -->
    
                    <!-- Service Item 3 -->                  
                    <div class="col-md-4 m-bottom-20">              
                        <div class="service service-type-2 wow fadeIn animated" data-wow-duration="1s" data-wow-delay="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 1s; animation-name: fadeIn;">               
                            <div class="service-header clearfix">
                                <div class="service-icon pull-left">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                </div>
                                <h4>Our product</h4>
                            </div>
                            <div class="service-text">
                                <p>So striking at of to welcomed resolved. North by described up household therefore attention. Excellence decisively nay man yet impress.</p>
                            </div>
                        </div>                   
                    </div> <!-- /.col -->
    
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


        <section id="about" class="light-bg p-top-80 p-bottom-40">
            <div class="container">
                <div class="row">
    
                    <div class="col-md-6 m-bottom-30">
                      
                        <img src="{{asset('img/webeasty-img/img/about-us.jpg')}}" alt="About Image" class="img-responsive wow fadeInLeft animated" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInLeft;">
                    </div> <!-- /.col -->
    
                    <div class="col-md-6">
                        <!-- Section Title -->
                        <div class="m-bottom-30">
                            <h2 class="wow fadeInRight animated" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInRight;">About Our Agency</h2>
                            <div class="divider-small wow zoomIn animated" data-wow-duration="1s" data-wow-delay="0.7s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.7s; animation-name: zoomIn;"></div>
                        </div>
                        <div class="wow fadeInRight animated" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInRight;">
                            <p>Six started far placing saw respect females old. Civilly why how end viewing attempt related enquire visitor. Man particular insensible celebrated conviction stimulated principles day. Sure fail or in said west. Right my front it wound cause fully am sorry if. She jointure goodness interest debating did outweigh. Is time from them full my gone in went. Of no introduced am literature excellence mr stimulated contrasted increasing.</p>
                            <p>Up colonel so between removed so do. Years use place decay sex worth drift age. Men lasting out end article express fortune demands own charmed.</p>
                        </div>
                        <a data-scroll="" href="#contact" class="m-top-30 btn btn-main btn-theme wow fadeInUp animated" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">Contact Us</a>
                    </div> <!-- /.col -->
    
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>

        <section class="light-bg p-bottom-60">
            <div class="container">
                <div class="row">
    
                    <div class="col-md-6">
                        <!-- === Progress item 1 === -->
                        <div class="progress-heading clearfix  wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                            <h6 class="pull-left">Coding</h6>
                            <p class="pull-right">80%</p>
                        </div>
                        <div class="progress progress-thin">
                            <div class="progress-bar wow zoomIn animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;" data-wow-delay="0.3s"></div>
                        </div>
    
                        <!-- === Progress item 2 === -->
                        <div class="progress-heading clearfix wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                            <h6 class="pull-left">Design</h6>
                            <p class="pull-right">90%</p>
                        </div>
                        <div class="progress progress-thin">
                            <div class="progress-bar wow zoomIn animated" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%; visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;" data-wow-delay="0.3s"></div>
                        </div>
                    </div> <!-- /.col -->
    
                    <div class="col-md-6">
                        <!-- === Progress item 3 === -->
                        <div class="progress-heading clearfix wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                            <h6 class="pull-left">Branding</h6>
                            <p class="pull-right">60%</p>
                        </div>
                        <div class="progress progress-thin">
                            <div class="progress-bar wow zoomIn animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%; visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;" data-wow-delay="0.3s"></div>
                        </div>
    
                        <!-- === Progress item 4 === -->
                        <div class="progress-heading clearfix wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                            <h6 class="pull-left">Marketing</h6>
                            <p class="pull-right">73%</p>
                        </div>
                        <div class="progress progress-thin">
                            <div class="progress-bar wow zoomIn animated" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%; visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;" data-wow-delay="0.3s"></div>
                        </div>
                    </div> <!-- /.col -->
    
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>

{{--
          <!-- Start Portfolio -->
    <section id="portfolio" class="p-top-80">
        <div class="container-fluid no-padding">

            <!-- Section Title -->
            <div class="section-title text-center m-bottom-30">
                <h2>Portfolio</h2>
                <div class="divider-center-small"></div>
            </div>

            <!-- Portfolio-filter -->
            <ul class="pf-filter pf-filter-gray text-center list-inline">
                <li><a href="#" data-filter="*" class="iso-active iso-button">All</a></li>
                <li><a href="#" data-filter=".graphic" class="iso-button">Graphic</a></li>
                <li><a href="#" data-filter=".webdesign" class="iso-button">Web Design</a></li>
                <li><a href="#" data-filter=".branding" class="iso-button">Branding</a></li>
                <li><a href="#" data-filter=".video" class="iso-button">Video</a></li>
            </ul>           

            <!-- Portfolio -->
            <div class="portfolio portfolio-isotope col-4">

                <!-- Portfolio Item -->
                <div class="pf-item branding">
                    <a href="img/portfolio/1.jpg" class="pf-style lightbox-image mfp-image">
                        <div class="pf-image">
                           
                            <img src="{{asset('img/webeasty-img/img/portfolio/1.jpg')}}" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <div class="overlay-content">
                                        <div class="pf-info white-color">
                                            <h4 class="pf-title">Project Name</h4>
                                            <p>Branding</p>
                                        </div> <!-- .pf-info -->
                                    </div> <!-- .overlay-content -->
                                </div> <!-- .overlay-caption -->
                            </div> <!-- .overlay -->
                        </div> <!-- .pf-image -->
                    </a> <!-- .pf-style -->
                </div>

                <!-- Portfolio Item -->
                <div class="pf-item graphic webdesign">
                    <a href="{{asset('img/webeasty-img/img/portfolio/2.jpg')}}" class="pf-style lightbox-image mfp-image">
                        <div class="pf-image">
                            
                            <img src="{{asset('img/webeasty-img/img/portfolio/2.jpg')}}" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <div class="overlay-content">
                                        <div class="pf-info white-color">
                                            <h4 class="pf-title">Project Name</h4>
                                            <p>Graphic, Web Design</p>
                                        </div> <!-- .pf-info -->
                                    </div> <!-- .overlay-content -->
                                </div> <!-- .overlay-caption -->
                            </div> <!-- .overlay -->
                        </div> <!-- .pf-image -->
                    </a> <!-- .pf-style -->
                </div>

                <!-- Portfolio Item -->
                <div class="pf-item video webdesign">
                    <a href="https://www.youtube.com/watch?v=6D-A6CL3Pv8" class="pf-style lightbox-video mfp-iframe">
                        <div class="pf-image">
                            <img src="{{asset('img/webeasty-img/img/portfolio/3.jpg')}}" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <div class="overlay-content">
                                        <div class="pf-info white-color">
                                            <h4 class="pf-title">Project Name</h4>
                                            <p>Video, Web Design</p>
                                        </div> <!-- .pf-info -->
                                    </div> <!-- .overlay-content -->
                                </div> <!-- .overlay-caption -->
                            </div> <!-- .overlay -->
                        </div> <!-- .pf-image -->
                    </a> <!-- .pf-style -->
                </div>

                <!-- Portfolio Item -->
                <div class="pf-item video webdesign">
                    <a href="https://www.youtube.com/watch?v=6D-A6CL3Pv8" class="pf-style lightbox-video mfp-iframe">
                        <div class="pf-image">
                            
                            <img src="{{asset('img/webeasty-img/img/portfolio/4.jpg')}}" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <div class="overlay-content">
                                        <div class="pf-info white-color">
                                            <h4 class="pf-title">Project Name</h4>
                                            <p>Video, Web Design</p>
                                        </div> <!-- .pf-info -->
                                    </div> <!-- .overlay-content -->
                                </div> <!-- .overlay-caption -->
                            </div> <!-- .overlay -->
                        </div> <!-- .pf-image -->
                    </a> <!-- .pf-style -->
                </div>

                <!-- Portfolio Item -->
                <div class="pf-item branding graphic">
                    <a href="{{asset('img/webeasty-img/img/portfolio/5.jpg')}}" class="pf-style lightbox-image mfp-image">
                        <div class="pf-image">
                            
                            <img src="{{asset('img/webeasty-img/img/portfolio/5.jpg')}}" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <div class="overlay-content">
                                        <div class="pf-info white-color">
                                            <h4 class="pf-title">Project Name</h4>
                                            <p>Branding, Graphic</p>
                                        </div> <!-- .pf-info -->
                                    </div> <!-- .overlay-content -->
                                </div> <!-- .overlay-caption -->
                            </div> <!-- .overlay -->
                        </div> <!-- .pf-image -->
                    </a> <!-- .pf-style -->
                </div>

                <!-- Portfolio Item -->
                <div class="pf-item branding graphic">
                    <a href="{{asset('img/webeasty-img/img/portfolio/6.jpg')}}" class="pf-style lightbox-image mfp-image">
                        <div class="pf-image">
                     
                            <img src="{{asset('img/webeasty-img/img/portfolio/6.jpg')}}" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <div class="overlay-content">
                                        <div class="pf-info white-color">
                                            <h4 class="pf-title">Project Name</h4>
                                            <p>Branding, Graphic</p>
                                        </div> <!-- .pf-info -->
                                    </div> <!-- .overlay-content -->
                                </div> <!-- .overlay-caption -->
                            </div> <!-- .overlay -->
                        </div> <!-- .pf-image -->
                    </a> <!-- .pf-style -->
                </div>

                <!-- Portfolio Item -->
                <div class="pf-item branding graphic">
                    <a href=" {{asset('img/webeasty-img/img/portfolio/7.jpg')}}" class="pf-style lightbox-image mfp-image">
                        <div class="pf-image">
                           
                            <img src="{{asset('img/webeasty-img/img/portfolio/7.jpg')}}" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <div class="overlay-content">
                                        <div class="pf-info white-color">
                                            <h4 class="pf-title">Project Name</h4>
                                            <p>Branding, Graphic</p>
                                        </div> <!-- .pf-info -->
                                    </div> <!-- .overlay-content -->
                                </div> <!-- .overlay-caption -->
                            </div> <!-- .overlay -->
                        </div> <!-- .pf-image -->
                    </a> <!-- .pf-style -->
                </div>

                <!-- Portfolio Item -->
                <div class="pf-item branding webdesign">
                    <a href="{{asset('img/webeasty-img/img/portfolio/8.jpg')}}" class="pf-style lightbox-image mfp-image">
                        <div class="pf-image">
                            
                            <img src="{{asset('img/webeasty-img/img/portfolio/8.jpg')}}" alt="">
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <div class="overlay-content">
                                        <div class="pf-info white-color">
                                            <h4 class="pf-title">Project Name</h4>
                                            <p>Branding, Web Design</p>
                                        </div> <!-- .pf-info -->
                                    </div> <!-- .overlay-content -->
                                </div> <!-- .overlay-caption -->
                            </div> <!-- .overlay -->
                        </div> <!-- .pf-image -->
                    </a> <!-- .pf-style -->
                </div>

            </div> <!-- Portfolio -->
            
        </div> <!-- /.container -->
    </section>
    <!-- End Portfolio -->

    --}}

{{-- {{dd($teams)}} --}}
<section id="team" class="p-top-80 p-bottom-50">
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-40">
                    <h2 class="wow fadeInDown animated" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInDown;">Team Members</h2>
                    <div class="divider-center-small wow zoomIn animated" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: zoomIn;"></div>
                    <p class="section-subtitle wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0.6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInUp;"><em>Resolution possession discovered surrounded advantages has but few add. Yet walls times spoil put. Be it reserved contempt rendered smallest. Studied to passage it mention calling believe an.</em></p>
                </div>
            </div> <!-- /.col -->
        </div>  <!-- /.row -->

        <div class="row">
            <?php foreach($teams as $item) { ?>
            <!-- === Team Item 1 === -->               
            <div class="col-md-3 col-sm-6 col-xs-6 p-bottom-30">
                <div class="team-item wow zoomIn animated" data-wow-duration="1s" data-wow-delay="0.9s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.9s; animation-name: zoomIn;">
                    <div class="team-item-image">
                        <div class="team-item-image-overlay">
                            <div class="team-item-icons">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        <img src="{{$item->profile_image}}" class="w-100 " alt="{{$item->name}}"/>
                    </div>
                    <div class="team-item-info">
                        <div class="team-item-name">
                            {{$item->name}}
                        </div>
                        <div class="team-item-position">
                            {{$item->designation}} 
                        </div>
                    </div>
                </div>
            </div> <!-- /.col -->
            <?php } ?>
        </div> <!-- /.row -->
        <div class="blog-pagination m-top-20">
            <nav aria-label="Page navigation">

                {{ $teams->links() }}

            </nav>
        </div> <!-- /.blog-pagination -->
    </div> <!-- /.container -->
</section>
        
    <!-- Start Stat -->
    <section id="stat" class="parallax-bg overlay-dark p-top-80 p-bottom-40 white-color" style="background-image:url('/img/webeasty-img/img/stat-bg.jpg')" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                
                <!-- === Stats Item 1 === -->
                <div class="col-md-3 col-sm-6 p-bottom-40">
                    <div class="stat-item stat-item-type-2 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="stat-item-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="stat-item-number">
                            177
                        </div>
                        <div class="stat-item-text">
                            Projects Done
                        </div>
                    </div>
                </div> <!-- /.col -->
                
                <!-- === Stats Item 2 === -->
                <div class="col-md-3 col-sm-6 p-bottom-40">
                    <div class="stat-item stat-item-type-2 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.4s">
                        <div class="stat-item-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="stat-item-number">
                            123
                        </div>
                        <div class="stat-item-text">
                            Happy Clients
                        </div>
                    </div>
                </div> <!-- /.col -->
                
                <!-- === Stats Item 3 === -->
                <div class="col-md-3 col-sm-6 p-bottom-40">
                    <div class="stat-item stat-item-type-2 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="stat-item-icon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                        <div class="stat-item-number">
                            999
                        </div>
                        <div class="stat-item-text">
                            Likes Gained
                        </div>
                    </div>
                </div> <!-- /.col -->
                
                <!-- === Stats Item 4 === -->
                <div class="col-md-3 col-sm-6 p-bottom-40">
                    <div class="stat-item stat-item-type-2 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s">
                        <div class="stat-item-icon">
                            <i class="fa fa-trophy"></i>
                        </div>
                        <div class="stat-item-number">
                            101
                        </div>
                        <div class="stat-item-text">
                            Awards Received
                        </div>
                    </div>
                </div> <!-- /.col -->
                
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <!-- End Stat -->



    <!-- Start Testimonial -->
    <section id="testimonials" class="light-bg p-top-80 p-bottom-80">

        <!-- Section Icon -->
        <div class="testimonial-icon text-center wow bounceIn" data-wow-delay="0.9s">
             <i class="fa fa-comments-o"></i>
         </div>

        <!-- Section Title -->
        <div class="section-title text-center m-bottom-40">
            <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Testimonials</h2>
            <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
        </div>

        <!-- === Testimonials === -->
        <div id="owl-testimonials" class="owl-carousel owl-theme testimonial text-center">
            {{-- <div id="owl-testimonials" class=" testimonial text-center"> --}}
            <!-- === Testimonial item 1 === -->
            <div class="testimonial-item text-center">
                <p class="testimonial-desc">"Residence you satisfied and rapturous certainty two. Procured outweigh as outlived so so. On in bringing graceful proposal blessing of marriage outlived. Son rent face our loud near."</p>
                <h5 class="testimonial-author">Jenny Doe - Star Inc</h5>
            </div>

            <!-- === Testimonial item 2 === -->
            <div class="testimonial-item text-center">
                <p class="testimonial-desc">"Excellent so to no sincerity smallness. Removal request delight if on he we. Unaffected in we by apartments astonished to decisively themselves. Offended ten old consider speaking."</p>
                <h5 class="testimonial-author">Kathy Doe - Service Corp</h5>
            </div>

            <!-- === Testimonial item 3 === -->
            <div class="testimonial-item text-center">
                <p class="testimonial-desc">"Advanced and procured civility not absolute put continue. Overcame breeding or my concerns removing desirous so absolute. My melancholy unpleasing imprudence considered in advantages."</p>
                <h5 class="testimonial-author">Jack Doe - Inka Design</h5>
            </div>

        </div> <!-- /#owl-testimonials -->

    </section>
    <!-- End Testimonial -->

    
    <!-- Start blog -->
    <section id="blog" class="p-top-80 p-bottom-80">

        <!-- Section Title -->
        <div class="section-title text-center m-bottom-40">
            <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Blog Posts</h2>
            <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
        </div>

        <!-- === blog === -->
        <div class="container ">
            <div class="row">
                {{-- <div id="owl-blog" class="owl-carousel owl-theme"> --}}
                    <div id="" class="">
                    <?php foreach($blogs as $item) { ?>
                    <div class="col-sm-4">
                    <!-- === Blog item 1 === -->
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            {{-- <a  href="blog_single_post.html"><img src="{{asset('img/webeasty-img/img/blog/b1.jpg')}}" alt=""></a> --}}
                            <img src="{{$item->blog_thumbnail}}" class="w-100 blog_thumb" alt="{{$item->banner_title}}"/>
                        </div><!--post media-->
                        
                        <div class="blog-post-info clearfix">
                            <p><i class="fa fa-calendar"></i>{{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</p>
                        </div><!--post info-->
                        
                        <div class="blog-post-body">
                            <h4><a class="title" href="#">{{ $item->blog_title }}</a></h4>
                            <p class="p-bottom-20">{{ substr($item->blog_description, 0, 150)}} ...</p>
                            <a href="blog_single_post.html" class="read-more">Read More >></a>
                        </div><!--post body-->                   
                    </div> <!-- /.blog -->

        
                    </div>
                    <?php } ?>
                  
                </div><!-- /#owl-testimonials -->
               

            </div> <!-- /.row -->

            <div class="blog-pagination m-top-20">
                <nav aria-label="Page navigation">

                    {{ $blogs->links() }}

                </nav>
            </div> <!-- /.blog-pagination -->
        </div> <!-- /.container -->

    </section>





    
    <!-- Start client -->
    <section id="client" class="light-bg">

        <div class="container">
            <div class="row">

                <!-- === Clients === -->
                <div class="client client-type-2">

                    <!-- === Client 1 === -->
                    <div class="col-md-2 col-sm-6 col-xs-12 client-item text-center">
                        
                        <img class="img-responsive" src="{{asset('img/webeasty-img/img/client/1.png')}}" alt="">
                    </div>

                    <!-- === Client 2 === -->
                    <div class="col-md-2 col-sm-6 col-xs-12 client-item text-center">
                        <img class="img-responsive" src="{{asset('img/webeasty-img/img/client/2.png')}}" alt="">
                    </div>

                    <!-- === Client 3 === -->
                    <div class="col-md-2 col-sm-6 col-xs-12 client-item text-center">
                        <img class="img-responsive" src="{{asset('img/webeasty-img/img/client/3.png')}}" alt="">
                    </div>

                    <!-- === Client 4 === -->
                    <div class="col-md-2 col-sm-6 col-xs-12 client-item text-center">
                        <img class="img-responsive" src="{{asset('img/webeasty-img/img/client/4.png')}}" alt="">
                    </div>

                    <!-- === Client 5 === -->
                    <div class="col-md-2 col-sm-6 col-xs-12 client-item text-center">
                        <img class="img-responsive" src="{{asset('img/webeasty-img/img/client/5.png')}}" alt="">
                    </div>

                    <!-- === Client 6 === -->
                    <div class="col-md-2 col-sm-6 col-xs-12 client-item text-center">
                        <img class="img-responsive" src="{{asset('img/webeasty-img/img/client/6.png')}}" alt="">
                    </div>

                </div>
                <!-- === Clients End === -->

            </div><!-- /.row -->
        </div><!-- /.container -->

    </section>
    <!-- End client -->

    <!-- Start Contact -->
    <section id="contact" class="dark-bg p-top-80 p-bottom-80">
        <div class="container">
            <div class="row">

                <!-- Section Title -->
                <div class="section-title text-center m-bottom-30">
                    <h2 class="white-color wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Contact</h2>
                    <div class="divider-center-small divider-white wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                    <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>Lose away off why half led have near bed. At engage simple father of period others except. My giving do<br>summer of though narrow marked at.</em></p>
                </div>

                <!-- === Contact Form === -->
                <div class="col-md-7 col-sm-7 p-bottom-30">
                    <div class="contact-form row">

                        <form name="ajax-form" id="ajax-form" action="contact.php" method="post">
                            <div class="col-sm-6 contact-form-item wow zoomIn">
                                <input name="name" id="name" type="text"   placeholder="Your Name: *"/>
                                <span class="error" id="err-name">please enter name</span>
                            </div>
                            <div class="col-sm-6 contact-form-item wow zoomIn">
                                <input name="email" id="email" type="text"  placeholder="E-Mail: *"/>
                                <span class="error" id="err-email">please enter e-mail</span>
                                <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                            </div>
                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <textarea name="message" id="message" placeholder="Your Message"></textarea>
                            </div>
                            <div class="col-sm-12 contact-form-item">
                                <button class="send_message btn btn-main btn-theme wow fadeInUp" id="send" data-lang="en">submit</button>                
                            </div>
                            <div class="clear"></div>   
                            <div class="error text-align-center" id="err-form">There was a problem validating the form please check!</div>
                            <div class="error text-align-center" id="err-timedout">The connection to the server timed out!</div>
                            <div class="error" id="err-state"></div>
                        </form> 
                                    
                        <div class="clearfix"></div>
                        <div id="ajaxsuccess">Successfully sent!!</div>
                        <div class="clear"></div>

                    </div> <!-- /.contacts-form & inner row -->
                </div> <!-- /.col -->

                <!-- === Contact Information === -->
                <div class="col-md-5 col-sm-5">
                    <address class="contact-info">

                        <p class="m-bottom-30 wow slideInRight">Spring formal no county ye waited. My whether cheered at regular it of promise blushes perhaps.</p>

                        <!-- === Location === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-location-arrow"></i>
                            </div>
                            <div class="contact-info-title">
                                Address:
                            </div>
                            <div class="contact-info-text">
                                WeBeasty, Bunglow No. 1, Seven Square Academy Lane, Mira Bhayander Rd, opp. Ideal Park, Bhayandar East, Mira Bhayandar, Maharashtra 401105
                            </div>
                        </div>

                        <!-- === Phone === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-info-title">
                                Phone number:
                            </div>
                            <div class="contact-info-text">
                                +91 9987788934
                            </div>
                        </div>

                        <!-- === Mail === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-info-title">
                                Email:
                            </div>
                            <div class="contact-info-text">
                                {{-- <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=CllgCJTNHMscDDXBZxXhhqtKJNmDdZLMpmNTGsqCTfKXHnGzDPDMqSCkXPkBHZSVWGNchWkSSBB">support@webeasty.com</a> --}}

                                <a href="mailto:support@webeasty.com" target="_blank">support@webeasty.com</a>
                            </div>
                        </div>

                    </address>
                </div> <!-- /.col -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <!-- End Contact -->


@endsection


