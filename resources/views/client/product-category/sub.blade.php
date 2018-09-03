@extends('client._layout') 
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.2)),url('{{asset($selectedCategory->cover_image)}}')">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        {{$selectedCategory->name}}
                    </h1>
                    <p class="text-white link-nav"><a href="">Giải pháp</a> <span class="lnr lnr-arrow-right"></span> <a href="">  {{$selectedCategory->name}}</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

<!-- Start service Area -->
<section class="service-area section-gap" id="service">
    <div class="container">
        <div class="row">
            @foreach ($selectedCategory->children as $item)
            <div class="col-lg-3 col-md-6">
                <div class="single-service">
                    <div class="thumb">
                        <img src="{{asset($item->cover_image)}}" alt="">
                    </div>
                    <h4><a href="{{route('product-category', $item->id)}}">{{$item->name}}</a></h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End service Area -->
@endsection