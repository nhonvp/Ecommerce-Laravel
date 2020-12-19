@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'All_ProductType', 'key'=>'List'])
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
                                            <th>Name Productype</th>
{{--                                            <th>Status</th>--}}
{{--                                            <th>Chi tiết</th>--}}
                                            <th>Edit/Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_product_type as $key =>$product_type_pro)
                                            <tr>
                                                <td>{{$product_type_pro->product_type_name}}</td>
                                                <td>
                                                    <a href="{{ route('product_type_edit',$product_type_pro->product_type_id)}}">
                                                        <button type="button" class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                    </a>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')"
                                                       href="{{ route('product_type_delete',$product_type_pro->product_type_id)}}">
                                                        <button type="button" class="btn btn-outline-danger" ><i class="fas fa-trash"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{--                                <div >--}}
                                {{--                                    {{ $all_brand_product->links() }};--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>
@endsection
