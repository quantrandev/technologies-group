@extends('admin._layout') 
@section('content-header')
<h1>
    Quản lý công ty thành viên
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Thêm công ty thành viên</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thông tin công ty thành viên</h3>
            </div>
            <form role="form" action="{{route('subsidiary.insert')}}" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên công ty thành viên</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên công ty thành viên">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trang chủ công ty</label>
                        <input type="text" class="form-control" name="homepage" placeholder="Nhập trang chủ công ty">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả</label>
                            <textarea id="editor1" name="description" rows="10" cols="80">
                            </textarea>
                        </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="is_active" class="flat-red" value="1" checked="checked"> Kích hoạt
                                </label>
                        <label>
                                  <input type="radio" name="is_active" class="flat-red" value="0"> Khóa
                                </label>
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