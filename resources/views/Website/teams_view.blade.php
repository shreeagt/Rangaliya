
@extends('layouts.main')
@push('title')
<title>teams</title> 
@endpush
@section('main-section')

@component('components.breadcrumbs')
<a href="/">Home</a>
<i class="fa fa-chevron-right breadcrumb-separator"></i>
<span><a href="{{ route('team') }}">teams</a></span>
<i class="fa fa-chevron-right breadcrumb-separator"></i>
<span>{{$team_details->name}}</span>
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
                    {{-- {{dd($team_details)}} --}}
                    <div class="postMedia">                    
                        <img  src="<?php echo env('IMAGE_URL_CONSTANT').$team_details->profile_image ?>" class="parallax-inner back-img desktop-image w-100" alt="{{$team_details->name}}">
                    </div><!--Post image-->

                    <div class="postMeta clearfix">
                        <div class="postMeta-info">
                            <span class="metaAuthor"><i class="fa fa-user"></i> <a href="#">Admin</a></span>
                            <span class="metaCategory"><i class="fa fa-folder"></i> <a href="#">Research</a></span>
                            <span class="metaComment"><i class="fa fa-comments"></i> <a href="#">3 comments</a></span>
                        </div>
                        <div class="postMeta-date">
                            <span class="time"><i class="fa fa-calendar"></i>
                                {{Carbon\Carbon::parse($team_details->created_at)->format('M d, Y')}}</span>
                        </div>
                    </div><!--Post meta-->

                    <div class="postTitle">
                        <h1>{{ $team_details->name }}</h1>
                        <div class="divider-small"></div>
                    </div> <!--Post title-->  

                    <p>{{$team_details->designation}}</p>
                                                                           
                </div>
                <!--End post single-->            
              
            </div> <!-- /.col -->

        </div> <!-- /.row -->
    
    </div> <!-- /.container -->

</section><!--End blog single section-->
@endsection