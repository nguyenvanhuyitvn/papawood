@extends('admin.master.master')
@section('title', 'Thêm danh mục')

@section('css')
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@stop

@section('content-header')
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark  text-uppercase">
               Đơn hàng
            </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin')}}" class="text-dark"><i class="fas fa-home text-dark"></i> Home</a></li>
                <li class="breadcrumb-item active">
                    Đơn hàng
                </li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')
    <div class="card">
            <div class="card-header">
              <a href="{{ route('admin.order.list')}}" class="btn btn-warning-custom text-white"><i class="fas fa-outdent text-white mr-3"></i>Đơn chưa xử lý</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã hóa đơn</th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Tổng tiền</th>
                  <th>Thời gian</th>
                  <th class="d-flex justify-content-center">Chi tiết</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>1</td>
                      <td>HD0001</td>
                      <td>Nguyễn Văn Huy</td>
                      <td>0395954444</td>
                      <td>5.000.000 VNĐ</td>
                      <td>14-10-2020 11:32</td>
                      <td class="d-flex justify-content-center">
                          <button type="button" class="btn btn-info-custom text-white"><i class="far fa-eye text-white"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>HD0002</td>
                      <td>Nguyễn Văn Hải</td>
                      <td>0395954444</td>
                      <td>10.000.000 VNĐ</td>
                      <td>14-10-2020 11:32</td>
                      <td class="d-flex justify-content-center">
                          <button type="button" class="btn btn-info-custom text-white"><i class="far fa-eye text-white"></i></button>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
@section('script')
    <!-- DataTables -->
    <script src="assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
    </script>

@stop

@endsection