@extends('client._layout') 
@section('content')
<!-- Start service Area -->
<section class="service-area section-gap" id="service">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-50 pt-50 header-text text-center">
                <h1 class="mb-10">Công ty thành viên</h1>
                <p class="subtitle">
                    Hiện Sao Bắc Đẩu có 7 công ty thành viên: SBD Service, SBD South, SBD Digital, SBD Telecom, SBD Solution, SBD Tech, SBD Hitek.
                </p>
                <p class="subtitle"> Các công ty này có sự thống nhất cao về chiến lược, mục tiêu phát triển nhưng độc lập và linh hoạt trong
                    các hoạt động sản xuất kinh doanh.</p>
            </div>
        </div>
        <div class="row">
            @foreach ($subsidiaries as $item)
            <div class="col-lg-3 col-md-6">
                <div class="single-service">
                    <h4><a href="{{$item->homepage}}"><i class="fa fa-building-o"></i> {{$item->name}}</a></h4>
                    <p>{{$item->description}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End service Area -->
@endsection