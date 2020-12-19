@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @include('partials.content-header', ['name' =>'category', 'key'=>'Add'])

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-md-8">
<!--                       --><?php
//                        $message = Session::get('message');
//                        if($message){
//                            echo '<h3><span class="text-alert">'.$message.'</span></h3>';
//                            Session::put('message',null);
//                        }
//                        ?>
                        <form action="{{ route('categories.save') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Ten Danh Muc San Pham</label>
                                <input type="text" class="form-control" id="" name="category_name" placeholder="Nhap danh muc">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Mô tả</label>
                                <textarea class="form-control" id="ckeditor" rows="3" name="category_desc"></textarea>
                                </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id=""name="category_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" >Submit</button>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
