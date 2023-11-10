@extends('admin.layout')
@section('title')
    Quản lý Đánh gía
@endsection
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Thêm Tiêu chí mới</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="pe-auto" href="{{ route('manageDanhGia.index') }}">Quản lý Đánh giá</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="" href="#">Tạo tiêu chí mới</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="accordion accordion-flush order" id="accordionFlushExample">
                <div class="card-body">
                    <form method="post" action="{{ route('manageTieuChi.store') }}">@csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th scope="col">Tên Tiêu chí</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="ten" type="text" class="form-control"
                                                    placeholder="Nhập tên Tiêu chí">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Điểm quy định</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="diemQuyDinh" type="number" class="form-control" placeholder="Nhập Điểm quy định">
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
    </main>
@endsection
