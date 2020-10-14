<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddValueRequest;
use App\Http\Requests\EditValueRequest;
use App\models\Value;
use App\Repositories\ValueRepository;
class ValueController extends Controller
{
    protected $model;
    public function __construct(Value $value)
    {
        // set the model
        $this->model = new valueRepository($value);
    }

    public function store(AddValueRequest $request)
    {
        // create record and pass in only fields that are fillable
        $this->model->create($request->only($this->model->getModel()->fillable));
        return redirect('admin/attribute/list')->with('value-notify','Đã thêm giá trị thuộc tính : <strong>'.$request->name.' </strong> thành công!');
    }
    public function edit($id){
        $data['value']=  $this->model->show($id);
        return json_encode($data['value']);
    }
    public function update(EditValueRequest $request, $id){
        $value =  $this->model->show($id);
        $old_value = $value->value;
        $this->model->update($request->only($this->model->getModel()->fillable), $id);
        return redirect('admin/attribute/list')->with('value-notify','Đã sửa thuộc tính : <strong>'.$old_value.' -> '.$request->value.' </strong> thành công!');
    }
    public function destroy($id){
        $this->model->delete($id);
        return redirect('admin/attribute/list')->with('value-notify','Đã xóa thành công');
    }
}
