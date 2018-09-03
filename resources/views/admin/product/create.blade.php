@extends('admin._layout') 
@section('content-header')
<h1>
    Quản lý sản phẩm
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Thêm sản phẩm</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thông tin sản phẩm</h3>
            </div>
            <form role="form" action="{{route('product.insert')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả</label>
                            <textarea id="editor1" name="description" rows="10" cols="80">
                            </textarea>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục</label>
                        <select name="category_id" class="form-control">
                        <option value>Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="is_active" class="flat-red" value="1" checked="checked"> Kích hoạt
                                </label>
                        <label>
                                  <input type="radio" name="is_active" class="flat-red" value="0"> Khóa
                                </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh bìa</label>
                        <input type="file" name="cover_image">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
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
    $(function(){
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        });

        CKEDITOR.replace('editor1');
  });
  

</script>
















@endpush