<header id="header" id="home">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
                    <span><strong>Trụ sở chính: </strong>{{SystemInfo::address()}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="{{route('home')}}"><img style="width: 60px" src="{{asset(SystemInfo::logo())}}" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-has-children"><a href="{{route('about')}}">Giới thiệu</a>
                        <ul>
                            <li><a href="{{route('about')}}">Giới thiệu</a></li>
                            <li><a href="{{route('news')}}">Tin tức - sự kiện</a></li>
                            <li><a href="{{route('subsidiary')}}">Công ty thành viên</a></li>
                        </ul>
                    </li>
                    <li class="menu-has-children">
                        <a href="">Sản phẩm - giải pháp</a>
                        <ul>
                            @foreach (SystemInfo::menus() as $item)
                            <li>
                                <a href="{{route('product-category', $item->id)}}">{{$item->name}}</a> @if($item->children->count()
                                > 0)
                                <ul>
                                    @foreach ($item->children as $child)
                                    <li><a href="{{route('product-category', $child->id)}}">{{$child->name}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('customer')}}">Đối tác</a></li>
                    <li><a href="{{route('recruitment')}}">Tuyển dụng</a></li>
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </div>
</header>