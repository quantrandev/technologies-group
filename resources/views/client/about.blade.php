@extends('client._layout') 
@section('content')
<!-- Start blog Area -->
<section class="blog-area section-gap pt-120" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 pt-50">
                <h4 class="mb-10">Về chúng tôi</h4>
                <div>
                    {!!$about!!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog Area -->
@endsection