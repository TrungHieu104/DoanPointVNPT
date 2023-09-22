@extends('user.layout')
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
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-center">Tạo đợt đánh giá</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('list.store') }}">@csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session('message'))
                                            <div class="alert alert-danger">
                                                {{ session('message') }}
                                            </div>
                                        @else
                                            <accordion id="accordionFlushExample">
                                                <accordion-item>
                                                    <accordion-header>
                                                        <accordion-button class="accordion-button fw-bold" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                            aria-expanded="true" aria-controls="flush-collapseOne">
                                                            Thông tin đợt đánh giá
                                                        </accordion-button>
                                                    </accordion-header>
                                                    <accordion-collapse id="flush-collapseOne"
                                                        class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">

                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Tên Đợt</th>
                                                                        @foreach ($tieuChis as $tieuChi)
                                                                            <th scope="col">{{ $tieuChi->ten }}</th>
                                                                        @endforeach
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <input name="tenDot" type="text"
                                                                                class="form-control"
                                                                                placeholder="Nhập tên đợt đánh giá">
                                                                        </td>
                                                                        @foreach ($tieuChis as $tieuChi)
                                                                            <td>
                                                                                <input name="diem[{{ $tieuChi->id_TC }}]"
                                                                                    type="number" min="0"
                                                                                    max="100" class="form-control"
                                                                                    placeholder="Nhập điểm tối đa {{ $tieuChi->diemQuyDinh }} điểm">
                                                                                <input name="link[{{ $tieuChi->id_TC }}]"
                                                                                    type="text" class="form-control"
                                                                                    placeholder="Nhập link">
                                                                                <input name="ghiChu[{{ $tieuChi->id_TC }}]"
                                                                                    type="text" class="form-control"
                                                                                    placeholder="Nhập ghi chú">
                                                                            </td>
                                                                        @endforeach
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </accordion-collapse>
                                                </accordion-item>
                                            </accordion>
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
    </main>
@endsection
