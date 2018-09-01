@extends('admin._layout') 
@section('content-header')
<h1>
    Quản lý đối tác
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Chỉnh sửa đối tác</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thông tin đối tác</h3>
            </div>
            <form role="form" action="{{route('customer.update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$editingCustomer->id}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên đối tác</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên đối tác" value="{{$editingCustomer->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trang chủ</label>
                        <input type="text" class="form-control" name="homepage" placeholder="Nhập trang web của đối tác" value="{{$editingCustomer->homepage}}">
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="is_active" class="flat-red" {{$editingCustomer->is_active?'checked':''}} value="1"> Kích hoạt
                                </label>
                        <label>
                                  <input type="radio" name="is_active" class="flat-red" {{!$editingCustomer->is_active?'checked':''}} value="0"> Khóa
                                </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Logo</label>
                        <div class="form-group">
                            @if (!empty($editingCustomer->logo))
                            <img src="{{asset($editingCustomer->logo)}}" style="width: 80px"> @endif
                        </div>
                        <input type="file" name="logo">
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
    });
</script>
















@endpush