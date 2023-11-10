@extends('admin.layout')
@section('title')
    Quản lý Đoàn viên thanh niên
@endsection
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Thêm Đoàn viên mới</h1>
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
                        <a class="active" href="#">Thêm Đoàn viên mới</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="accordion accordion-flush order" id="accordionFlushExample">
                <div class="card-body">
                    <form method="post" action="{{ route('manageUsers.store') }}">@csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th scope="col">Tên Đoàn viên</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="ten" type="text" class="form-control"
                                                    placeholder="Nhập tên Đoàn viên">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="phone" type="text" class="form-control"
                                                    placeholder="Nhập số điện thoại">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Email</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="email" type="text" class="form-control"
                                                    placeholder="Nhập email Đoàn viên">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Mật khẩu</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="password" value="123" type="text" class="form-control"
                                                    placeholder="Nhập email Đoàn viên">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Chọn vai trò</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="role" class="form-select"
                                                    aria-label="Default select example">
                                                    <option value="0" selected>Đoàn viên</option>';
                                                    <option value="1">Quản trị viên</option>';
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
            </div>


        </div>
    </main>
@endsection
