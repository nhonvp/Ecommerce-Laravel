<?php

namespace App\Http\Controllers;

use DB;
use App\Components\Recusive;
use Illuminate\Http\Request;
use Session;
session_start();

class BrandController extends Controller
{
//Backend
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
        return view('brand.add_brand');
    }
    public function index()
    {
        return view('category.index');
    }
    public function save(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['brand_status'] = $request->brand_status;

        DB::table('brand')->insert($data);
        $notification = array(
            'message' => 'Thêm Brand Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.create')->with($notification);
    }
    public function all_brand_product(){
        $this->AuthLogin();
        $all_brand_product = DB::table('brand')->get();
        $manager_brand_product = view('brand.list_brand')->with('all_brand_product',$all_brand_product);
        return view('layouts.admin')->with('brand.list_brand',$manager_brand_product);
    }
    public function active_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('brand')->where('id',$brand_id)->update(['brand_status' =>1] );
        $notification = array(
            'message' => 'Kích Hoạt Brand Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.list')->with($notification);
    }
    public function unactive_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('brand')->where('id',$brand_id)->update(['brand_status' =>0] );
        $notification = array(
            'message' => 'Tắt Kích hoạt Brand Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.list')->with($notification);
    }
    public function edit_brand_product ($brand_id){
        $this->AuthLogin();
        $edit = DB::table('brand')->where('id',$brand_id)->get();
        $manager_brand_product = view('brand.edit_brand')->with('edit_brand_product',$edit);
        return view('layouts.admin')->with('brand.edit_brand',$manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_id){
        $this->AuthLogin();
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_desc']=$request->brand_desc;
        DB::table('brand')->where('id',$brand_id)->update($data);
        $notification = array(
            'message' => 'Cập Nhật Brand Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.list')->with($notification);
    }
    public function delete_brand_product ($brand_id){
        $this->AuthLogin();
        DB::table('brand')->where('id',$brand_id)->delete();
        $notification = array(
            'message' => 'Xóa Brand Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.list')->with($notification);
    }
}
