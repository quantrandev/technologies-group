<!-- Start brands Area -->
<section class="brands-area pb-120 pt-120">
    <div class="container no-padding">
        <div class="title text-center">
            <h1 class="mb-10">Đối tác - Khách hàng</h1>
            <p class="subtitle">Luôn đặt lợi ích của các đối tác, khách hàng lên hàng đầu, Sao Bắc Đẩu đem đến cho khách hàng sự thỏa mãn cao</p>
            <p class="subtitle">nhất về các giải pháp công nghệ tối ưu và dịch vụ chất lượng</p>
        </div>
        <div class="brand-wrap">
            <div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
                @foreach (SystemInfo::customers() as $item)
                <div class="col single-brand">
                    <a href="{{$item->homepage}}"><img style="width: 100px !important" class="mx-auto" src="{{asset($item->logo)}}" alt="{{$item->name}}"></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End brands Area -->