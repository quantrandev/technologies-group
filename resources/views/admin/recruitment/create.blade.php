@extends('admin._layout') 
@section('content-header')
<h1>
    Quản lý tuyển dụng
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Thêm tuyển dụng</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thông tin tuyển dụng</h3>
            </div>
            <form role="form" action="{{route('recruitment.insert')}}" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vị trí tuyển</label>
                        <input type="text" class="form-control" name="job_title" placeholder="Nhập vị trí tuyển">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số lượng tuyển</label>
                        <input type="number" class="form-control" name="quantity" value="1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nơi làm việc</label>
                        <input type="text" class="form-control" name="job_work_place" placeholder="Nhập nơi làm việc">
                    </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">Thời hạn (ngày)</label>
                            <input type="number" class="form-control" name="expiration" value="30">
                        </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả công việc</label>
                        <textarea id="job_description" name="job_description" rows="0" cols="80">
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Yêu cầu kỹ năng</label>
                        <textarea id="job_requirements" name="job_requirements" rows="0" cols="80">
                                </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phúc lợi</label>
                        <textarea id="welfare" name="welfare" rows="0" cols="80">
                                    </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Thông tin khác</label>
                        <textarea id="additional_information" name="additional_information" rows="0" cols="80">
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
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        });

         CKEDITOR.replace('job_description');
         CKEDITOR.replace('job_requirements');
         CKEDITOR.replace('additional_information');
         CKEDITOR.replace('welfare');
    });

</script>


















@endpush