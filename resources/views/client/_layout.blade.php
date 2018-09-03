<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Repair</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="{{asset('storage/client/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('storage/client/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('storage/client/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('storage/client/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('storage/client/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('storage/client/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('storage/client/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('storage/client/css/main.css')}}">
    <style>
        @font-face {
            font-family: myFont;
            src: url('/storage/client/fonts/Roboto-Regular.ttf')
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: myFont !important;
        }

        .single-service a {
            color: #222;
        }

        .single-service a:hover {
            color: #988fff;
        }

        .single-blog h5 {
            height: 60px;
        }

        p.subtitle {
            margin-bottom: 5px;
        }

        .banner-area {
            background-position: center;
            background-size: cover;
        }

        #header {
            padding-bottom: 5px;
        }

        .main-menu {
            padding-top: 5px;
        }
    </style>
</head>

<body>
    @include('client.layout.header') @yield('content')
    @include('client.elements.customers')

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">

            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Agency</h6>
                        <p>
                            The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather
                            look at a presentation and understand the message. It has come to a point
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Navigation Links</h6>
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Feature</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Pricing</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>
                            For business professionals caught between high OEM price and mediocre print and graphic output.
                        </p>
                        <div id="mc_embed_signup">
                            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscription relative">
                                <div class="input-group d-flex flex-row">
                                    <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
                                        required="" type="email">
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                    </div>
                                    <button class="btn bb-btn"><span class="lnr lnr-location"></span></button>
                                </div>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">InstaFeed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="img/i1.jpg" alt=""></li>
                            <li><img src="img/i2.jpg" alt=""></li>
                            <li><img src="img/i3.jpg" alt=""></li>
                            <li><img src="img/i4.jpg" alt=""></li>
                            <li><img src="img/i5.jpg" alt=""></li>
                            <li><img src="img/i6.jpg" alt=""></li>
                            <li><img src="img/i7.jpg" alt=""></li>
                            <li><img src="img/i8.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i>                    by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="{{asset('storage/client/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="{{asset('storage/client/js/vendor/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="{{asset('storage/client/js/easing.min.js')}}"></script>
    <script src="{{asset('storage/client/js/hoverIntent.js')}}"></script>
    <script src="{{asset('storage/client/js/superfish.min.js')}}"></script>
    <script src="{{asset('storage/client/js/mn-accordion.js')}}"></script>
    <script src="{{asset('storage/client/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('storage/client/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('storage/client/js/owl.carousel.min.js ')}}"></script>
    <script src="{{asset('storage/client/js/jquery.nice-select.min.js ')}}"></script>
    <script src="{{asset('storage/client/js/jquery.circlechart.js ')}}"></script>
    <script src="{{asset('storage/client/js/mail-script.js ')}}"></script>
    <script src="{{asset('storage/client/js/main.js ')}}"></script>
</body>

</html>