@extends('admin.layout')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Danh sách điểm Đoàn viên {{ Auth::user()->ten }}</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="" href="#">{{ $title }}</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="accordion accordion-flush order" id="accordionFlushExample">
                {{-- <div class="card"> --}}
                    <div class="card-header">
                        <h1 class="card-title text-center">Sửa thông tin Đoàn viên</h1>
                    </div>
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
