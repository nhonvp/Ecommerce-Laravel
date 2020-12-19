@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'ProductType', 'key'=>'Edit'])

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-8">
                        @foreach($edit_product_type as $key => $edit_value_pro)
                            <form action="{{ route('product_type_update',$edit_value_pro->product_type_id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name ProductType</label>
                                    <input type="text" value="{{$edit_value_pro->product_type_name}}" class="form-control" id="" name="brand_name" placeholder="Nhap danh muc">
                                </div>
                                <button type="submit" class="btn btn-primary">Update ProductType</button>
                            </form>
                        @endforeach
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
