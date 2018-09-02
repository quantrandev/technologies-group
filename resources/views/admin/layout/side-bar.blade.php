<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{Auth::user()->hasAvatar()?asset(Auth::user()->avatar):asset('storage/avatar/placeholder.png')}}" class="img-circle"
                    alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-soccer-ball-o"></i>
                    <span>Sản phẩm - giải pháp</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('product-category.index')}}"><i class="fa fa-list-ol"></i> Quản lý danh mục</a></li>
                    <li><a href="{{route('product.index')}}"><i class="fa fa-list-ol"></i> Quản lý sản phẩm</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('customer.index')}}">
                    <i class="fa fa-user-plus"></i>
                    <span>Đối tác</span>
                </a>
            </li>
            <li>
                <a href="{{route('news.index')}}">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Tin tức</span>
                </a>
            </li>
            <li>
                <a href="{{route('recruitment.index')}}">
                    <i class="fa fa-suitcase"></i>
                    <span>Tuyển dụng</span>
                </a>
            </li>
            <li>
                <a href="{{route('subsidiary.index')}}">
                    <i class="fa fa-building-o"></i>
                    <span>Công ty thành viên</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Thông tin chung</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('menu.index')}}"><i class="fa fa-list-ol"></i> Quản lý menu</a></li>
                    <li><a href="{{route('about.index')}}"><i class="fa fa-list-ol"></i> Quản lý thông tin khác</a></li>
                </ul>
            </li>
            @if(Auth::user()->isAdmin())
            <li>
                <a href="{{route('user.index')}}">
                            <i class="fa fa-user-circle-o"></i>
                            <span>Người dùng</span>
                        </a>
            </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>