<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Role;
use App\Models\Sociable;
use App\Models\User;
use App\Models\Role_User;
use Laravel\Socialite\Facades\Socialite;
use DB;
use App\Components\Recusive;
use Illuminate\Http\Request;
use Session;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
session_start();
use phpDocumentor\Reflection\Types\Null_;

class AdminController extends Controller
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
//    public function login_facebook(){
//        return Socialite::driver('facebook')->redirect();
//    }

//    public function callback_facebook(){
//        $provider = Socialite::driver('facebook')->user();
//        $account = Sociable::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
//        if($account){
//            //login in vao trang quan tri
//            $account_name = Login::where('admin_id',$account->user)->first();
//            Session::put('admin_name',$account_name->admin_name);
//            Session::put('admin_id',$account_name->admin_id);
//            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
//        }else{
//
//            $hieu = new Social([
//                'provider_user_id' => $provider->getId(),
//                'provider' => 'facebook'
//            ]);
//
//            $orang = Login::where('admin_email',$provider->getEmail())->first();
//
//            if(!$orang){
//                $orang = Login::create([
//                    'admin_name' => $provider->getName(),
//                    'admin_email' => $provider->getEmail(),
//                    'admin_password' => '',
//                    'admin_phone' =>'',
//                    'admin_status' => 1
//                ]);
//            }
//            $hieu->login()->associate($orang);
//            $hieu->save();
//
//            $account_name = Login::where('admin_id',$account->user)->first();
//
//            Session::put('admin_name',$account_name->admin_name);
//            Session::put('admin_id',$account_name->admin_id);
//            return redirect('/admin/dashboard')->with('message', 'Đăng nhập Admin thành công');
//        }
//    }
    public function index(){
        return view('admin.login_admin');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('users')->where('email',$admin_email)->where('password',$admin_password)->first();
//        if(Auth::attempt(['email' => $admin_email,'password' => $admin_password])){
//            dd('thành công');
//        }
        if($result){
            Session::put('admin_name',$result->name);
            Session::put('admin_id',$result->id);
            Session::put('role',$result->role);
            Session::put('image',$result->image);
            return view('layouts.admin');
        }
        else{
            Session::put('notification','Sai email or password');
            return redirect()->route('admin_login');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',Null);
        Session::put('admin_id',Null);
        return redirect()->route('shop_gird.index');
    }
    public function show_dashboard(){
        $sum_orders = Order::count('*');
        $sum_customers = Customers::count('*');
        $sum_product = Product::count('*');
        $sum_total = Order::sum('order_total');
        return view('admin.dashboard')->with(compact('sum_orders','sum_customers','sum_total','sum_product'));
    }
    public function add_user(){
        $role = Role::orderby('role_id','asc')->get();
        return view('users.add_user')->with(compact('role'));
    }
    public function save_user(Request $request){
        $data = $request->all();
        $get_image = request('user_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path('/upload/admin'), $new_image);

            $user = array();
            $user['name'] = $data['user_name'];
            $user['email'] = $data['user_email'];
            $user['password'] = md5($data['user_password']);
            $user['image'] = $new_image;
            $user['role'] = $data['user_role'];
            $role_user_id = User::insertGetId($user);

            $role_user = new Role_User();
            $role_user->user_id = $role_user_id;
            $role_user->role_id = $data['user_role'];
            $role_user->save();
//            Session::put('message','Thêm user thành công');
            $notification = array(
                'message' => 'Thêm user Thành Công',
                'alert-type' => 'success'
            );
            return redirect()->route('add_user')->with($notification);
        }else{
//            Session::put('message','Làm ơn thêm hình ảnh');
            return redirect()->route('add_slider');
        }
    }
    public function all_user(){
        $all_users = User::orderby('id','asc')->get();
        $all_role = Role::orderby('role_id','asc')->get();
        $manager_users = view('users.list_user')->with(compact('all_users','all_role'));
        return view('layouts.admin')->with('users.list_user',$manager_users);
    }

}
