<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Components\Recusive;
use Session;
use App\Models\Brand;
use App\Models\Category_Products;
session_start();
use App\Models\Comment;

class ShopGirdController extends Controller
{
    public function index(){
        $cate_product = DB::table('category_products')->where('category_status','1')->orderby('id','desc')->get();
        $brand_product = DB::table('brand')->where('brand_status','1')->orderby('id','desc')->get();

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='tang_dan'){
                $all_product = Product::orderBy('product_price','ASC')
                    ->paginate(6);
            }elseif ($sort_by=='giam_dan'){
                $all_product = Product::orderBy('product_price','DESC')
                    ->paginate(6);
            }elseif ($sort_by=='a_z'){
                $all_product = Product::orderBy('product_name','ASC')
                    ->paginate(6);
            }elseif ($sort_by=='z_a'){
                $all_product = Product::orderBy('product_name','desc')
                    ->paginate(6);
            }
        }elseif (isset($_GET['show_product'])){
            $show_product = $_GET['show_product'];
            if($show_product=='9_pro'){
                $all_product = Product::join('category_products','product.category_id','=','category_products.id')
                    ->join('brand','product.brand_id','=','brand.id')
                    ->orderby('product.product_id','desc')->paginate(9);
            }elseif ($show_product=='15_pro'){
                $all_product = Product::join('category_products','product.category_id','=','category_products.id')
                    ->join('brand','product.brand_id','=','brand.id')
                    ->orderby('product.product_id','desc')->paginate(15);
            }
            elseif ($show_product=='25_pro'){
                $all_product = Product::join('category_products','product.category_id','=','category_products.id')
                    ->join('brand','product.brand_id','=','brand.id')
                    ->orderby('product.product_id','desc')->paginate(25);
            }
        }else{
            $all_product = DB::table('product')
                ->join('category_products','product.category_id','=','category_products.id')
                ->join('brand','product.brand_id','=','brand.id')
                ->orderby('product.product_id','desc')->paginate(6);
        }
        return view('page.shop.index')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function shop_gird_category($category_id){
        $cate_product = DB::table('category_products')->where('category_status','1')->orderby('id','desc')->get();
        $brand_product = DB::table('brand')->where('brand_status','1')->orderby('id','desc')->get();
//        $category_by_id = DB::table('product')
//            ->join('category_products', 'product.category_id','=','category_products.id')
//            ->where('category_products.id',$category_id)->get();
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='tang_dan'){
                $category_by_id = Product::where('category_id',$category_id)->orderBy('product_price','ASC')
                    ->paginate(6);
            }elseif ($sort_by=='giam_dan'){
                $category_by_id = Product::where('category_id',$category_id)->orderBy('product_price','DESC')
                    ->paginate(6);
            }elseif ($sort_by=='a_z'){
                $category_by_id = Product::where('category_id',$category_id)->orderBy('product_name','ASC')
                    ->paginate(6);
            }elseif ($sort_by=='z_a'){
                $category_by_id = Product::where('category_id',$category_id)->orderBy('product_name','DESC')
                    ->paginate(6);
            }
        }else{
            $category_by_id = DB::table('product')
                ->join('category_products', 'product.category_id','=','category_products.id')
                ->where('category_products.id',$category_id)->paginate(6);
        }
        $details_product = DB::table('product')->get();
        $category_name = DB::table('category_products')->where('category_products.id',$category_id)->limit(1)->get();
        return view('page.shop.category')->with('category',$cate_product)->with('brand',$brand_product)
            ->with('category_by_id',$category_by_id)->with('category_name',$category_name)
            ->with('details_product',$details_product);
    }
    public function shop_gird_brand($brand_id){
        $cate_product = DB::table('category_products')->where('category_status','1')->orderby('id','desc')->get();
        $brand_product = DB::table('brand')->where('brand_status','1')->orderby('id','desc')->get();
//        $brand_by_id = DB::table('product')->join('brand', 'product.brand_id','=','brand.id')
//            ->where('brand.id',$brand_id)->get();

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='tang_dan'){
                $brand_by_id = Product::where('brand_id',$brand_id)->orderBy('product_price','ASC')
                    ->paginate(6);

            }elseif ($sort_by=='giam_dan'){
                $brand_by_id = Product::where('brand_id',$brand_id)->orderBy('product_price','DESC')
                    ->paginate(6);
            }elseif ($sort_by=='a_z'){
                $brand_by_id = Product::where('brand_id',$brand_id)->orderBy('product_name','ASC')
                    ->paginate(6);
            }elseif ($sort_by=='z_a'){
                $brand_by_id = Product::where('brand_id',$brand_id)->orderBy('product_name','DESC')
                    ->paginate(6);
            }
        }else{
            $brand_by_id = DB::table('product')->join('brand', 'product.brand_id','=','brand.id')
                ->where('brand.id',$brand_id)->paginate(6);
        }
        $brand_name = DB::table('brand')->where('brand.id',$brand_id)->limit(1)->get();
        return view('page.shop.brand')->with('category',$cate_product)->with('brand',$brand_product)
            ->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
    public function PostComment(Request $request,$product_id){
            $comment = new Comment();
            $comment->com_name = $request->name_cmt;
            $comment->com_email = $request->email_cmt;
            $comment->com_content = $request->review_cmt;
            $comment->com_rating = '3';
            $comment->product_id = $product_id;
            $comment->save();
            return back();
    }
    public function insert_rating(Request $request){
//            $data= $request->all();
            $rating = new Rating();
            $rating->product_id = $request->product_id;
            $rating->rating = $request->index;
            $rating->save();
        //        return back();
        echo 'done';
    }
    public function search(Request $request){
//        $cate_product = DB::table('category_products')->where('category_status','1')->orderby('id','desc')->get();
//        $brand_product = DB::table('brand')->where('brand_status','1')->orderby('id','desc')->get();
        $category = Category_Products::where('category_status','1')->orderby('id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderby('id','desc')->get();
        $product_search = Product::where('product_name','like','%'.$request->search.'%')
            ->orWhere('product_price',$request->search)->get();

        return view('page.shop.search',compact('product_search','category','brand'));
    }

}
