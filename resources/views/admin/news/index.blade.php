@extends('admin._layout') 
@section('content-header')
<h1>
    Tin hoạt động
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Tin hoạt động</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách tin hoạt động</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('news.create')}}" class="btn btn-primary">Thêm tin mới</a>
                </div>
                <table id="tbl-news" class="table">
                    <thead>
                        <tr>
                            <th style="width: 60px">Ảnh bìa</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Ngày đăng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $item)
                        <tr>
                            <td><img style="max-width: 100%" src="{{asset($item->cover_image)}}" alt=""></td>
                            <td>{{$item->title}}</td>
                            <td><a href="javascript:void(0)" data-id="{{$item->id}}" class="btn btn-info js-view-content">Xem nội dung</a></td>
                            <td>
                                {{$item->created_at}}
                            </td>
                            <td>
                                <a href="{{route('news.edit', ['id'=>$item->id])}}" class="btn btn-info"><i class="fa fa-edit"></i> Sửa</a>
                                <button class="btn btn-danger js-delete" data-id="{{$item->id}}"><i class="fa fa-trash"></i> Xóa</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="content-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nội dung tin hoạt động</h4>
            </div>
            <div class="modal-body">
                <div id="content-wrapper"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
    $('#tbl-news').DataTable({});
    $(document).on('click','.js-delete', function(){
        var button = $(this);

        bootbox.confirm({ 
            size: "small",
            message: "Are you sure?", 
            callback: function(result){ 
                if(!result)
                    return;
                button.closest('tr').remove();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/admin/news/delete/' + button.attr('data-id'),
                    type: 'post',
                    success: function(res){
                        if(res.status == 200)
                        toastr.success('Xóa thành công tin hoạt động');
                    },
                    error: function(err){
                        toastr.error('Có lỗi xảy ra, vui lòng thử lại sau');
                    }
                });  
            }
        });
    });
    
    $(document).on('click', '.js-view-content', function(){
        var button = $(this);
        $('#content-modal').modal('show');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/news/content/' + button.attr('data-id'),
            type: 'get',
            success: function(res){
                if(res.status == 200){
                    $('#content-modal').find('#content-wrapper').html(res.content);
                }
                else
                toastr.error('Có lỗi xảy ra, vui lòng thử lại sau');
             },
            error: function(err){
                toastr.error('Có lỗi xảy ra, vui lòng thử lại sau');
             }
        });  
    });

</script>
















@endpush