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
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách Thông tin khác</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('about.create')}}" class="btn btn-primary">Thêm mới</a>
                </div>
                <table id="tbl-abouts" class="table">
                    <thead>
                        <tr>
                            <th>Loại thông tin</th>
                            <th>Nội dung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($abouts as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>
                                <button class="btn btn-primary js-view-description" data-id="{{$item->id}}">Xem nội dung</button>
                                <a href="{{route('about.edit', ['id'=>$item->id])}}" class="btn btn-info"><i class="fa fa-edit"></i> Sửa</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="description-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mô tả Thông tin khác</h4>
            </div>
            <div class="modal-body">
                <div id="description-wrapper"></div>
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
    $('#tbl-abouts').DataTable({});
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
                    url: '/admin/about/delete/' + button.attr('data-id'),
                    type: 'post',
                    success: function(res){
                        if(res.status == 200)
                        toastr.success('Xóa thành công Thông tin khác');
                    },
                    error: function(err){
                        toastr.error('Có lỗi xảy ra, vui lòng thử lại sau');
                    }
                });  
            }
        });
    });
    
    $(document).on('click', '.js-view-description', function(){
        var button = $(this);
        $('#description-modal').modal('show');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/about/description/' + button.attr('data-id'),
            type: 'get',
            success: function(res){
                if(res.status == 200){
                    $('#description-modal').find('#description-wrapper').html(res.description);
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