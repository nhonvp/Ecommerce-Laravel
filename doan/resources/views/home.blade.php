@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials/content-header' , ['name' =>' Home' , 'key'=>'home'])

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

              <div class="col-md-12">
                  Home
              </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection
