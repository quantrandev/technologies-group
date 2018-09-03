@extends('client._layout') 
@section('content')
<!-- Start blog Area -->
<section class="blog-area section-gap pt-120" id="blog">
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
            @foreach ($listOfNews as $item)
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="{{asset($item->cover_image)}}" alt="">
                </div>
                <p class="meta" style="margin-top: 10px"><i class="fa fa-calendar mr-10"></i> {{date('d/m/y', strtotime($item->created_at))}}</p>
                <a href="{{route('news.detail', $item->id)}}">
                    <h6>{{strlen($item->title) > 70?mb_substr($item->title, 0, 70):$item->title}}</h6>
                </a>
            </div>
            @endforeach
            <div class="col-lg-12 col-md-12 mt-40">
                <div class="float-right">
                    {{ $listOfNews->appends($_GET)->links('client.elements.pagination', ['elements' => $listOfNews]) }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog Area -->
@endsection