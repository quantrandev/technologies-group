@extends('client._layout') 
@section('content')
<!-- Start blog Area -->
<section class="blog-area section-gap pt-120" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 pt-50">
                <h4 class="mb-10">{{$selectedNews->title}}</h4>
                <div class="clearfix mb-10">
                    <div class="float-left">
                        <i class="fa fa-calendar"></i> {{date('d-m-y', strtotime($selectedNews->created_at))}}
                    </div>
                    <div class="float-left ml-10">
                        <a href="{{route('news')}}"><i class="fa fa-folder"></i> Tin tức - sự kiện</a>
                    </div>
                </div>
                <hr>
                <div class="text-justify">
                    {!! $selectedNews->content !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog Area -->
@endsection