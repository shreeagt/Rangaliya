
    <!-- Start Footer -->
    <footer class="site-footer">
        <div class="container">
            <small class="copyright pull-left">Copyrights © 2023 All Rights Reserved By <a href="https://shreeagt.com/">Shree AGT Multimedia</a>.</small>
            <div class="social-icon pull-right">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-google"></i></a>
                <a href="#"><i class="fa fa-rss"></i></a>
                <a href="#"><i class="fa fa-globe"></i></a>
            </div>
            <!-- /social-icon -->
        </div>
        <!-- /container -->
    </footer>
    <!-- End Footer -->

    
    <!-- Back to top -->
    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>
    <!-- /Back to top -->

    
    <!-- jQuery -->

   
    <script src="{{asset('js/webeasty/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/webeasty/bootstrap.min.js') }}"></script>
    
    <!-- Components Plugin -->
   
    <script src=" {{ asset('js/webeasty/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/webeasty/smooth-scroll.js') }}"></script>
    <script src="{{ asset('js/webeasty/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/webeasty/jquery.countTo.js') }}"></script>
    <script src="{{ asset('js/webeasty/jquery.stellar.min.js') }}"></script>  
    <script src="{{ asset('js/webeasty/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/webeasty/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/webeasty/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/webeasty/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{asset('js/webeasty/retina.min.js')}}"></script>
    <script src="{{ asset('js/webeasty/wow.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    
    <!-- Custom Plugin -->
    
    <script src="{{asset('js/webeasty/contact.js')}}"></script>
       
    <script src="{{asset('js/webeasty/custom.js')}}"></script>



       <!-- RS Plugin Extensions -->

       
       <script src="{{ asset('js/webeasty/extensions/revolution.extension.video.min.js') }}"></script>
       <script src="{{ asset('js/webeasty/extensions/revolution.extension.carousel.min.js') }}"></script>
       <script src="{{ asset('js/webeasty/extensions/revolution.extension.slideanims.min.js') }}"></script>
       <script src="{{ asset('js/webeasty/extensions/revolution.extension.actions.min.js') }}"></script>
       <script src="{{ asset('js/webeasty/extensions/revolution.extension.layeranimation.min.js') }}"></script>
       <script src="{{ asset('js/webeasty/extensions/revolution.extension.kenburn.min.js') }}"></script>
       <script src=" {{ asset('js/webeasty/extensions/revolution.extension.navigation.min.js') }}"></script>
       <script src="{{ asset('js/webeasty/extensions/revolution.extension.migration.min.js')}}"></script>
       <script src="{{ asset('js/webeasty/extensions/revolution.extension.parallax.min.js')}}"></script>


       <script>
        var tpj = jQuery;
  
        var revapi280;
        tpj(document).ready(function() {
            if (tpj("#rev_slider_280_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_280_1");
            } else {
                revapi280 = tpj("#rev_slider_280_1").show().revolution({
                    sliderType: "standard",
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 90000,
                    navigation: {
                      keyboardNavigation:"off",
                      keyboard_direction: "horizontal",
                      mouseScrollNavigation:"off",
                      onHoverStop:"off",
                      touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                      }
                      ,
                      arrows: {
                            style: "uranus",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 496,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 20,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 20,
                                v_offset: 0
                            }
                        }
                    },
                    responsiveLevels: [1200, 991, 767, 480],
                    visibilityLevels: [1200, 991, 767, 480],
                    gridwidth: [1200, 991, 767, 480],
                    gridheight: [868, 768, 960, 720],
                    lazyType: "none",
                    parallax: {
                      type:"mouse+scroll",
                      origo:"slidercenter",
                      speed:2000,
                      levels:[2,3,4,5,6,7,12,16,10,50],
                      disable_onmobile:"on"
                    },
                    shadow: 0,
                    spinner: "spinner2",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "0",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        disableFocusListener: false,
                    }
                });
            }
        }); /*ready*/
    </script>
      
<!-- End Navigation -->
</body>
</html>