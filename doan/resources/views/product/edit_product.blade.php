@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'Product', 'key'=>'Edit'])

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-md-8">
                        @foreach($edit_product as $key => $pro)
                        <form action="{{ route('product.update',$pro->product_id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Tên sản phẩm</label>
                                <input type="text" class="form-control" id="" name="product_name" value="{{$pro->product_name }}"  placeholder="Nhập thương hiệu">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Mô tả sản phẩm</label>
                                <textarea class="form-control" id="ckeditor5"  rows="3" name="product_desc" placeholder="Chi tiết thương hiệu">{{$pro->product_desc}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nội dung sản phẩm</label>
{{--                                <textarea class="form-control" id="ckeditor6" rows="3" name="product_content" placeholder="Chi tiết thương hiệu">{{$pro->product_content}}--}}
{{--                                </textarea>--}}
                                <select class="form-control" id="product_cate"name="product_content">
                                    @foreach($product_type as $key => $pro_type)
                                        @if($pro_type->product_type_id == $pro->product_content)
                                            <option selected value={{$pro_type->product_type_id}}>{{$pro_type->product_type_name}}</option>
                                        @else
                                            <option value={{$pro_type->product_type_id}}>{{$pro_type->product_type_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Giá sản phẩm</label>
                                <input type="text" class="form-control" id="" name="product_price" value="{{$pro->product_price}}" placeholder="Nhập thương hiệu">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Hình ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="" name="product_image" placeholder="Nhập thương hiệu">
                                <img src="/upload/product/{{$pro->product_image}}" height="100" width="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Danh mục sản phẩm</label>
                                <select class="form-control" id="product_cate"name="product_cate">
                                    @foreach($cate_product as $key => $cate)
                                        @if($cate->id == $pro->category_id)
                                        <option selected value={{$cate->id}}>{{$cate->category_name}}</option>
                                        @else
                                            <option value={{$cate->id}}>{{$cate->category_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Thương hiệu sản phẩm</label>
                                <select class="form-control" id="product_brand"name="product_brand">
                                    @foreach($brand_product as $key => $brand)
                                        @if($brand->id == $pro->brand_id)
                                            <option selected value={{$brand->id}}>{{$brand->brand_name}}</option>
                                        @else
                                            <option value={{$brand->id}}>{{$brand->brand_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" >Update</button>
                        </form>
                        @endforeach
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
