@extends('admin._layout') 
@section('content-header')
<h1>
    Quản lý thông tin khác
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Chỉnh sửa thông tin khác</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Nội dung</h3>
            </div>
            <form role="form" action="{{route('product.update')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$editingAbout->id}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Loại thông tin</label>
                        <input type="text" class="form-control" name="name" value="{{$editingAbout->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả</label>
                        <textarea id="editor1" name="description" rows="10" cols="80">
                            {{$editingAbout->content}}
                        </textarea>
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