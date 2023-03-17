 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">
                <?php 
                use Illuminate\Support\Facades\Session;
                $msg = Session::get('admin_name');
                if($msg){
                  echo '<p>'.$msg.'</p>';
                  Session::put('message',null);
                }
                ?>
            </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bars"></i>
                <p>
                    Hãng Sản Xuất
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm Hãng Sản Xuất</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/menus/list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh Sách Hãng </p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-solid fa-store"></i>
                <!-- <i class="fa-light fa-store"></i> -->
                <p>
                    Sản phẩm
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/product/add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm Sản Phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/product/list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh Sách Sản Phẩm</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-users"></i>
                <p>
                    Khách Hàng
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <!-- <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm Hãng Sản Xuất</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="/customer/list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh Sách Khách Hàng </p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <!-- <i class="nav-icon fa-solid fa-clipboard-list-check"></i> -->
                <!-- <i class="nav-icon fa-solid fa-clipboard-list-check"></i> -->
                <!-- <i class="nav-icon fa-regular fa-clipboard-list-check"></i> -->
                <!-- <i class="nav-icon fa-solid fa-notebook"></i> -->
                <!-- <i class="nav-icon fa-solid fa-users"></i> -->
                <i class="nav-icon fa-solid fa-clipboard"></i>
                <p>
                    Đơn Hàng
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <!-- <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm Hãng Sản Xuất</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="/order/list" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh Sách Đơn Hàng </p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/admin/users/logout" class="nav-link">

                <p>
                    Đăng xuất
                    
                </p>
                </a>
                
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>