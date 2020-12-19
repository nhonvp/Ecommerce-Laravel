<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductType;
class HomeController extends Controller
{
    public function index(){
        $image_slide = Slider::orderBy('slider_id','desc')->get();
        $cate_product = DB::table('category_products')->where('category_status','1')->orderby('id','desc')->get();
        $product_hot_item = Product::join('category_products','product.category_id','=','category_products.id')
            ->join('brand','product.brand_id','=','brand.id')
            ->join('product_type','product_type.product_type_id','=','product.product_content')
            ->where('product.product_content','=','3')
            ->orderby('product.product_id','desc')->get();
        $product_new_item = Product::join('category_products','product.category_id','=','category_products.id')
            ->join('brand','product.brand_id','=','brand.id')
            ->join('product_type','product_type.product_type_id','=','product.product_content')
            ->where('product.product_content','=','4')
            ->orderby('product.product_id','desc')->get();
        $product_sale_item = Product::join('category_products','product.category_id','=','category_products.id')
            ->join('brand','product.brand_id','=','brand.id')
            ->join('product_type','product_type.product_type_id','=','product.product_content')
            ->where('product.product_content','=','2')
            ->orderby('product.product_id','desc')->get();

        $product_all_item = Product::join('category_products','product.category_id','=','category_products.id')
            ->join('brand','product.brand_id','=','brand.id')
            ->join('product_type','product_type.product_type_id','=','product.product_content')
            ->orderby('product.product_id','desc')->paginate(12);
//        $product_gallery = DB::table('product_image')->select( DB::raw('DISTINCT(product_id)') )->first();

        return view('page.home.client')->with(compact('image_slide','product_hot_item','cate_product','product_new_item','product_sale_item','product_all_item'));
    }

    public function contact(){
        return view('page.layouts.contact');
    }

}
