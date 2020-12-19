<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Mail;
use App\Components\Recusive;
use Session;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
        return view('page.checkout.login_checkout');
    }
    public function logout_checkout(){
        Session::flush();
        return redirect()->route('login_checkout');
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name']= $request->name_customer;
        $data['customer_email']= $request->email_customer;
        $data['customer_password']=md5($request->password_customer);
        $data['customer_phone']= $request->phone_customer;

        $customer_id = DB::table('customers')->insertGetId($data);
//        Session::put('customer_id',$customer_id);
//        Session::put('customer_name',$request->name_customer);

        $to_name = $request->name_customer;
        $to_email = $request->email_customer;//send to this email
        Mail::send('page.mail.send-mail',[
                'title'=>'Hello,' .$to_name ,
                'body'=>'Congratulations on successful account registration,
                          Here we wish you a happy experience',
            ],function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Register Account Success');//send this mail with subject
            $message->from($to_email,'Shop Sales');//send from this mail
        });
        return redirect()->route('login_checkout');
    }
    public function checkout(){
        return view('page.checkout.checkout');
    }
    public function login_customer(Request $request){
        $email = $request->login_name;
        $password = md5($request->login_password);
        $result = DB::table('customers')->where('customers.customer_email',$email)->where('customers.customer_password',$password)->first();

        if($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            return redirect()->route('home_client');
        }
        else{
            Session::put('notification','Sai email or password');
            return redirect()->route('login_checkout');
        }
    }
    public function order_place(Request $request){
        //insert shipping
        $data_shipping = array();
        $data_shipping['shipping_name'] = $request->name_shipping;
        $data_shipping['shipping_email'] = $request->email_shipping;
        $data_shipping['shipping_phone'] = $request->phone_shipping;
        $data_shipping['shipping_province'] = $request->province_shipping;
        $data_shipping['shipping_address'] = $request->address_shipping;
        $data_shipping['shipping_note'] = $request->note_shipping;

        $shipping_id = DB::table('shippings')->insertGetId($data_shipping);

        //insert paymnet
        $data_payment = array();
        $data_payment['payment_method'] = $request->payment_option;
        $data_payment['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('payment')->insertGetId($data_payment);

        //insert order
        $data_order = array();
        $data_order['customer_id']= Session::get('customer_id');
        $data_order['shipping_id'] = $shipping_id;
        $data_order['payment_id'] = $payment_id;
        $data_order['order_total'] = Cart::total();
        $data_order['order_status'] = 'Đang chờ xử lí';
        $order_id = DB::table('order')->insertGetId($data_order);

        $content = Cart::content();
        foreach ($content as $v_content){
            $data_order_details['order_id'] = $order_id;
            $data_order_details['product_id'] = $v_content->id;
            $data_order_details['product_name'] = $v_content->name;
            $data_order_details['product_price'] = $v_content->price;
            $data_order_details['product_sales_quantity']= $v_content->qty;
            DB::table('order_details')->insert($data_order_details);
        }
        if($data_payment['payment_method']==1){
            Cart::destroy();
            echo 'Check payment';
        }elseif($data_payment['payment_method']==2){
            Cart::destroy();
            return view('page.checkout.handcash');
        }else{
            Cart::destroy();
            echo 'PayPal';
        }
    }

}
