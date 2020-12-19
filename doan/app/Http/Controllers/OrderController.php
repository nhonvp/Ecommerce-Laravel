<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Components\Recusive;
use Session;
use Barryvdh\DomPDF\PDF;

class OrderController extends Controller
{
    public function order_manager(){
        $all_order = DB::table('order')
            ->join('customers','order.customer_id','=','customers.customer_id')
            ->select('order.*','customers.customer_name')
            ->orderby('order.order_id','asc')->get();
        $manager_order = view('order.order_manage')->with('all_order',$all_order);
        return view('layouts.admin')->with('$manager_order',$manager_order);
    }
    public function view_order($order_id){
        $order_by_id = DB::table('order')
            ->join('customers','customers.customer_id','=','order.customer_id')
            ->join('shippings','shippings.shipping_id','=','order.shipping_id')
            ->join('order_details','order_details.order_id','=','order.order_id')
            ->where('order.order_id',$order_id)
            ->select('order.*','customers.*','shippings.*','order_details.*')->first();
        $order_by_id_product = DB::table('order')
            ->join('order_details','order_details.order_id','=','order.order_id')
            ->where('order.order_id',$order_id)->get();
        $manager_order_by_id = view('order.view_order')->with('order_by_id',$order_by_id)->with('order_by_id_product',$order_by_id_product);
        return view('layouts.admin')->with('order.view_order',$manager_order_by_id);
    }
    public function print_order($order_id){
        $order_by_id = DB::table('order')
            ->join('customers','customers.customer_id','=','order.customer_id')
            ->join('shippings','shippings.shipping_id','=','order.shipping_id')
            ->join('order_details','order_details.order_id','=','order.order_id')
            ->where('order.order_id',$order_id)
            ->select('order.*','customers.*','shippings.*','order_details.*')->first();
        $order_by_id_product = DB::table('order')
            ->join('order_details','order_details.order_id','=','order.order_id')
            ->where('order.order_id',$order_id)->get();
        //In pdf
        $pdf = \App::make('dompdf.wrapper');
        $output =' <style>
                        table,td,tr{
                          border: 2px solid #333333;
                          border-collapse: collapse;
                          padding: 5px 10px;
                        }
                  </style>
                                <div class="card-header">
                                    <h3 class="card-title">Customer information</h3>
                                </div>
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Name Customer</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>'.$order_by_id->customer_name.'</td>
                                                <td>'.$order_by_id->customer_email.'</td>
                                                <td>'.$order_by_id->customer_phone.'</td>
                                            </tr>
                                        </tbody>
                                    </table>';
        $output.='<h3 >Shipping information</h3>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap" >
                                        <thead>
                                        <tr>
                                            <th>Recipient name</th>
                                            <th>Province</th>
                                            <th>Address</th>
                                            <th>SDT</th>
                                            <th>Note</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>'.$order_by_id->shipping_name.'</td>
                                                <td>'.$order_by_id->shipping_province.'</td>
                                                <td>'.$order_by_id->shipping_address.'</td>
                                                <td>'.$order_by_id->shipping_phone.'
                                                </td>
                                                <td>'.$order_by_id->shipping_note.'</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>';
        $output.=' <div class="card-header">
                                    <h3 class="card-title">Order details</h3>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Order name</th>
                                            <th>Order Price</th>
                                            <th>Order Quantity</th>
                                            <th>Order Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>';
                                        foreach($order_by_id_product as $key => $order_product){
                                            $output .= '<tr>
                                            <td>'.$order_product->product_name.'</td>
                                            <td>'.$order_product->product_price.'</td>
                                            <td>'.$order_product->product_sales_quantity.'</td>
                                            <td>'.$order_product->product_price*$order_product->product_sales_quantity.'VND</td>
                                          </tr>';
                                        };
       $output .= ' </tbody>
                        </table>
                                </div>';
        $pdf->loadHtml($output);
        return $pdf->stream();
    }

}
