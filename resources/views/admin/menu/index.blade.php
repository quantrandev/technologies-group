@extends('admin._layout') 
@section('content-header')
<h1>
    Quản lý menu
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Quản lý menu</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Menu hiện tại</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('menu.create')}}" class="btn btn-primary">Thêm mới</a>
                </div>
                <table id="tbl-menus" class="table">
                    <thead>
                        <tr>
                            <th style="width: 60px">Ảnh bìa</th>
                            <th>Tiêu đề</th>
                            <th>Đường dẫn</th>
                            <th>Thuộc menu</th>
                            <th>Kích hoạt</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $item)
                        <tr>
                            <td><img style="max-width: 100%;" src="{{asset($item->cover_image)}}" alt=""></td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->href}}</td>
                            <td>{{!empty($item->parent)?$item->parent->title:''}}</td>
                            <td>
                                @if ($item->is_active)
                                <span class="label label-success">Đang kích hoạt</span> @else
                                <span class="label label-danger">Đang khóa</span> @endif
                            </td>
                            <td>
                                <a href="{{route('menu.edit', ['id'=>$item->id])}}" class="btn btn-info"><i class="fa fa-edit"></i> Sửa</a>
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
@endsection
 @push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('storage/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}"> 
@endpush @push('scripts')
<!-- DataTables -->
<script src="{{asset('storage/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('storage/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $('#tbl-menus').DataTable({});
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
                    url: '/admin/menu/delete/' + button.attr('data-id'),
                    type: 'post',
                    success: function(res){
                        toastr.success('Xóa thành công menu');
                    },
                    error: function(err){
                        toastr.error('Có lỗi xảy ra, vui lòng thử lại sau');
                    }
                });  
            }
        });
    });

</script>


@endpush