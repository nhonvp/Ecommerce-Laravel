<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Models\Order;
use App\Components\Recusive;
use Session;

class MailController extends Controller
{
    public function send_mail(){
        $details =[
          'title'=>'Title: Mail from admin',
            'body'=>'Body: This is testing'
        ];
        Mail::to("nhonpham13@gmail.com")->send(new SendMail($details));
        return redirect()->route('shop_gird.index');
    }
    public function send_mail_order($order_id){
        $order_mail= DB::table('order')
            ->join('customers','customers.customer_id','=','order.customer_id')
            ->join('shippings','shippings.shipping_id','=','order.shipping_id')
            ->join('order_details','order_details.order_id','=','order.order_id')
            ->where('order.order_id',$order_id)
            ->select('order.*','customers.*','shippings.*','order_details.*')->first();
        if($order_mail){
            $to_name = $order_mail->customer_name;
            $to_email = $order_mail->customer_email;
            Mail::send('page.mail.order_mail', [
                'title'=>'Hello,' .$to_name ,
                'order_mail' => $order_mail,
            ],function($message) use ($to_name,$to_email){
                $message->to($to_email)->subject('Order Success');//send this mail with subject
                $message->from($to_email,'Shop Sales');//send from this mail
            });
            $notification = array(
                'message' => 'Duyệt Order Thành Công',
                'alert-type' => 'success'
            );
            DB::table('order')->where('order.order_id',$order_id)->update(['order_status' =>'Đã duyệt']);
            return redirect()->route('order_manager')->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Duyệt Order Không Thành Công',
                'alert-type' => 'success'
            );
            return redirect()->route('order_manager')->with($notification);
        }
    }
}
