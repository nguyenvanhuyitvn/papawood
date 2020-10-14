<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Variant;
use App\models\Product;
use App\Repositories\VariantRepository;
use App\Repositories\ProductRepository;
class VariantController extends Controller
{
    protected $modelVariant;
    protected $modelProduct;
    public function __construct(Variant $variant, Product $product)
    {
        // set the model
        $this->modelVariant = new VariantRepository($variant);
        $this->modelProduct = new ProductRepository($product);
    }
    public function create($id){
        $product = $this->modelProduct->show($id);
        return view('admin.layouts.variants.add-variant', compact('product'));
    }
    public function store(Request $request, $id){
        foreach($request->variant as $key=>$value)
        {
            $vari= $this->modelVariant->show($key);
            $data['price'] = $value;
            $this->modelVariant->update($data, $vari->id);
        }

        return redirect()->route('admin.product.list')->with('thongbao','Đã thêm thành công!');
    }
    public function edit($id){
        $product = $this->modelProduct->show($id);
        return view('admin.layouts.variants.edit-variant', compact('product','variants'));
    }
    public function update(Request $request, $id){
        foreach($request->variant as $key=>$value)
        {
            $vari= $this->modelVariant->show($key);
            $data['price'] = $value;
            $this->modelVariant->update($data, $vari->id);
        }

        return redirect()->route('admin.product.list')->with('thongbao','Đã thêm thành công!');
    }
    public function destroy($id){
        $this->modelVariant->show($id)->values()->detach($id);
        $this->modelVariant->delete($id);
        return redirect()->back()->with('thongbao','Đã xoá biến thể thành công!');
    }
}
