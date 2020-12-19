<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Products extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'category_name','category_desc','category_status',
    ];

    protected $primaryKey = 'id';
    protected $table = 'category_products';
}
