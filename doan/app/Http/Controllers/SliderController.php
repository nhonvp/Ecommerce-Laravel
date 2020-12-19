<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Session;
use DB;
session_start();

class SliderController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_slider(){
        return view('slider.add_slider');
    }
    public function save_slider(Request $request){
//        $this->AuthLogin();
        $data = $request->all();
        $get_image = request('slider_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path('/upload/slider'), $new_image);

            $slider = new Slider();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_status = $data['slider_status'];
            $slider->slider_desc = $data['slider_desc'];
            $slider->save();
            Session::put('message','Thêm slider thành công');
            $notification = array(
                'message' => 'Thêm Sản Phẩm Thành Công',
                'alert-type' => 'success'
            );
            return redirect()->route('add_slider')->with($notification);
        }else{
            Session::put('message','Làm ơn thêm hình ảnh');
            return redirect()->route('add_slider');
        }
    }
    public function all_slider(){
        $all_slide = Slider::orderBy('slider_id','desc')->get();
        return view('slider.list_slider')->with(compact('all_slide'));
    }
    public function unactive_slide($slide_id){
//        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>0]);
        $notification = array(
            'message' => 'Kích Hoạt Slide Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('all_slider')->with($notification);
    }
    public function active_slide($slide_id){
//        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>1]);
        $notification = array(
            'message' => 'Tắt Kích Hoạt Slide Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('all_slider')->with($notification);
    }
    public function delete_slide(Request $request, $slide_id){
        $slider = Slider::find($slide_id);
        $slider->delete();
        Session::put('message','Xóa slider thành công');
        $notification = array(
            'message' => 'Xóa slide Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
