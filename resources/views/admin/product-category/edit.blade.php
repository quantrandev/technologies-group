@extends('admin._layout') 
@section('content-header')
<h1>
    Quản lý danh mục sản phẩm
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Chỉnh sửa danh mục sản phẩm</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thông tin danh mục</h3>
            </div>
            <form role="form" action="{{route('product-category.update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$editingCategory->id}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{$editingCategory->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục cha</label>
                        <select name="parent_id" class="form-control">
                        <option value>Chọn danh mục cha</option>
                            @foreach ($parentCategories as $category)
                                @if($editingCategory->parent_id == $category->id)
                                <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
                                @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="is_active" class="flat-red" {{$editingCategory->is_active?'checked':''}} value="1"> Kích hoạt
                                </label>
                        <label>
                                  <input type="radio" name="is_active" class="flat-red" {{!$editingCategory->is_active?'checked':''}} value="0"> Khóa
                                </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh bìa</label>
                        <div class="form-group">
                            @if (!empty($editingCategory->cover_image))
                            <img src="{{asset($editingCategory->cover_image)}}" style="width: 80px"> @endif
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