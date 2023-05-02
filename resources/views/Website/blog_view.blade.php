
@extends('layouts.main')
@push('title')
<title>blogs</title> 
@endpush
@section('main-section')

@component('components.breadcrumbs')
<a href="/">Home</a>
<i class="fa fa-chevron-right breadcrumb-separator"></i>
<span><a href="{{ route('blog.index') }}">blogs</a></span>
<i class="fa fa-chevron-right breadcrumb-separator"></i>
<span>{{$blog_details->blog_title}}</span>
<style> 
.service_image{
    text-align: left;
}
</style>
@endcomponent
 <!--BLog single section-->
 <section id="blog-single" class="p-top-80 p-bottom-80">

    <!--Container-->
    <div class="container clearfix">

        <div class="row">

            <div class="col-xs-12">
                
                <!--Post Single-->
                <div class="postSingle">               
                    
                    <div class="postMedia">                    
                        <img  src="<?php echo env('IMAGE_URL_CONSTANT').$blog_details->blog_banner ?>" class="parallax-inner back-img desktop-image w-100" alt="{{$blog_details->blog_title}}">
                    </div><!--Post image-->

                    <div class="postMeta clearfix">
                        <div class="postMeta-info">
                            <span class="metaAuthor"><i class="fa fa-user"></i> <a href="#">Admin</a></span>
                            <span class="metaCategory"><i class="fa fa-folder"></i> <a href="#">Research</a></span>
                            <span class="metaComment"><i class="fa fa-comments"></i> <a href="#">3 comments</a></span>
                        </div>
                        <div class="postMeta-date">
                            <span class="time"><i class="fa fa-calendar"></i>
                                {{Carbon\Carbon::parse($blog_details->created_at)->format('M d, Y')}}</span>
                        </div>
                    </div><!--Post meta-->

                    <div class="postTitle">
                        <h1>{{ $blog_details->blog_title }}</h1>
                        <div class="divider-small"></div>
                    </div> <!--Post title-->  

                    <p>{{$blog_details->blog_description}}</p>
                                                                           
                </div>
                <!--End post single-->            
            
                <!--Comments--> 
                <div class="comments m-top-60">
                    <h4>3 Comments</h4>
                    
                    
                    <!--Entries container-->    
                    <div class="entriesContainer">                                                                      

                        <!--Comments and replys-->
                        <ul class="comments-list clearfix">
                            <li>

                                <div class="comment"> 
                                    <div class="img">
                                        <i class="fa fa-user"></i>
                                    </div>  
                                    <div class="commentContent">
                                        <div class="commentsInfo">
                                            <div class="author"><a href="#">David Doe</a></div>
                                            <div class="date"><a href="#">January 19, 2017 at 12 am</a></div>
                                        </div>
                                        <p class="expert">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur tempor vehicula porta. Phasellus magna arcu, commodo non porta vulputate, mattis eget lacus. Nulla eget leo ipsum.</p>
                                    </div>

                                    <div class="reply-btn">
                                        <a href="#replyForm" class="replyDisplay">Reply</a>
                                    </div> 
                                </div>


                                <ul class="replys">
                                    <li>

                                        <div class="comment children">
                                            <div class="img"><i class="fa fa-user"></i></div> 
                                        <div class="commentContent">
                                            <div class="commentsInfo">
                                                <div class="author"><a href="#">Admin</a></div>
                                                <div class="date"><a href="#">January 19, 2017 at 3 am</a></div>
                                            </div>
                                            <p class="expert">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur tempor vehicula porta.Phasellus magna arcu, commodo non porta vulputate, mattis eget lacus. Nulla eget leo ipsum.</p>
                                        </div>

                                        <div class="reply-btn">
                                        <a href="#replyForm" class="replyDisplay">Reply</a></div> 
                                        </div>

                                    </li>
                                </ul>

                            </li>

                            <li>

                                <ul class="replys children">
                                    <li>
                                        <div class="comment children">
                                            <div class="img"><i class="fa fa-user"></i></div> 
                                            <div class="commentContent">
                                                <div class="commentsInfo">
                                                    <div class="author"><a href="#">David Doe</a></div>
                                                    <div class="date"><a href="#">January 19, 2017 at 10 am</a></div>
                                                </div>
                                                <p class="expert">Thanks for the quick response.</p>
                                            </div>

                                            <div class="reply-btn"><a href="#replyForm" class="replyDisplay">Reply</a></div> 
                                        </div>
                                    </li>
                                </ul> <!--End replys children-->

                            </li>

                        </ul> <!--End comments and replys-->

                    </div><!--End  entries container -->  
                    
                </div><!--End comments--> 
            
            
                <!--Respond-->
                <div class="respond m-top-60">
                    <h4 class="m-bottom-20">Leave a comment</h4>
                
                    <!--Reply form-->
                    <div class="replyForm">
                        <form method="post" action="#">

                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" placeholder="Name *" name="name" >
                                </div>
                                <div class="col-md-6">
                                <input type="email" placeholder="Email *" name="email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" placeholder="WebSite" name="website" >
                                </div>
                            </div>

                            <textarea name="message"  placeholder="Message *" id="message" cols="45" rows="10"></textarea>

                            <button class="btn btn-main m-bottom-40">Post Comment</button>

                        </form>
                        
                        
                        <!--Reply form message-->
                        <div id="success"><h2>Your message has been sent. Thank you!</h2></div>
                        <div id="error"><h2>Sorry your message can not be sent.</h2></div>
                        <!--End reply form message-->

                    </div><!--End reply form-->       
                </div><!--End respond-->       

            </div> <!-- /.col -->

        </div> <!-- /.row -->
    
    </div> <!-- /.container -->

</section><!--End blog single section-->
@endsection