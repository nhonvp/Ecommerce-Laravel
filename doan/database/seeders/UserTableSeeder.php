<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::truncate();
       DB::table('users')->insert([
          'name'=>'Văn Nhơn',
           'email'=>'nhonpham13@gmail.com',
           'password'=>md5('nhon359512'),
           'role'=>'2'
       ]);
       DB::table('users')->insert([
           'name'=>'admin',
           'email'=>'admin@gmail.com',
           'password' =>md5('admin'),
           'role'=>'1'
       ]);
       DB::table('users')->insert([
           'name'=>'halo',
           'email'=>'nhonpham52@gmail.com',
           'password'=>md5('nhon359512'),
           'role'=>'2'
       ]);
    }
}
