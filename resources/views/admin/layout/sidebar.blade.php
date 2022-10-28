<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="admin/assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="admin/assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="admin/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="admin/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Trang Chủ</li>

            <li class="side-nav-item">
                <a href="apps-calendar.html" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Trang Chủ </span>
                </a>
            </li>
            <li class="side-nav-title side-nav-item">Quản Lý</li>

            <li class="side-nav-item">
                <a href="{{route('danhmuc.index')}}" class="side-nav-link">
                    <i class="uil-tag-alt"></i>
                    <span> Danh Mục </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('sanpham.index')}}" class="side-nav-link">
                    <i class=" uil-store"></i>
                    <span>Sản Phẩm</span>
                </a>
            </li>
        </ul>


        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>