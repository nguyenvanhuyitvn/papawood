@extends('admin.master.master')
@section('title', 'Quản lý Banner')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/dist/css/style.css')}}">
    {{--  <link rel="stylesheet" href="{{asset('public/assets/plugins/summernote/summernote-bs4.css')}}">  --}}
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
        <div class="card card-primary ">
            <nav class="navbar bg-primary">
                <span class="navbar-brand mb-0 h1">Sửa Banner - {{$banner->name}}</span>
                <a href="{{ route('admin.banner.list') }}" class="btn btn-success my-2 my-sm-0"><i class="fas fa-undo mr-1"></i> Quay lại</a>
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
                 <form  method="POST" enctype="multipart/form-data" action="{{ route('admin.banner.update', ['id' => $banner->id ])}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Tên Banner</label>
                                        @if($errors->has('name'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('name')}}</strong>
                                        </div>
                                        @endif
                                        <input type="text" name="name" class="form-control" value="{{$banner->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        @if($errors->has('description'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('description')}}</strong>
                                        </div>
                                        @endif
                                        <textarea id="description" name="description" style="width: 100%;height: 100px;">{!!$banner->description!!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" @if ($banner->state == 1) checked @endif id="state" name="state" value="1">
                                            <label for="state">
                                                Kích hoạt
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Banner</label>
                                        @if($errors->has('img'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('img')}}</strong>
                                        </div>
                                        @endif
                                        <input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="100%" height="200px" src="{!!URL::to('public').'/'.$banner->images!!}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <button class="btn btn-success" name="add-product" type="submit">Thêm Banner</button>
                            <a href="{{ route('admin.banner.list' )}}" class="btn btn-danger" type="reset">Huỷ bỏ</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

 
 @section('script')
    {{--  <script src="{{asset('public/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>  --}}

    <script>
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});
        
    </script>
 @stop
 
@endsection
