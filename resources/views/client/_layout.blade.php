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

        a {
            color: #222 !important;
        }

        a:hover {
            color: #988fff !important;
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

        strong {
            font-weight: 900;
        }

        .inline-container p,
        .inline-container div {
            display: inline-block !important;
        }

        ul.custom-list {
            list-style-type: circle;
        }
        ul.custom-list li {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        ul.custom-list ul {
            list-style-type: circle;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    @include('client.layout.header') @yield('content')
    <hr>
    @include('client.elements.customers')

    <!-- start footer Area -->
    <footer class="footer-area section-gap" style="background-color: #f5f5ff">
        <div class="container">

            <div class="row">
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 style="color: #222">Tên công ty</h6>
                        <p>
                            {{SystemInfo::briefInfo()}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 style="color: #222">Liên kết</h6>
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li><a href="#">Trang chủ</a></li>
                                    <li><a href="#">Giới thiệu</a></li>
                                    <li><a href="#">Tin tức - hoạt động</a></li>
                                    <li><a href="#">Đối tác</a></li>
                                    <li><a href="">Tuyển dụng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 style="color: #222">Sản phẩm - giải pháp</h6>
                        <div class="row">
                            <div class="col">
                                <ul>
                                    @foreach (SystemInfo::menus()->take(5) as $item)
                                    <li><a href="{{route('product-category', $item->id)}}">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20" style="color: #222">Liên kết với chúng tôi</h6>
                        <ul class="instafeed d-flex flex-wrap justify-content-start">
                            <li><a href=""><i class="fa fa-facebook-square fa-3x"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin-square fa-3x"></i></a></li>
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