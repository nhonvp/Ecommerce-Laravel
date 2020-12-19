@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'Product', 'key'=>'Add'])

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-md-12">
                        <!--                       --><?php
                        //                        $message = Session::get('message');
                        //                        if($message){
                        //                            echo '<h3><span class="text-alert">'.$message.'</span></h3>';
                        //                            Session::put('message',null);
                        //                        }
                        //                        ?>
                        <form action="{{ route('product.save') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Tên sản phẩm</label>
                                <input type="text" class="form-control" id="" name="product_name" placeholder="Nhập thương hiệu">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Mô tả sản phẩm</label>
                                <textarea class="form-control" id="ckeditor3" rows="3" name="product_desc" placeholder="Chi tiết thương hiệu"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Loại sản phẩm</label>
{{--                                <textarea class="form-control" id="ckeditor4" rows="3" name="product_content" placeholder="Chi tiết thương hiệu"></textarea>--}}
                                <select class="form-control" id="product_brand"name="product_content">
                                    @foreach($product_type as $key => $pro_type)
                                        <option value={{$pro_type->product_type_id}}>{{$pro_type->product_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Giá sản phẩm</label>
                                <input type="text" class="form-control" id="" name="product_price" placeholder="Nhập thương hiệu">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Hình ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="" name="product_image" placeholder="Nhập thương hiệu">
                            </div>
                            @for($i=1;$i<5;$i++)
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Hình ảnh chi tiết sản phẩm {{$i}}</label>
                                <input type="file" class="form-control" id="" name="product_image_details[]" placeholder="">
                            </div>
                            @endfor
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Danh mục sản phẩm</label>
                                <select class="form-control" id="product_cate"name="product_cate">
                                    @foreach($cate_product as $key => $cate)
                                    <option value={{$cate->id}}>{{$cate->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Thương hiệu sản phẩm</label>
                                <select class="form-control" id="product_brand"name="product_brand">
                                    @foreach($brand_product as $key => $brand)
                                    <option value={{$brand->id}}>{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Thương hiệu sản phẩm</label>
                                <select class="form-control" id=""name="product_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" >Thêm sản Phẩm</button>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
