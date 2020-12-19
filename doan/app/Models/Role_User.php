<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id','role_id'
    ];
    protected $primaryKey = 'role_user_id';
    protected $table = 'role_user';
}
