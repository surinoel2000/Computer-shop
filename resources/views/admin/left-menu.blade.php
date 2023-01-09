<!-- Brand Logo -->
<a href="/admin/dashboard" class="brand-link">
    <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">EndGameGear</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/dist/img/oggyr.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">
                <?=$user->name?>
            </a>
        </div>
        <div class="info">
            <button onclick="location.href='{{route('admin.logout')}}'" class="fas fa-sign-out-alt" onclick="">Đăng
                xuất</button>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{route('listing.index',['model'=>'Category'])}}" class="nav-link">
                    <i class="nav-icon fas fa-list-ol"></i>
                    <p>
                        Danh sách danh mục
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('listing.index',['model'=>'Brand'])}}" class="nav-link">
                    <i class="nav-icon fas fa-landmark"></i>
                    <p>
                        Danh sách hãng sản phẩm
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('listing.index',['model'=>'Product'])}}" class="nav-link">
                    <i class="nav-icon fas fa-laptop"></i>
                    <p>
                        Danh sách sản phẩm
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('listing.index',['model'=>'User'])}}" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        Danh sách tài khoản users
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('listing.index',['model'=>'Order'])}}" class="nav-link">
                    <i class="nav-icon fas fa-money-check"></i>
                    <p>
                        Danh sách đơn hàng
                    </p>
                </a>
            </li>





        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
