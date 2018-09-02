@extends('admin._layout') 
@section('content-header')
<h1>
    Quản lý menu 
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Chỉnh sửa menu </li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thông tin menu </h3>
            </div>
            <form role="form" action="{{route('menu.update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$editingMenu->id}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề menu </label>
                        <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề menu " value="{{$editingMenu->title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Đường dẫn </label>
                        <input type="text" class="form-control" name="href" placeholder="Nhập đường dẫn " value="{{$editingMenu->href}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Menu cha</label>
                        <select name="parent_id" class="form-control">
                        <option value>Chọn menu cha</option>
                            @foreach ($parentMenus as $menu)
                                @if($editingMenu->parent_id == $menu->id)
                                <option value="{{$menu->id}}" selected="selected">{{$menu->title}}</option>
                                @else
                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="is_active" class="flat-red" {{$editingMenu->is_active?'checked':''}} value="1"> Kích hoạt
                                </label>
                        <label>
                                  <input type="radio" name="is_active" class="flat-red" {{!$editingMenu->is_active?'checked':''}} value="0"> Khóa
                                </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh bìa</label>
                        <div class="form-group">
                            @if (!empty($editingMenu->cover_image))
                            <img src="{{asset($editingMenu->cover_image)}}" style="width: 80px"> @endif
                        </div>
                        <input type="file" name="cover_image">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
 @push('styles')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('storage/admin/plugins/iCheck/all.css')}}"> 
@endpush @push('scripts')
<!-- iCheck 1.0.1 -->
<script src="{{asset('storage/admin/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

</script>













@endpush