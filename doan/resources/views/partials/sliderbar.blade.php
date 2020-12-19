 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src=" {{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dash Board</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <?php
        $image = Session::get('image');
        ?>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/upload/admin/<?php
          $image = Session::get('image');
          echo $image;
          ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
              <?php
              $name = Session::get('admin_name');
              echo $name;
              ?>
          </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
                <a href="{{route('dashboard_admin')}}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard_admin')}}" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Category
{{--                        <span class="right badge badge-danger">New</span>--}}
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('categories.create') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('categories.list')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Category</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('brand.index') }}" class="nav-link">
                    <i class="fab fa-bandcamp"></i>
                    <p>
                        Brand
{{--                        <span class="right badge badge-danger">New</span>--}}
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('brand.create') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Brand</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('brand.list')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Brand</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="" class="nav-link">
                    <i class="fas fa-i-cursor"></i>
                    <p>
                        Product Type
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('product_type_create') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Product Type</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product_type_list')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Product Type</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('product.index') }}" class="nav-link">
                    <i class="fab fa-product-hunt"></i>
                    <p>
                        Product
{{--                        <span class="right badge badge-danger">New</span>--}}
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('product.create') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.list')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Product</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('product.index') }}" class="nav-link">
                    <i class="fab fa-slideshare"></i>
                    <p>
                       Slider
                        {{--                        <span class="right badge badge-danger">New</span>--}}
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('add_slider') }}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Slider</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('all_slider')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Slider</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php
            $role = Session::get('role');
            ?>
            @if($role == '1')
            <li class="nav-item has-treeview menu-open">
                <a href="" class="nav-link">
                    <i class="fas fa-users"></i>
                    <p>
                        Users
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('all_user')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Users</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="{{ route('product.index') }}" class="nav-link">
                    <i class="fab fa-first-order"></i>
                    <p>
                        Order
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('order_manager')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Orders</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
