<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-soccer-ball-o"></i>
                    <span>Sản phẩm - giải pháp</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
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
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('news.index')}}">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Tin tức</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('recruitment.index')}}">
                    <i class="fa fa-suitcase"></i>
                    <span>Tuyển dụng</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('subsidiary.index')}}">
                    <i class="fa fa-building-o"></i>
                    <span>Công ty thành viên</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-user-circle-o"></i>
                    <span>Người dùng</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Thông tin chung</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('menu.index')}}"><i class="fa fa-list-ol"></i> Quản lý menu</a></li>
                    <li><a href="{{route('product.index')}}"><i class="fa fa-list-ol"></i> Quản lý sản phẩm</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>