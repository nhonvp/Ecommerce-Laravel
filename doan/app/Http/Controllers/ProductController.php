<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\Rating;
use Illuminate\Http\Request;
use DB;
use App\Models\Comment;
use App\Models\ProductImage;
use App\Components\Recusive;
use Session;
use App\Models\Product;

use Symfony\Component\Console\Input\Input;

session_start();
class ProductController extends Controller
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
        $cate_product = DB::table('category_products')->orderby('id','desc')->get();
        $brand_product = DB::table('brand')->orderby('id','desc')->get();
        $product_type = ProductType::orderby('product_type_id','desc')->get();
        return view('product.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product)
            ->with('product_type',$product_type);
    }
    public function index()
    {
        return view('category.index');
    }
    public function save(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path('/upload/product'),$new_image);
            $data['product_image']=$new_image;
            $product_id_image =DB::table('product')->insertGetId($data);

            //image-details
            if($request->file('product_image_details')){
                foreach ($request->file('product_image_details') as $file){
                    if(isset($file)){
                        $name_image_details = $file->getClientOriginalName();
                        $name_image_details = current(explode('.',$name_image_details));
                        $new_image_details = $name_image_details.rand(0,99).'.'.$file->getClientOriginalExtension();
                        $file->move(public_path('/upload/product_details'),$new_image_details);
                        $data_image_details = new ProductImage();
                        $data_image_details->product_id = $product_id_image;
                        $data_image_details->image = $new_image_details;
                        $data_image_details->save();
                    }
                }
            }
            $notification = array(
                'message' => 'Thêm Sản Phẩm Thành Công',
                'alert-type' => 'success'
            );
        }else{
            $data['product_image']='';
            $product_id_image=DB::table('product')->insert($data);
            $id = $product_id_image->product_id;
            $notification = array(
                'message' => 'Thêm Sản Phẩm Thành Công',
                'alert-type' => 'success'
        );}
        return redirect()->route('product.create')->with($notification);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('product')
            ->join('category_products','category_products.id','=','product.category_id')
            ->join('brand','brand.id','=','product.brand_id')
            ->join('product_type','product_type.product_type_id','=','product.product_content')
            ->orderby('product_id','desc')->get();
        $manager_product = view('product.list_product')->with('all_product',$all_product);
        return view('layouts.admin')->with('product.list_product',$manager_product);
    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('product')->where('product_id',$product_id)->update(['product_status' =>1] );
        $notification = array(
            'message' => 'Kích Hoạt Sản Phẩm Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('product.list')->with($notification);
    }
    public function unactive_product($category_id){
        $this->AuthLogin();
        DB::table('product')->where('product_id',$category_id)->update(['product_status' =>0] );
        $notification = array(
            'message' => 'Tắt Kích hoạt Sản Phẩm Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('product.list')->with($notification);
    }
    public function edit_product ($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('category_products')->orderby('id','desc')->get();
        $brand_product = DB::table('brand')->orderby('id','desc')->get();
        $product_type = ProductType::orderby('product_type_id','desc')->get();
        $edit = DB::table('product')->where('product_id',$product_id)->get();
        $manager_product = view('product.edit_product')->with('edit_product',$edit)
            ->with('cate_product',$cate_product)->with('brand_product',$brand_product)
            ->with('product_type',$product_type);
        return view('layouts.admin')->with('product.edit_product',$manager_product);
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data=array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path('/upload/product'),$new_image);
            $data['product_image']=$new_image;
            DB::table('product')->where('product_id',$product_id)->update($data);
            $notification = array(
                'message' => 'Update Sản Phẩm Thành Công',
                'alert-type' => 'success'
            );
        }
        DB::table('product')->where('product_id',$product_id)->update($data);
        $notification = array(
            'message' => 'Cập Nhật Danh Mục Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('product.list')->with($notification);
    }
    public function delete_product ($product_id){
        $this->AuthLogin();
        DB::table('product')->where('product_id',$product_id)->delete();
        $notification = array(
            'message' => 'Xóa Sản Phẩm Thành Công',
            'alert-type' => 'success'
        );
        return redirect()->route('product.list')->with($notification);
    }

    //Frontend
    public function details_product($product_id){
        $cate_product = DB::table('category_products')->where('category_status','1')->orderby('id','desc')->get();
        $brand_product = DB::table('brand')->where('brand_status','1')->orderby('id','desc')->get();
        $comments = Comment::where('product_id',$product_id)->get();
        $image_product_details = ProductImage::where('product_id',$product_id)->get();
        $details_product = DB::table('product')
            ->join('category_products','product.category_id','=','category_products.id')
            ->join('brand','product.brand_id','=','brand.id')
            ->where('product.product_id',$product_id)->get();
        $rating = Rating::where('product_id',$product_id)->avg('rating');
        $rating = round($rating);
        $cmt_product = DB::table('vp_comment')
            ->join('product','product.product_id','=','vp_comment.product_id')
            ->where('vp_comment.product_id',$product_id)->count('*');
        foreach ($details_product as $key => $value){
            $category_id = $value->category_id;
        }
        $suggestion_product = DB::table('product')
            ->join('category_products','product.category_id','=','category_products.id')
            ->join('brand','product.brand_id','=','brand.id')
//            ->join('product_image','product_image.product_id','=','product.product_id')
            ->where('category_products.id',$category_id)->whereNotIn('product.product_id',[$product_id])->get();
        return view('page.shop.details_product')->with('category',$cate_product)->with('brand',$brand_product)
            ->with('details_product',$details_product)->with('suggestion',$suggestion_product)->with('comments',$comments)
            ->with('image_product_details',$image_product_details)->with('cmt_product',$cmt_product)->with('rating',$rating);
    }
    public function quickview(Request $request){
        $product_id = $request->product_id;
        $product = Product::join('product_type','product_type.product_type_id','=','product.product_content')->find($product_id);
//            ->join('product_type','product_type.product_type_id','=','product.product_content');
        $product_details_image = ProductImage::where('product_id',$product_id)->get();
        $rating = Rating::where('product_id',$product_id)->avg('rating');
        $rating = round($rating);
        $output['product_gallery']='';
        foreach ($product_details_image as $key => $gallery){
            $output['product_gallery'] .= '<p><img width="100%" src="/upload/product_details/'.$gallery->image.'"></p>';
        }

        $output['product_id'] = '<input class="product_hidden_view" type="hidden" name="product_id_hidden_view" value="'.$product->product_id.'">';
        $output['product_name'] = $product->product_name;
        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_type_name;
        if($product->product_content =='2'){
            $output['product_old_price']= number_format($product->product_price);
            $output['product_price']= number_format($product->product_price-(0.1*$product->product_price));
        }else{
            $output['product_price']= number_format($product->product_price);
        }
        $output['product_image']= '<p><img width="100%" src="/upload/product/'.$product->product_image.'"></p>';
        $output['product_rating'] ='';
         for($i =1; $i<=5;$i++){
             if($i <=$rating){
                 $output['product_rating'] .='<i class="yellow fa fa-star"></i>';}
             else{
                 $output['product_rating'] .= '<i class="fa fa-star"></i>';
             }
         }
        echo json_encode($output);
    }

}
