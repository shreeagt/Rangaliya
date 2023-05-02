


<header class="nav-solid" id="home">

<nav class="navbar navbar-fixed-top">
    <div class="navigation">
        <div class="container-fluid">
            <div class="row">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Logo -->
                    <div class="logo-container">
                        <div class="logo-wrap local-scroll">
                        <a href="/">Webeasty</a>
                        @if (! (request()->is('checkout') || request()->is('guestCheckout')))

                        {{-- {{ menu('main', 'partials.menus.main') }} --}}
                        @endif
                    
                      </div>
                </div> 
         </div><!-- end navbar-header -->

                <div class="col-md-8 col-xs-12 nav-wrap">

                    <div class="collapse navbar-collapse" id="navbar-collapse">


                        <ul class="nav navbar-nav navbar-right">

                        @if (! (request()->is('checkout') || request()->is('guestCheckout')))
                            @include('partials.menus.main-right')
                        @endif


                  
                        </ul>

                    </div>
                </div> <!-- /.col -->

            </div> <!-- /.row -->
        </div> <!--/.container -->
    </div> <!-- /.navigation-overlay -->
</nav> <!-- /.navbar -->

</header>
