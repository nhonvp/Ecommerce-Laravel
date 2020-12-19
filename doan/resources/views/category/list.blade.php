
@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')

    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'All_Danh Muc', 'key'=>'List'])

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
{{--                                    <h3>--}}
{{--                                        <?php--}}
{{--                                        $message = Session::get('message');--}}
{{--                                        if($message){--}}
{{--                                            echo '<span class="text-alert">'.$message.'</span>';--}}

{{--                                            Session::put('message',null);--}}
{{--                                        }--}}
{{--                                        ?></h3>--}}
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
                                            <th>Tên Danh Mục</th>
                                            <th>Status</th>
                                            <th>Chi tiết</th>
                                            <th>Edit/Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($all_category_product as $key =>$cate_pro)
                                        <tr>
                                            <td>{{$cate_pro->category_name}}</td>
                                            <td>
                                                @if ($cate_pro->category_status==0)
                                                    <a href="{{('/active_category_product/'.$cate_pro->id)}}"><span>Ẩn</span></a>
                                                @else
                                                    <a href="{{('/unactive_category_product/'.$cate_pro->id)}}"><span>Hiện</span></a>
                                                @endif
                                            </td>
                                            <td><span class="tag tag-success">{{$cate_pro->category_desc}}</span></td>
                                            <td>
{{--                                                <a>--}}
{{--                                                    <button type="button" class="btn btn-outline-primary"><i class="fas fa-eye"></i></button>--}}
{{--                                                </a>--}}
                                                <a href="{{   route('categories.edit',$cate_pro->id)}}">
                                                    <button type="button" class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                </a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không')"
                                                    href="{{   route('categories.delete',$cate_pro->id)  }}">
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
