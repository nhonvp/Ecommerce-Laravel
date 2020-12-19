<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_type_name',
    ];
    protected $primaryKey = 'product_type_id';
    protected $table = 'product_type';
}
