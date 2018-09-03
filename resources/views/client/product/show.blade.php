@extends('client._layout') 
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.2)),url('{{asset($selectedProduct->cover_image)}}')">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    {{$selectedProduct->name}}
                </h1>
                <p class="text-white link-nav"><a href="">Giải pháp</a> <span class="lnr lnr-arrow-right"></span> <a href="">
                    {{$selectedProduct->name}}</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
<!-- Start service Area -->
<section class="service-area section-gap" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {!!$selectedProduct->description!!}
            </div>
        </div>
    </div>
</section>
<!-- End service Area -->
@endsection