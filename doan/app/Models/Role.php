<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name','display_name'
    ];
    protected $primaryKey = 'role_í';
    protected $table = 'roles';
}
