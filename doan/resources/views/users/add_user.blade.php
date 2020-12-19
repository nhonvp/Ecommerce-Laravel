@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' =>'Users', 'key'=>'Add'])

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <form action="{{route('save_user')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" id="" name="user_name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="text" class="form-control" id="" name="user_email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Password</label>
                                <input type="password" class="form-control" id="" name="user_password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Image</label>
                                <input type="file" class="form-control" id="" name="user_image" placeholder="Image">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Role</label>
                                <select class="form-control" id="product_brand"name="user_role" >
                                    @foreach($role as $key => $role)
                                        <option value={{$role->role_id}}>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" >Add user</button>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
