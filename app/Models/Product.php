<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $fillable = [
        'name',
        'price',
        'category',
        'image',
        'is_active',
    ];
}
