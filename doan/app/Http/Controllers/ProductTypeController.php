<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Components\Recusive;
use Session;
session_start();

class ProductTypeController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('admin_login')->send();
        }
    }
    public function create()
    {
        $this->AuthLogin();
        return view('producttype.add_product_type');
    }
    public function save(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_type_name'] = $request->product_type_name;
        ProductType::insert($data);
//        DB::table('product_type')->insert($data);
        $notification = array(
            'message' => 'Thêm ProductType Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('product_type_create')->with($notification);
    }
    public function all_product_type(){
        $this->AuthLogin();
        $all_product_type = ProductType::get();
        $manager_product_type = view('producttype.list_product_type')->with('all_product_type',$all_product_type);
        return view('layouts.admin')->with('manager_product_type',$manager_product_type);
    }
    public function edit_product_type($product_type_id){
        $this->AuthLogin();
        $edit = ProductType::where('product_type_id',$product_type_id)->get();
        $manager_product_type = view('producttype.edit_product_type')->with('edit_product_type',$edit);
        return view('layouts.admin')->with('manager_product_type',$manager_product_type);
    }
    public function update_product_type(Request $request,$product_type_id){
        $this->AuthLogin();
        $data=array();
        $data['product_type_name']=$request->brand_name;
        ProductType::where('product_type_id',$product_type_id)->update($data);
        $notification = array(
            'message' => 'Cập Nhật ProductType Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('product_type_list')->with($notification);
    }
    public function delete_product_type($product_type_id){
        $this->AuthLogin();
        ProductType::where('product_type_id',$product_type_id)->delete();
        $notification = array(
            'message' => 'Xóa ProductType Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('product_type_list')->with($notification);
    }
}
