@extends('client._layout') 
@section('content')
<!-- Start blog Area -->
<section class="blog-area section-gap pt-120" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 pt-50">
                <h4 class="mb-10">{{$selectedRecruitment->title}}</h4>
                <div class="clearfix mb-10">
                    <div class="float-left">
                        <i class="fa fa-calendar"></i> {{date('d-m-y', strtotime($selectedRecruitment->created_at))}}
                    </div>
                    <div class="float-left ml-10">
                        <a href="{{route('recruitment')}}"><i class="fa fa-folder"></i> Tin tuyển dụng</a>
                    </div>
                </div>
                <hr>
                <div class="text-justify">
                    <ul class="custom-list">
                        <li class="mt-10"><strong>Vị trí tuyển: </strong> {{$selectedRecruitment->job_title}}</li>
                        <li class="mt-10"><strong>Số lượng: </strong> {{$selectedRecruitment->quantity}}</li>
                        <li class="mt-10">
                            <strong>Thời hạn:</strong> @if(strtotime($selectedRecruitment->expiration)
                            < time()) <span class="text-danger">Đã hết hạn</span>
                                @else
                                <span>{{date('d-m-y', strtotime($selectedRecruitment->expiration))}}</span> @endif
                        </li>
                        <li class="mt-10"><strong>Mô tả công việc: </strong></li>
                        {!! $selectedRecruitment->job_description !!}
                        <li class="mt-10"><strong>Yêu cầu kỹ năng: </strong></li>
                        {!! $selectedRecruitment->job_requirements !!}
                        <li class="mt-10"><strong>Chế độ: </strong></li>
                        {!! $selectedRecruitment->welfare !!}
                        <li class="mt-10"><strong>Nơi làm việc: </strong> {{$selectedRecruitment->job_work_place}}</li>
                        @if(!empty($selectedRecruitment->additional_information))
                        <li class="mt-10"><strong>Thông tin khác: </strong></li>
                        {!!$selectedRecruitment->additional_information!!}
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog Area -->
@endsection