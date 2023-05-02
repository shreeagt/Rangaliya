@extends('layouts.main')
@push('title')
<title>contact</title>  
@endpush
@section('main-section')
<section id="contact" class="p-top-80 p-bottom-50">


    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-40">
                    <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Contact</h2>
                    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                    <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>Lose away
                            off why half led have near bed. At engage simple father of period others except. My giving
                            do summer time dance hero of though narrow marked at.</em></p>
                </div>
            </div> <!-- /.col -->
        </div> <!-- /.row -->

        <div class="row">

            <!-- === Contact Form === -->
            <div class="col-md-7 col-sm-7 p-bottom-30">
                <div class="contact-form row">

                    <form name="ajax-form" id="ajax-form" action="contact.php" method="post">
                        <div class="col-sm-6 contact-form-item wow zoomIn">
                            <input name="name" id="name" type="text" placeholder="Your Name: *" />
                            <span class="error" id="err-name">please enter name</span>
                        </div>
                        <div class="col-sm-6 contact-form-item wow zoomIn">
                            <input name="email" id="email" type="text" placeholder="E-Mail: *" />
                            <span class="error" id="err-email">please enter e-mail</span>
                            <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                        </div>
                        <div class="col-sm-12 contact-form-item wow zoomIn">
                            <textarea name="message" id="message" placeholder="Your Message"></textarea>
                        </div>
                        <div class="col-sm-12 contact-form-item">
                            <button class="send_message btn btn-main btn-theme wow fadeInUp" id="send"
                                data-lang="en">submit</button>
                        </div>
                        <div class="clear"></div>
                        <div class="error text-align-center" id="err-form">There was a problem validating the form
                            please check!</div>
                        <div class="error text-align-center" id="err-timedout">The connection to the server timed out!
                        </div>
                        <div class="error" id="err-state"></div>
                    </form>

                    <div class="clearfix"></div>
                    <div id="ajaxsuccess">Successfully sent!!</div>
                    <div class="clear"></div>

                </div> <!-- /.contacts-form & inner row -->
            </div> <!-- /.col -->

            <!-- === Contact Information === -->
            <div class="col-md-5 col-sm-5 p-bottom-30">
                <address class="contact-info">

                    <p class="m-bottom-30 wow slideInRight">Spring formal no county ye waited. My whether cheered at
                        regular it of promise blushes perhaps.</p>

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
@endsection