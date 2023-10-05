<section id="sidebar">
    <a href="#" class="brand">
        <!-- <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span> -->
        <img class="logo_admin" src="/images/logo.png" alt="">
    </a>
    <ul class="side-menu top" >
        <li class="{{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Bảng điều khiển</span>
            </a>
        </li>
        {{-- <li class="{{ Route::currentRouteName() === 'manageCQ.index' ? 'active' : '' }}">
            <a href="{{ route('manageCQ.index') }}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Quản lý cơ quan</span>
            </a>
        </li> --}}
        <li class="{{ Route::currentRouteName() === 'manageUsers.index' || Route::currentRouteName() === 'manageUsers.create' || Route::currentRouteName() === 'manageUsers.edit' ? 'active' : '' }}">
            <a href="{{ route('manageUsers.index') }}">
                <i class='bx bxs-group'></i>
                <span class="text">Quản lý Đoàn viên</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'manageTieuChi.index' ? 'active' : '' }}">
            <a href="">
                <i class='bx bx-list-plus'></i>
                <span class="text">Quản lý tiêu chí đánh giá</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">Ghi chú</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Phản hồi</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog'></i>
                <span class="text">Cài đặt</span>
            </a>
        </li>
        <li>
            <a href="{{ url('/logout') }}" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Đăng xuất</span>
            </a>
        </li>
    </ul>
</section>