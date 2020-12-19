
@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'All_Product', 'key'=>'List'])

        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Responsive Hover Table</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Status</th>
                                            <th>Edit/Delete</th>
                                            <th>Desciption</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_product as $key =>$product_pro)
                                            <tr>
                                                <td>{{$product_pro->product_name}}</td>

                                                <td>{{$product_pro->product_type_name}}</td>
                                                <td>
                                                    <img src="/upload/product/{{$product_pro->product_image}}" height="120" width="120" >
                                                </td>
                                                <td>{{$product_pro->product_price}} VNĐ</td>
                                                <td>{{$product_pro->category_name}}</td>
                                                <td>{{$product_pro->brand_name}}</td>
                                                <td>
                                                    @if ($product_pro->product_status==0)
                                                        <a href="{{('/active_product/'.$product_pro->product_id)}}"><span>Ẩn</span></a>
                                                    @else
                                                        <a href="{{('/unactive_product/'.$product_pro->product_id)}}"><span>Hiện</span></a>
                                                    @endif
                                                </td>
                                                <td>
{{--                                                    <a>--}}
{{--                                                        <button type="button" class="btn btn-outline-primary"><i class="fas fa-eye"></i></button>--}}
{{--                                                    </a>--}}
                                                    <a href="{{   route('product.edit',$product_pro->product_id)}}">
                                                        <button type="button" class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                    </a>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')"
                                                       href="{{   route('product.delete',$product_pro->product_id)  }}">
                                                        <button type="button" class="btn btn-outline-danger" ><i class="fas fa-trash"></i></button>
                                                    </a>
                                                </td>
                                                <td class="description">{{$product_pro->product_desc}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

        </div>
    </div>
@endsection
