<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $table='variants';
    public $timestamps =false;
    protected $fillable = ['product_id', 'price'];
    public function values()
    {
        return $this->belongsToMany('App\models\Value', 'variant_values', 'variant_id', 'value_id');
    }
}
