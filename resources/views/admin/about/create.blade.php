@extends('admin._layout') 
@section('content-header')
<h1>
    Quản lý Thông tin khác
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Thêm Thông tin khác</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thông tin Thông tin khác</h3>
            </div>
            <form role="form" action="{{route('about.insert')}}" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Loại thông tin</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập loại thông tin">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung</label>
                        <textarea id="editor1" name="description" rows="10" cols="80">
                        </textarea>
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
        CKEDITOR.replace('editor1');
  });

</script>

















@endpush