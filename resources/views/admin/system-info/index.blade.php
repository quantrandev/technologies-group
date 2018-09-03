@extends('admin._layout') 
@section('content-header')
<h1>
    Thông tin khác
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Thông tin khác</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Trụ sở chính</h3>
            </div>
            <form role="form" action="{{route('system-info.updateAddress')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$address->id}}">
                <div class="box-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Nhập trụ sở chính" value="{{$address->content}}">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Logo</h3>
            </div>
            <form role="form" action="{{route('system-info.updateLogo')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$logo->id}}">
                <div class="box-body">
                    <div class="form-group">
                        @if(!empty($logo->content))
                        <div class="form-group">
                            <img style="width: 80px" src="{{asset($logo->content)}}" alt="">
                        </div>
                        @endif
                        <input type="file" name="logo">
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
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('storage/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}"> 
@endpush @push('scripts')
<!-- DataTables -->
<script src="{{asset('storage/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('storage/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>

</script>
























@endpush