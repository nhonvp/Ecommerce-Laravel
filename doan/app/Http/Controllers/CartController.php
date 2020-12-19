<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Models\Product;
use App\Components\Recusive;
use Session;
session_start();

class CartController extends Controller
{
    public function savecart(Request $request){
      $product_id = $request->product_id_hidden;
      $qty = $request->quantity;
      $product_info = DB::table('product')->where('product.product_id',$product_id)->first();

      $data['id'] = $product_info->product_id;
      $data['qty'] = $qty;
      $data['name'] = $product_info->product_name;
      if($product_info->product_content =='2'){
          $data['price'] = $product_info->product_price - (0.1*$product_info->product_price);
      }else{
          $data['price'] = $product_info->product_price;
      }
      $data['weight'] = '0';
      $data['options']['image'] = $product_info->product_image;
      Cart::add($data);
//        Cart::destroy();
//        Cart:total();
       return redirect()->route('shop_gird.index');
    }
    public function save_cart_view(Request $request){
        $product_id_view = $request->product_id_view;
        $qty = $request->product_qty_view;
        $product_info_view = Product::where('product_id',$product_id_view)->first();

        $data_view['id'] = $product_id_view;
        $data_view['qty'] = $qty;
        $data_view['name'] = $product_info_view->product_name;
        if($product_info_view->product_content =='2'){
            $data_view['price'] = $product_info_view->product_price-(0.1*$product_info_view->product_price);
        }else{
            $data_view['price'] = $product_info_view->product_price;
        }
        $data_view['weight'] = '0';
        $data_view['options']['image'] = $product_info_view->product_image;
        Cart::add($data_view);

        return redirect()->route('shop_gird.index');
    }
    public function showcart(){
        return view('page.cart.show_cart');
    }
    public function deletecart($rowId){
        Cart::update($rowId, 0);
//        return redirect()->route('show_cart');
        return back();
    }
    public function updatecartqty(Request $request){
        $row_id = $request->rowId_qty;
        $qty_change = $request->quant[$row_id];
        Cart::update($row_id, $qty_change);
        return redirect()->route('show_cart');
    }
    public function clear_cart(){
        Cart::destroy();
        return back();
    }
}
