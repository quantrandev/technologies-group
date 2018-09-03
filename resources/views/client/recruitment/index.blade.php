@extends('client._layout') 
@section('content')
<!-- Start blog Area -->
<section class="blog-area section-gap pt-120" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-50 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Tuyển dụng</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($recruitments as $item)
            <div class="col-lg-12 col-md-12 single-blog mb-10">
                <h4><i class="fa fa-suitcase fa-2x mr-10"></i> <a href="{{route('recruitment.detail', $item->id)}}">{{$item->title}}</a></h4>
                <div class="clearfix" style="margin: 5px 0 10px">
                    <div class="float-left"><i class="fa fa-calendar"></i> {{date('d-m-y', strtotime($item->created_at))}}</div>
                    <div class="float-left ml-5"><i class="fa fa-folder"></i> Tin tuyển dụng</div>
                </div>
                <p>{{$item->job_title}} <span class="inline-container">{!!mb_substr($item->job_description, 0, 500)!!}</span></p>
                <hr>
            </div>
            @endforeach
            <div class="col-lg-12 col-md-12 mt-40">
                <div class="float-right">
                    {{ $recruitments->appends($_GET)->links('client.elements.pagination', ['elements' => $recruitments]) }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog Area -->
@endsection