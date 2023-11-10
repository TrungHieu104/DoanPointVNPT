@extends('admin.layout')
@section('title')
    Quản lý Đoàn viên thanh niên
@endsection
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Sửa thông tin Đoàn viên</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="pe-auto" href="{{ route('manageUsers.index') }}">Quản lý Đoàn viên</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Sửa thông tin Đoàn viên</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="accordion accordion-flush order" id="accordionFlushExample">
                <div class="card-body">
                    <form method="post" action="{{ route('manageUsers.update', $get_one_user->id) }}">
                        @csrf @method('PUT')
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th scope="col">Tên Đoàn viên</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="ten" value="{{ $get_one_user->ten }}" type="text"
                                                    class="form-control" placeholder="Nhập tên Đoàn viên">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="phone" value="{{ $get_one_user->phone }}" type="text"
                                                    class="form-control" placeholder="Nhập số điện thoại">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Email</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="email" value="{{ $get_one_user->email }}" type="text"
                                                    class="form-control" placeholder="Nhập email Đoàn viên">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Chọn vai trò</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="role" class="form-select"
                                                    aria-label="Default select example">
                                                    @php
                                                        $role = $get_one_user->role;
                                                        
                                                        switch ($role) {
                                                            case 0:
                                                                echo '<option value="0" selected>Đoàn viên</option>';
                                                                echo '<option value="1">Quản trị viên</option>';
                                                                break;
                                                            case 1:
                                                                echo '<option value="1" selected>Quản trị viên</option>';
                                                                echo '<option value="0">Đoàn viên</option>';
                                                                break;
                                                        }
                                                    @endphp
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- </div> --}}
            </div>
    </main>
@endsection
