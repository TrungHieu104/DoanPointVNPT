@extends('admin.layout')
@section('title')
    Quản lý cơ quan
@endsection
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Sửa cơ quan</h1>
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
                        <a class="active" href="#">Sửa cơ quan</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="accordion accordion-flush order" id="accordionFlushExample">
                <div class="card-body">
                    <form method="post" action="{{ route('manageCQ.update', $get_one_cq->id_CQ) }}">
                        @csrf @method('PUT')
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th scope="col">Tên Cơ quan</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="name" value="{{ $get_one_cq->ten }}" type="text"
                                                    class="form-control" placeholder="Nhập tên Cơ quan">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Địa chỉ</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="address" value="{{ $get_one_cq->diaChi }}" type="text"
                                                    class="form-control" placeholder="Nhập Địa chỉ">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Email</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="email" value="{{ $get_one_cq->email }}" type="text"
                                                    class="form-control" placeholder="Nhập email Đoàn viên">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Số điện thoại</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="phone" value="{{ $get_one_cq->phone }}" type="text"
                                                    class="form-control" placeholder="Nhập số điện thoại">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="col">Chọn cơ quan trực thuộc</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="parent_CQ" class="form-select"
                                                    aria-label="Default select example">
                                                    @if ($get_one_cq->parent_CQ == 0)
                                                        <option value="0" selected>Không có cơ quan trực thuộc</option>
                                                    @else
                                                        @php
                                                            $prcq = DB::table('coquan')
                                                                ->where('id_CQ', '=', $get_one_cq->parent_CQ)
                                                                ->first();
                                                        @endphp
                                                        <option value="{{ $get_one_cq->parent_CQ }}" selected>
                                                            {{ $prcq->ten }}</option>
                                                        <option value="0">Không có cơ quan trực thuộc</option>
                                                    @endif
                                                    
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
