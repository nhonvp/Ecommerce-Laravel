@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @include('partials.content-header', ['name' =>'category', 'key'=>'Edit'])

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-md-8">
                        @foreach($edit_category_product as $key => $edit_value)
                        <form action="{{ route('categories.update',$edit_value->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Ten Danh Muc San Pham</label>
                                <input type="text" value="{{$edit_value->category_name}}" class="form-control" id="" name="category_name" placeholder="Nhap danh muc">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Mô tả</label>
                                <textarea style="resize: none" class="form-control" id="ckeditor2" rows="3" name="category_desc" >{{$edit_value->category_desc}}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" >Cập Nhật Danh Mục</button>
                        </form>
                        @endforeach
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
