@extends('admin.master.master')
@section('title', 'Thêm thuộc tính')

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
            <h1 class="m-0 text-dark text-uppercase">
               Thuộc tính
            </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin')}}" class="text-dark"><i class="fas fa-home text-dark"></i> Home</a></li>
                <li class="breadcrumb-item active">
                    Thuộc tính
                </li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-12">
                    <div class="card bg-title">
                        <nav class="navbar bg-title">
                            <span class="navbar-brand mb-0 h1">Thuộc tính</span>
                            <a role="button" type="button" class="btn btn-green-blue text-white btn-add-attribute my-2 my-sm-0" data-toggle="modal" data-target="#btn-add-attribute"><i class="fas fa-plus mr-1 text-white"></i> Thêm mới</a>
                        </nav>
                    </div>
                    @if (session('attribute-notify'))
                    <div class="alert bg-success" role="alert">
                            {!!session('attribute-notify')!!}
                    </div>
                    @endif
                    @if($errors->has('name'))	
                        <div class="alert bg-danger" role="alert">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                    <div class="vertical-menu">
                        <table id="category_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên thuộc tính</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $stt=1; @endphp
                            @foreach ($attributes as $attribute)
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td> {{ $attribute->name }}</td>
                                    <td style="width: 17%">
                                        {{--  <a class="btn btn-attribute-edit btn-primary" href="{{ route('admin.attribute.edit', ['id' => $attribute->id]) }}"><i class="fa fa-edit"></i></a>  --}}
                                        <a class="btn btn-attribute-edit btn-info" data-id="{{ $attribute->id }}" data-toggle="modal" data-target="#btn-edit-attribute"><i class="fa fa-edit"></i></a>
                                        <a onclick='return del_attribute('{{$attribute->name}}')' class="btn btn-danger" href="{{ route('admin.attribute.delete', ['id' => $attribute->id]) }}"><i class="fas fa-times"></i></i></a>
                                    </td>
                                </tr>
                                @php $stt++; @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-12">
                    <div class="card bg-title">
                        <nav class="navbar bg-title">
                            <span class="navbar-brand mb-0 h1">Giá trị thuộc tính</span>
                            <a role="button" type="button" class="btn btn-green-blue text-white btn-add-value my-2 my-sm-0" data-toggle="modal" data-target="#btn-add-value"><i class="fas fa-plus mr-1 text-white"></i> Thêm mới</a>
                        </nav>
                    </div>
                    @if (session('value-notify'))
                      <div class="alert bg-success" role="alert">
                              {!!session('value-notify')!!}
                      </div>
                    @endif
                    @if($errors->has('value'))	
                        <div class="alert bg-danger" role="alert">
                            {{$errors->first('value')}}
                        </div>
                    @endif
                    <div class="vertical-menu">
                        <table id="value_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Giá trị</th>
                                    <th>Thuộc tính</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $stt=1; @endphp
                            @foreach ($values as $value)
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td> {{ $value->value }}</td>
                                    <td>{{ $value->attribute->name }}</td>
                                    <td style="width: 17%">
                                        {{--  <a class="btn btn-category btn-primary" href="{{ route('admin.value.edit', ['id' => $value->id]) }}"><i class="fa fa-edit"></i></a>  --}}
                                        <a class="btn btn-value-edit btn-info" data-id="{{ $value->id }}" data-toggle="modal" data-target="#btn-edit-value"><i class="fa fa-edit"></i></a>
                                        <a onclick="return del_value('{{$value->value}}')" class="btn btn-value btn-danger" href="{{ route('admin.value.delete', ['id' => $value->id]) }}"><i class="fas fa-times"></i></i></a>
                                    </td>
                                </tr>
                                @php $stt++; @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <!-- DataTables -->
    <script src="assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="assets/dist/js/admin.js"></script>
    <script>
    $(function () {
     
        $('#category_table').DataTable(
                {
                "lengthMenu": [ 5, 10, 20, 50, 100 ]
                }

        );
        $('#value_table').DataTable(
                {
                "lengthMenu": [ 5, 10, 20, 50, 100 ]
                }

        );
    });
    </script>
    <script>
      function del_value(name)
        {
          return confirm('Bạn có muốn xoá giá trị thuộc tính :'+name);
        }
      function del_attribute(name)
        {
          return confirm('Bạn có muốn xoá thuộc tính :'+name);
        }
    </script>
@stop
{{--  Modal Add Attribute  --}}
<div class="modal fade" id="btn-add-attribute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm thuộc tính</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='post' action="{{route('admin.attribute.store')}}">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">Tên thuộc tính:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary btn-submit-attribute disabled" disabled=true><i class="fa fa-save pr-2"></i>Lưu lại</button>
            </div>
      </form>
    </div>
  </div>
</div>
{{--  Modal Add Attribute Value  --}}
<div class="modal fade" id="btn-add-value" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm giá trị thuộc tính</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='post' action="{{route('admin.value.store')}}">
            @csrf
            <div class="form-group">
                <label for="value" class="col-form-label">Tên:</label>
                <input type="text" class="form-control" id="value_attribute" name="value">
            </div>
            <div class="form-group">
                <label for="attribute_id">Thuộc tính</label>
                <select id="attribute_id" class="form-control" name="attribute_id">
                     @foreach ($attributes as $key => $attribute )
                         <option value="{{ $attribute['id'] }}">{{ $attribute['name'] }}</option>
                     @endforeach
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-submit-value disabled" disabled=true><i class="fa fa-save pr-2"></i>Lưu lại</button>
      </div>
      </form>
    </div>
  </div>
</div>

{{--  Modal Edit Attribute  --}}
<div class="modal fade" id="btn-edit-attribute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa thuộc tính</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-edit-attribute" method='post' action="{{route('admin.attribute.update', ['id' => 12])}}">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">Tên thuộc tính:</label>
                <input type="text" class="form-control" id="attribute-name-edit" name="name">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary btn-submit-edit-attribute disabled" disabled=true><i class="fa fa-save pr-2"></i>Lưu lại</button>
            </div>
      </form>
    </div>
  </div>
</div>
{{--  Modal Edit Attribute Value --}}
<div class="modal fade" id="btn-edit-value" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa giá trị thuộc tính</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='post' id="form-edit-value" action="{{route('admin.value.update', ['id' => 1])}}">
            @csrf
            <div class="form-group">
                <label for="value" class="col-form-label">Tên:</label>
                <input type="text" class="form-control" id="value-name-edit" name="value">
            </div>
            
            <div class="form-group">
                <label for="edit_attribute_id">Thuộc tính</label>
                <select id="edit_attribute_id" class="form-control" name="attribute_id">
                     @foreach ($attributes as $key => $attribute )
                         <option class="attribute-value" value="{{ $attribute['id'] }}">{{ $attribute['name'] }}</option>
                     @endforeach
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-submit-edit-value"><i class="fa fa-save pr-2"></i>Lưu lại</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
