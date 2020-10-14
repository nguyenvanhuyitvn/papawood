<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Banner;
use App\Repositories\BannerRepository;
use Illuminate\Support\Str;
class BannerController extends Controller
{
    protected $model;
    public function __construct(Banner $banner)
    {
        // set the model
        $this->model = new BannerRepository($banner);
    }
    public function index(){
        $banners = $this->model->all();
        return view('admin.layouts.banner.list', compact('banners'));
    }
    public function create(){
        return view('admin.layouts.banner.add');
    }
    public function store(Request $request){
        $urlImage = "uploads/banners/";
        if($request->hasFile('img'))
            {
                $file = $request->img;
                $filename= $urlImage.'/'.Str::random(9).'.'.$file->getClientOriginalExtension();
                $file->move('public/uploads/banners', $filename);
                $request['images'] = $filename;
            }
        else {
            $path=$urlImage.'/'.'no-img.jpg';
            $request['images'] = $path;
        }
        // $request['img'] = "path";
        unset($request->img);
        // dd($request->all());
        $this->model->create($request->only($this->model->getModel()->fillable));
        return redirect()->route('admin.banner.list')->with('thongbao','Đã thêm banner : <strong>'.$request->name.' </strong> thành công!');
    }
    public function edit($id){
        $banner = $this->model->show($id);
        return view('admin.layouts.banner.edit', compact('banner'));
    }
    public function update(Request $request, $id){
        $urlImage = "uploads/banners/";
        $banner = $this->model->show($id);
        if($request->hasFile('img'))
            {
                $file = $request->img;
                $filename= $urlImage.'/'.Str::random(9).'.'.$file->getClientOriginalExtension();
                $file->move('public/uploads/banners', $filename);
                $request['images'] = $filename;
            }
        else {
            $path=$banner->images;
            $request['images'] = $path;
        }
        // $request['img'] = "path";
        unset($request->img);
        // dd($request->all());
        $this->model->update($request->only($this->model->getModel()->fillable), $id);
        return redirect()->route('admin.banner.list')->with('thongbao','Đã sửa banner : <strong>'.$request->name.' </strong> thành công!');
    }
    public function destroy($id)
    {
        $banner = $this->model->show($id);
        $this->model->delete($id);
        return redirect()->back()->with('thongbao','Đã xóa banner : <strong>'.$banner->name.' </strong> thành công!');
    }
}
