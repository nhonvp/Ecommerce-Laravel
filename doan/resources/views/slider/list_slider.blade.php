
@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'All_Slider', 'key'=>'List'])

        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Slider Table</h3>
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
                                            <th>Desciption</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Edit/Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_slide as $key => $all_slide)
                                            <tr>
                                                <td>{{$all_slide->slider_name}}</td>
                                                <td>{{$all_slide->slider_desc}}</td>
                                                <td>
                                                    <img src="/public/upload/slider/{{$all_slide->slider_image}}" height="150" width="300" >
                                                </td>
                                                <td>
                                                    @if ($all_slide->slider_status==0)
                                                        <a href="{{route('active_slider',$all_slide->slider_id)}}"><span>Ẩn</span></a>
                                                    @else
                                                        <a href="{{route('unactive_slider',$all_slide->slider_id)}}"><span>Hiện</span></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="">
                                                        <button type="button" class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                    </a>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')"
                                                       href="{{   route('slider_delete',$all_slide->slider_id)  }}">
                                                        <button type="button" class="btn btn-outline-danger" ><i class="fas fa-trash"></i></button>
                                                    </a>
                                                </td>
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
