<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table='banners';
    protected $fillable = ['name', 'description', 'images','state'];
    public $timestamps = false;
}
