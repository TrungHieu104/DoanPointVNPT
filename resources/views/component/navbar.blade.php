<nav>
    <i class='bx bx-menu'></i>
    <a href="#" class="nav-link">
        @if (Auth::user()->role == 0)
            
            Đánh giá Đoàn viên thanh niên - {{$cq->ten}}</a>
        @else
            Quản lý Đoàn viên thanh niên - {{$cq->ten}}</a>
            
        @endif
    <form action="#">
        <div class="form-input">
            <input type="search" placeholder="Tìm kiếm...">
            <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
        </div>
    </form>
    <input type="checkbox" id="switch-mode" hidden>
    <label for="switch-mode" class="switch-mode"></label>
    <!-- <a href="#" class="notification">
        <i class='bx bxs-bell' ></i>
        <span class="num">8</span>
    </a>
    <a href="#" class="profile">
        <img src="images/people.png">
    </a> -->
    <a >{{ Auth::user()->ten }}</a>
    <div class="profile">
        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
            alt="">
        <ul class="profile-link">
            <li><a href="#"><i class='bx bxs-user-circle icon'></i> Hồ sơ</a></li>
            <li><a href="{{ route('changePassword') }}"><i class='bx bxs-cog'></i> Đổi mật khẩu</a></li>
            {{-- <li><a href="#"><i class='bx bx-question-mark'></i> Quên mật khẩu</a></li> --}}
        </ul>
    </div>
</nav>