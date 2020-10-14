@extends('admin.master.master')
@section('title', 'Quản lý Banner')

@section('css')
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@stop

@section('content-header')
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark text-uppercase">
               Quản lý Banner
            </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin')}}" class="text-dark"><i class="fas fa-home text-dark"></i> Home</a></li>
                <li class="breadcrumb-item active">
                    Quản lý Banner
                </li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12 col-12">
            <div class="card bg-title ">
                <nav class="navbar bg-title">
                    <span class="navbar-brand mb-0 h1">Danh sách Banner</span>
                    <a href="{{ route('admin.banner.create') }}" class="btn btn-green-blue text-white my-2 my-sm-0"><i class="fas fa-plus-circle mr-1  text-white"></i> Thêm mới</a>
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
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Tình trạng</th>
                            <th>Hình ảnh</th>
                            <th style='width:17%'>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $stt = 1; @endphp
                        @foreach ($banners as $banner )
                            <tr>
                                <td class="text-center align-middle">{{ $stt }}</td>
                                <td class="align-middle">{{$banner->name}}</td>
                                <td class="align-middle">{{$banner->description}}</td>
                                <td class="text-center align-middle">{!! $banner->state !== null ? '<h5><span class="badge badge-success">Active</span></h5>' : '<h5><span class="badge badge-danger">Incctive</span></h5>' !!}</td>
                                <td class="text-center align-middle" >
                                    <img src="{!!URL::to('public').'/'.$banner->images!!}" width="200px" height="100px" alt="">
                                </td>
                                <td style="width: 17%" class="align-middle">
                                    <a class="btn btn-banner btn-primary" href="{{ route('admin.banner.edit', ['id' => $banner->id]) }}"><i class="fa fa-edit"></i></a>
                                    <a onclick="return del_banner('{{$banner->name}}')" class="btn btn-delete-banner btn-danger" href="{{ route('admin.banner.delete', ['id' => $banner->id]) }}"><i class="fas fa-times"></i></i></a>
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
    <script src="{{asset('public/assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
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
	function del_banner(name)
	{
		return confirm('Bạn có muốn xoá banner :'+name);
	}
	</script>
@stop

@endsection