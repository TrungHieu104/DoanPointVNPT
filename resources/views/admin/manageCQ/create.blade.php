@extends('admin.layout')
@section('title')
    Quản lý cơ quan
@endsection
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Thêm Cơ quan mới</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="pe-auto" href="{{ route('manageCQ.index') }}">Quản lý Cơ quan</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Thêm Cơ quan mới</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="accordion accordion-flush order" id="accordionFlushExample">
                <div class="card-body">
                    <form method="post" action="{{ route('manageCQ.store') }}">@csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th scope="col">Tên Cơ quan</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="name" type="text" class="form-control"
                                                    placeholder="Nhập tên Cơ quan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Địa chỉ</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="address" type="text" class="form-control"
                                                    placeholder="Nhập Địa chỉ">
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
                                            <th scope="col">Số điện thoại</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="phone" type="text" class="form-control"
                                                    placeholder="Nhập số điện thoại">
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="col">Chọn cơ quan trực thuộc</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="parent_CQ" class="form-select"
                                                    aria-label="Default select example">
                                                    <option value="0" selected>Không có cơ quan trực thuộc</option>
                                                    @foreach ($parent_CQ as $pr_CQ)
                                                        <option value="{{$pr_CQ->id_CQ}}">{{$pr_CQ->ten}}</option>
                                                    @endforeach
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
    </main>
    
@endsection
