@extends('admin.master.master')
@section('title', 'Sản phẩm')

@section('css')
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@stop

@section('content-header')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark text-uppercase">
               Sản phẩm
            </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin')}}" class="text-dark"><i class="fas fa-home text-dark"></i> Home</a></li>
                <li class="breadcrumb-item active">
                    Sản phẩm
                </li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12 col-12">
            <div class="card card-primary ">
                <nav class="navbar bg-title">
                    <span class="navbar-brand mb-0 h1">Danh sách</span>
                    <span class="float-right">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-green-blue my-2 my-sm-0 text-white"><i class="fas fa-plus text-white mr-1"></i> Thêm mới</a>
                        <a href="{{ route('admin.product.list') }}" class="btn btn-green-blue my-2 my-sm-0 text-white"><i class="fas fa-undo text-white mr-1"></i> Reload</a>
                    </span>
                    
                </nav>
            </div>
            @if (session('thongbao'))
            <div class="alert bg-success" role="alert">
                    {!!session('thongbao')!!}
            </div>
            @endif
            <div class="vertical-menu">
                <table id="product_table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Tình trạng</th>
                            <th>Danh mục</th>
                            <th style='width:17%'>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $stt = 1; @endphp
                        @foreach ($products as $key => $product )
                            <tr>
                                <td>{{ $products->firstItem() + $key }}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->product_code}}</td>
                                <td>{{ $product->state !== null ? "Còn hàng" : "Hết hàng" }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td style="width: 17%">
                                    <a class="btn btn-category btn-primary" href="{{ route('admin.product.edit', ['id' => $product->id]) }}"><i class="fa fa-edit"></i></a>
                                    <a onclick="return del_pro('{{$product->name}}')" class="btn btn-delete-product btn-danger" href="{{ route('admin.product.delete', ['id' => $product->id]) }}"><i class="fas fa-times"></i></i></a>
                                </td>
                            </tr>
                            @php $stt++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@section('script')
    <!-- DataTables -->
    <script src="assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
    $(function () {
     
        $('#product_table').DataTable(
             {
                responsive: true
             }

        );
    });
    </script>
    <script>
	function del_pro(name)
	{
		return confirm('Bạn có muốn xoá sản phẩm :'+name);
	}
	</script>
@stop

@endsection