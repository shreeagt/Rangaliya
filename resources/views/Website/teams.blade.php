@extends('layouts.main')
@push('title')
<title>teams</title>  
@endpush
@section('main-section')
 
{{-- {{dd($teams)}} --}}

<div class="section-title-bg text-center m-bottom-40">
    <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s"><strong>Our Teams
        </strong></h2>
    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
    <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">We write quality content regularly. check them out!</p>
</div>
<section id="team" class="p-top-80 p-bottom-50">
    <div class="container">
        <div class="row">
            <?php foreach($teams as $item) { ?>
            <!-- === Team Item 1 === -->               
            <div class="col-md-3 col-sm-6 col-xs-6 p-bottom-30">
             
                     <div class="team-item wow zoomIn animated" data-wow-duration="1s" data-wow-delay="0.9s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.9s; animation-name: zoomIn;">
                    <div class="team-item-image">

                        <a href="<?php echo url('/teams/'.$item->team_url); ?>">
                            <img src="{{$item->profile_image}}" alt="{{$item->name}}"/>
                        </a>
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
@endsection