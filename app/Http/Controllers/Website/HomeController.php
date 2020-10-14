<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\models\Category;
class HomeController extends Controller
{
    protected $categoryModel;
    public function __construct(Category $category)
    {
        // set the model
        $this->categoryModel = new CategoryRepository($category); 
    }
    public function index(){
        $categories= $this->categoryModel->all();
        // dd($categories);
        // $data['categories'] = html_menu1($categories, 0);
        $data['categories'] = MenuTree($categories, 0);
        // dd($data);
        return view('frontend.home.index', $data);
    }
}
