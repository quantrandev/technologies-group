@extends('admin._layout') 
@section('content-header')
<h1>
    Tuyển dụng
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Tuyển dụng</li>
</ol>
@endsection
 
@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách Tuyển dụng</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('recruitment.create')}}" class="btn btn-primary">Thêm tin tuyển dụng</a>
                </div>
                <table id="tbl-recruitments" class="table">
                    <thead>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Vị trí tuyển</th>
                            <th>Số lượng tuyển</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recruitments as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->job_title}}</td>
                            <td>
                                {{$item->quantity}}
                            </td>
                            <td>
                                <a href="{{route('recruitment.edit', ['id'=>$item->id])}}" class="btn btn-info"><i class="fa fa-edit"></i> Sửa</a>
                                <button class="btn btn-danger js-delete" data-id="{{$item->id}}"><i class="fa fa-trash"></i> Xóa</button>
                                <button class="btn btn-primary js-view-detail" data-id="{{$item->id}}">Xem chi tiết</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Nội dung Tuyển dụng</h4>
        </div>
        <div class="modal-body">
          <h4>Tiêu đề</h4>
          <div id="title"></div>
          <h4>Vị trí tuyển</h4>
          <div id="job_title"></div>
          <h4>Số lượng tuyển</h4>
          <div id="quantity"></div>
          <h4>Mô tả công việc</h4>
          <div id="job_description"></div>
          <h4>Yêu cầu công việc</h4>
          <div id="job_requirements"></div>
          <h4>Phúc lợi</h4>
          <div id="welfare"></div>
          <h4>Nơi làm việc</h4>
          <div id="job_work_place"></div>
          <h4>Thông tin khác</h4>
          <div id="additional_information"></div>
          <h4>Ngày hết hạn</h4>
          <div id="expiration"></div>
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
    $('#tbl-recruitments').DataTable({});
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
                    url: '/admin/recruitment/delete/' + button.attr('data-id'),
                    type: 'post',
                    success: function(res){
                        if(res.status == 200)
                        toastr.success('Xóa thành công Tuyển dụng');
                    },
                    error: function(err){
                        toastr.error('Có lỗi xảy ra, vui lòng thử lại sau');
                    }
                });  
            }
        });
    });
    
    $(document).on('click', '.js-view-detail', function(){
        var button = $(this);
        $('#detail-modal').modal('show');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/recruitment/detail/' + button.attr('data-id'),
            type: 'get',
            success: function(res){
                if(res.status == 200){
                    $('#detail-modal').find('#title').html(res.recruitment.title);
                    $('#detail-modal').find('#job_title').html(res.recruitment.job_title);
                    $('#detail-modal').find('#job_description').html(res.recruitment.job_description);
                    $('#detail-modal').find('#job_requirements').html(res.recruitment.job_requirements);
                    $('#detail-modal').find('#quantity').html(res.recruitment.quantity);
                    $('#detail-modal').find('#welfare').html(res.recruitment.welfare);
                    $('#detail-modal').find('#additional_information').html(res.recruitment.additional_information);
                    $('#detail-modal').find('#job_work_place').html(res.recruitment.job_work_place);
                    $('#detail-modal').find('#expiration').html(res.recruitment.expiration);
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