<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(){
    	return view('admin.layouts.orders.order');
    }
    public function orderDetail(){
    	return "chi tiết đơn hàng";
    }
    public function approved(){
    	return view('admin.layouts.orders.completed');
    }
}
