<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'product_code', 'price', 'featured', 'state', 'info', 'description','images','category_id'];
    public function category()
    {
        return $this->belongsTo('App\models\Category', 'category_id', 'id');
    }
    public function values()
    {
        return $this->belongsToMany('App\models\Value', 'values_product', 'product_id', 'values_id');
    }
    public function variant()
    {
        return $this->hasMany('App\models\Variant', 'product_id', 'id');
    }
}
