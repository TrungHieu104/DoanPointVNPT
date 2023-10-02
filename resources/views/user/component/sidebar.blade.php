<section id="sidebar">
    <a href="#" class="brand">
        <!-- <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span> -->
        <img class="logo_admin" src="/images/logo.png" alt="">
    </a>
    <ul class="side-menu top">
        <li class="{{ Route::currentRouteName() === 'profile.index' ? 'active' : '' }}">
            <a href="{{ route('profile.index') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Thông tin Đoàn viên</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'list.index' || Route::currentRouteName() === 'list.create' || Route::currentRouteName() === 'list.edit' ? 'active' : '' }}">
            <a href="{{ route('list.index') }}">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Điểm Đoàn viên</span>
            </a>
        </li>

        <ul class="side-menu">
            {{-- <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Cài đặt</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ url('/logout') }}" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Đăng xuất</span>
                </a>
            </li>
        </ul>
    </ul>
</section>