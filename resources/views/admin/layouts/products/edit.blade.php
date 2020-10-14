@extends('admin.master.master')
@section('title', 'Sản phẩm')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">
               Sửa sản phẩm
            </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <nav class="navbar bg-primary">
                <span class="navbar-brand mb-0 h1">Sửa sản phẩm: <span class="font-weight-bold">Áo khoác nam đẹp (AN01)</span></span>
                <a href="{{ route('admin.product.list') }}" class="btn btn-success my-2 my-sm-0"><i class="fas fa-undo"></i></i> Quay lại</a>
            </nav>
        </div>
        @if (session('thongbao'))
        <div class="alert bg-success" role="alert">
                {!!session('thongbao')!!}
        </div>
        @endif
        <div class="vertical-menu">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                 <form  method="post" enctype="multipart/form-data" action="{{ route('admin.product.update',['id'=> $product->id])}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category_id" class="form-control">
                                                   {{GetCategory($category,0,'',$product->id)}}
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        @if($errors->has('product_code'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('product_code')}}</strong>
                                        </div>
                                        @endif
                                        <input type="text" name="product_code" class="form-control" value="{{$product->product_code}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                                        @if($errors->has('name'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('name')}}</strong>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                                <label>Giá sản phẩm (Giá chung)</label> 
                                                <a href="{{ route('admin.variant.edit', ['id'=> $product->id ])}}">
                                                        <span class="fa fa-angle-double-right"></span>
                                                        Giá theo biến thể
                                                </a>
                                                <input  type="number" name="price" class="form-control" value="{{$product->price}}">
                                                    @if ($errors->has('price'))
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong> {{$errors->first('price')}}</strong>
                                                        </div>
                                                    @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select  name="product_state" class="form-control">
                                            <option  @if($product->state==1) selected @endif  value="1">Còn hàng</option>
                                            <option  @if($product->state==0) selected @endif  value="0">Hết hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        @if($errors->has('img'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('img')}}</strong>
                                        </div>
                                        @endif
                                        <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)" >
                                        <img id="avatar" class="thumbnail" width="100%" height="350px" src="{{$product->images}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                     <div class="form-group">
                                        <label>Thông tin</label>
                                        @if($errors->has('info'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('info')}}</strong>
                                        </div>
                                        @endif
                                        <textarea id="editor" name="info" style="width: 100%;height: 100px;">{!! $product->info !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                           <div class="row">
                                <div class="col-md-12 col-12">
                                  <div class="panel panel-default">
                                        <div class="panel-body tabs">
                                            <label>Các thuộc Tính</label>
                                                <ul id="tabs" class="nav nav-tabs">
                                                    @php
                                                        $i=0;
                                                    @endphp
                                                    @foreach ($attrs as $attr)
                                                        <li class='nav-item  @if($i==0) active @endif' ><a class="nav-link small text-uppercase @if($i==0) active @endif " href="#tab{{$attr->id}}" data-toggle="tab">{{$attr->name}}</a></li>    
                                                    @php
                                                        $i=1;
                                                    @endphp
                                                    @endforeach
                                                </ul>
                                            <div class="tab-content">
                                                @foreach ($attrs as $attr)
                                                    <div class="tab-pane fade  @if($i==1) active show @endif in" id="tab{{$attr->id}}">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    @foreach ($attr->values as $value)
                                                                    <th class="text-center">{{$value->value}}</th>
                                                                    @endforeach
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    @foreach ($attr->values as $value)
                                                                        <td class="text-center icheck-success"> 
                                                                            <input @if(check_value($product,$value->id)) checked  @endif class="form-check-input" type="checkbox" name="attr[{{$attr->id}}][]" id="{{$value->id}}" value="{{$value->id}}">
                                                                            <label for="{{$value->id}}"></label> 
                                                                        </td>
                                                                    @endforeach
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                    
                                                    </div> 
                                                    @php
                                                    $i=2;
                                                    @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="row">
                               <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="featured" name="featured" @if($product->featured==1) checked @endif value="1">
                                            <label for="featured">
                                                Sản phẩm đặc biệt
                                            </label>
                                        </div>
                                    </div>
                               </div>
                           </div>
                        </div>
                    </div>
                    {{--  Description  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Miêu tả</label>
                                @if($errors->has('description'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </div>
                                @endif
                                <textarea id="product_description" name="description" style="width: 100%;height: 100px;">{!! $product->description !!}</textarea>
                            </div>
                            <button class="btn btn-success" name="add-product" type="submit">Lưu lại</button>
                            <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

 @section('script_product')
    <script>
        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {
            $('#avatar').click(function () {
                $('#img').click();
            });
        });
    </script>
@endsection
@endsection
