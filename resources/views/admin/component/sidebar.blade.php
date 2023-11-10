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
        @php
            $check_parent_CQ = DB::table('coquan')->where('id_CQ','=', Auth::user()->id_CQ)->value('parent_CQ');
        @endphp
        @if ($check_parent_CQ == 0)
            <li class="{{ Route::currentRouteName() === 'manageCQ.index' 
            || Route::currentRouteName() === 'manageCQ.create' 
            || Route::currentRouteName() === 'manageCQ.edit' ? 'active' : '' }}">
                <a href="{{ route('manageCQ.index') }}">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Quản lý cơ quan</span>
                </a>
            </li>
        @endif
        <li class="{{ Route::currentRouteName() === 'manageDanhGia.index' ? 'active' : '' }}">
            <a href="{{ route('manageDanhGia.index') }}">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Quản lý Đánh giá</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'manageUsers.index' 
        || Route::currentRouteName() === 'manageUsers.create' 
        || Route::currentRouteName() === 'manageUsers.edit' ? 'active' : '' }}">
            <a href="{{ route('manageUsers.index') }}">
                <i class='bx bxs-group'></i>
                <span class="text">Quản lý Đoàn viên</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'manageTieuChi.index' 
        || Route::currentRouteName() === 'manageTieuChi.create' 
        || Route::currentRouteName() === 'manageTieuChi.edit' ? 'active' : '' }}">
            <a href="{{ route('manageTieuChi.index') }}">
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