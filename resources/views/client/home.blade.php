@extends('client._layout') 
@section('content')
<!-- Start service Area -->
<section class="service-area section-gap" id="service">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-50 pt-50 header-text text-center">
                <h1 class="mb-10">Sản phẩm - Giải pháp</h1>
                <p class="subtitle">
                    Chúng tôi cung cấp các giải pháp công nghệ với chất lượng tối ưu nhằm 
                </p>
                <p class="subtitle">thỏa mãn tối đa nhu cầu của khách hàng</p>
            </div>
        </div>
        <div class="row">
            @foreach ($productCategories as $item)
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

<!-- Start blog Area -->
<section class="blog-area section-gap p-0" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-50 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Tin tức - sự kiện</h1>
                    <p>Tổng hợp những tin tức, hoạt động mới nhất của ...</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($latestPosts as $item)
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="{{asset($item->cover_image)}}" alt="">
                </div>
                <p class="meta" style="margin-top: 10px"><i class="fa fa-calendar mr-10"></i> {{date('d/m/y', strtotime($item->created_at))}}</p>
                <a href="blog-single.html">
                    <h5>{{strlen($item->title) > 40?mb_substr($item->title, 0, 40):$item->title}}</h5>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End blog Area -->

@endsection