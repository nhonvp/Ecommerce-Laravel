@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @include('partials.content-header', ['name' =>'brand', 'key'=>'Edit'])

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-8">
                        @foreach($edit_brand_product as $key => $edit_value)
                            <form action="{{ route('brand.update',$edit_value->id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"> Ten Danh Muc San Pham</label>
                                    <input type="text" value="{{$edit_value->brand_name}}" class="form-control" id="" name="brand_name" placeholder="Nhap danh muc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Mô tả</label>
                                    <textarea style="resize: none" class="form-control" id="ckeditor5" rows="3" name="brand_desc" >{{$edit_value->brand_desc}}
                                </textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" >Cập Nhật Brand</button>
                            </form>
                        @endforeach
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
