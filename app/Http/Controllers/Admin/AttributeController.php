<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddAttributeRequest;
use App\Http\Requests\EditAttributeRequest;
use App\models\Attribute;
use App\Repositories\AttributeRepository;
use App\models\Value;
use App\Repositories\ValueRepository;
class AttributeController extends Controller
{
    protected $model;
    protected $valueModel;
    public function __construct(Attribute $attribute, Value $value)
    {
        // set the model
        $this->model = new AttributeRepository($attribute); 
        $this->valueModel = new ValueRepository($value); 
    }

    public function index(){
        $data['attributes'] = $this->model->all();
        $data['values'] = $this->valueModel->with('attribute')->get();
        // dd($data['values']); exit();
        return view('admin.layouts.attributes.list', $data);
    }
    public function create(){
        $data['attributes'] = $this->model->all();
        return view('admin.layouts.attributes.list', $data);
    }
    public function store(AddAttributeRequest $request)
    {
        // create record and pass in only fields that are fillable
        $this->model->create($request->only($this->model->getModel()->fillable));
        return redirect('admin/attribute/list')->with('attribute-notify','Đã thêm thuộc tính : <strong>'.$request->name.' </strong> thành công!');
    }
    public function edit($id){
        $attribute=  $this->model->show($id);
        return json_encode($attribute);
    }
    public function update(EditAttributeRequest $request, $id){
        $attribute =  $this->model->show($id);
        $old_name = $attribute->name;
        $this->model->update($request->only($this->model->getModel()->fillable), $id);
        return redirect('admin/attribute/list')->with('attribute-notify','Đã sửa thuộc tính : <strong>'.$old_name.' -> '.$request->name.' </strong> thành công!');
    }
    public function destroy($id){
        $this->model->delete($id);
        return redirect('admin/attribute/list')->with('attribute-notify','Đã xóa thành công');
    }
}
