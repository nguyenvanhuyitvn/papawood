<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\models\Product;
use App\models\Attribute;
use App\models\Category;
use App\models\Variant;
use App\Repositories\ProductRepository;
use App\Repositories\VariantRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\AttributeRepository;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $model;
    protected $modelVariant;
    protected $modelCategory;
    protected $modelAttribute;
    public function __construct(Product $product, Variant $variant, Category $categories, Attribute $attributes)
    {
        // set the model
        $this->model = new ProductRepository($product);
        $this->modelVariant = new VariantRepository($variant);
        $this->modelCategory = new CategoryRepository($categories);
        $this->modelAttribute = new AttributeRepository($attributes);
    }

    public function index(){
        $products = $this->model->paginate(5);
        return view('admin.layouts.products.list', compact('products'));
    }
    public function create(){
        $category = Category::all();
        $pro = Attribute::all();
        return view('admin.layouts.products.add', compact('pro','category'));
    }
    public function store(AddProductRequest $request){
       
        $urlImage = "uploads/products/";
        // dd($urlImage);
        if($request->hasFile('img'))
            {
                $file = $request->img;
                $filename= $file->getClientOriginalName().Str::random(9).'.'.$file->getClientOriginalExtension();
                $file->move('public/uploads/products', $filename);
                $path= $urlImage.$filename;
                $request['images'] = $path;
            }
        else {
            $path=$urlImage.'no-img.jpg';
            $request['images'] = $path;
        }
        // $request['img'] = "path";
        unset($request->img);
        // dd($request->all());
        $product = $this->model->create($request->only($this->model->getModel()->fillable));
        $mang=array();
        foreach($request->attr as $value)
        {
           foreach($value as $item)
           {
              $mang[]= $item;
           }
        }
        $product->values()->attach($mang);

        $variant=get_combinations($request->attr);

        foreach($variant as $var)
        {
            $data['product_id']=$product->id;
            $vari = $this->modelVariant->create($data);
            $vari->values()->attach($var);
        }
        return redirect('admin/variant/create/'.$product->id);
        // return redirect('admin/product/list')->with('product-notify','Đã thêm sản phẩm : <strong>'.$request->name.' </strong> thành công!');
    }
    public function edit($id){
        $data['category'] = $this->modelCategory->all();
        $data['product'] = $this->model->show($id);
        $data['attrs']  = $this->modelAttribute->all();
        return view('admin.layouts.products.edit', $data);
    }
    public function update(Request $request, $id){
        $urlImage = "uploads/products";
        $product = $this->model->show($id);
        if($request->hasFile('img'))
         {
            // if($product->images !='uploads/products/no-img.png')
            // {
            //    unlink('public/uploads/products/'.$product->images);
            // }
      
            $file = $request->img;
            $filename= $urlImage.'/'.Str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('public/uploads/products', $filename);
            $request['images']= $filename;
         }
        // dd($request->only($this->model->getModel()->fillable));exit();
        $this->model->update($request->only($this->model->getModel()->fillable), $id);
        $mang=array();
        foreach($request->attr as $value)
        {
            foreach($value as $item)
            {
                $mang[]= $item;
            }
        }
        $product->values()->sync($mang);
        // Variant
        //add variant
        $variant=get_combinations($request->attr);

        foreach($variant as $var)
        {
            if(check_var($product,$var))
            {
            $vari=new variant;
            $vari->product_id=$product->id;
            $vari->save();
            $vari->values()->Attach($var);
            }
            
        }

        return redirect()->back()->with('thongbao','Đã sửa thành công!');
    }
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->back()->with('thongbao','Đã xóa thành công');
    }
}
