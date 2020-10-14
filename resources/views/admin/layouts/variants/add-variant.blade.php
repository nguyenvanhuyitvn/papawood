@extends('admin.master.master')
@section('title', 'Thêm biến thể')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/dist/css/style.css')}}">
    {{--  <link rel="stylesheet" href="{{asset('public/assets/plugins/summernote/summernote-bs4.css')}}">  --}}
@stop

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">
               Biến thể
            </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">
                    Biến thể
                </li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')
 <div class="row">
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Biến thể</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="col-md-12">
            <div class="panel panel-default">
                <form  method="post" action="{{ route('admin.variant.store', ['id'=> $product->id])}}">
                    @csrf
                    <div class="panel-heading" align='center'>
                        Giá cho từng biến thể sản phẩm : {{$product->name}} ({{$product->product_code}})
                    </div>
                    <div class="panel-body" align='center'>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Biến thể</th>
                                    <th>Giá (có thể trống)</th>
                                    <th>Tuỳ chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($product->variant as $variant)
                              <tr>
                                    <td scope="row">
                                        @foreach ($variant->values as $value)
                                            {{$value->attribute->name}} : {{$value->value}},
                                        @endforeach
                                     
                                    </td>
                                    <td>
                                        <input name="variant[{{$variant->id}}]" class="form-control" placeholder="Giá cho biến thể" value="">
                                    </td>
                                    <td>
                                        <a onclick="return del_variant()"  class="btn btn-warning" href="{{ route('admin.variant.delete', ['id'=> $variant->id])}}" role="button">Xoá</a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div align='right'>
                        <button class="btn btn-success" type="submit"> Cập nhật </button> 
                        <a class="btn btn-warning" href="{{ route('admin.product.list')}}" role="button">Bỏ qua</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
 </div>
 
@endsection
@section('script_variant')
    <script>
        function del_variant()
        {
            return confirm('Bạn muốn xoá biến thể ?');
        }
    </script>
@endsection