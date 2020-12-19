<?php

namespace App\Http\Controllers;
use DB;
use App\Components\Recusive;
use Illuminate\Http\Request;
use Session;
session_start();
class CategoryController extends Controller
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
        return view('category.add');
    }
    public function index()
    {
        return view('category.index');
    }
    public function save(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;

        DB::table('category_products')->insert($data);
        $notification = array(
            'message' => 'Thêm Danh Mục Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.create')->with($notification);
    }
    public function all_category_product(){
        $this->AuthLogin();
        $all_cgt_product = DB::table('category_products')->get();
        $manager_category_product = view('category.list')->with('all_category_product',$all_cgt_product);
        return view('layouts.admin')->with('category.list',$manager_category_product);
    }
    public function active_category_product($category_id){
        $this->AuthLogin();
        DB::table('category_products')->where('id',$category_id)->update(['category_status' =>1] );
        $notification = array(
            'message' => 'Kích Hoạt Danh Mục Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.list')->with($notification);
    }
    public function unactive_category_product($category_id){
        $this->AuthLogin();
        DB::table('category_products')->where('id',$category_id)->update(['category_status' =>0] );
        $notification = array(
            'message' => 'Tắt Kích hoạt Danh Mục Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.list')->with($notification);
    }
    public function edit_category_product ($catefory_id){
        $this->AuthLogin();
        $edit = DB::table('category_products')->where('id',$catefory_id)->get();
        $manager_category_product = view('category.edit')->with('edit_category_product',$edit);
        return view('layouts.admin')->with('category.edit',$manager_category_product);
    }
    public function update_category_product(Request $request,$category_id){
        $this->AuthLogin();
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_desc']=$request->category_desc;
        DB::table('category_products')->where('id',$category_id)->update($data);
        $notification = array(
            'message' => 'Cập Nhật Danh Mục Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.list')->with($notification);
    }
    public function delete_category_product ($category_id){
        $this->AuthLogin();
        DB::table('category_products')->where('id',$category_id)->delete();
        $notification = array(
            'message' => 'Xóa Danh Mục Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.list')->with($notification);
    }

}
