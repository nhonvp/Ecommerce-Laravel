@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'Slider', 'key'=>'Add'])

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
                        <form action="{{ route('save_slider') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tên Slide</label>
                                <input type="text" class="form-control" id="" name="slider_name" placeholder="Nhập thương hiệu">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Mô tả Slide</label>
                                <textarea class="form-control" id="ckeditor3" rows="3" name="slider_desc" placeholder="Chi tiết thương hiệu"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"> Hình ảnh Slide</label>
                                <input type="file" class="form-control" id="" name="slider_image" placeholder="Nhập thương hiệu">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Thương hiệu sản phẩm</label>
                                <select class="form-control" id=""name="slider_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" >Add Banner</button>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
