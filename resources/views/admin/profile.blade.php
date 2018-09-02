@extends('admin._layout') 
@section('content-header')
<h1>
    Thông tin cá nhân
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Chỉnh sửa thông tin cá nhân</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thông tin người dùng</h3>
            </div>
            <form role="form" action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$editingUser->id}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên người dùng</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên người dùng" value="{{$editingUser->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email cũ</label>
                        <div>
                            <span class="label label-success">{{$editingUser->email}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email mới (bỏ trống nếu không thay đổi)</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu mới</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirm-password" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh bìa</label>
                        <div class="form-group">
                            @if (!empty($editingUser->avatar))
                            <img src="{{asset($editingUser->avatar)}}" style="width: 80px"> @endif
                        </div>
                        <input type="file" name="avatar">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary js-submit">Cập nhật</button>
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
        $(document).on('click','.js-submit', function(e){
            e.preventDefault();
            var button = $(this);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                        url: '/admin/profile/check/',
                type: 'post',
                data: {
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                    'confirm-password': $('#confirm-password').val(),
                },
                success: function(res){
                    if(!res.email)
                        toastr.error('Địa chỉ email đã tồn tại, vui lòng chọn địa chỉ khác.');
                    if(!res.password)
                        toastr.error('Mật khẩu nhập lại không đúng, vui lòng kiểm tra lại.');

                    if(!res.email || !res.password)
                    return;

                    button.closest('form').submit();
                }
            });
            });
    });

</script>


















@endpush