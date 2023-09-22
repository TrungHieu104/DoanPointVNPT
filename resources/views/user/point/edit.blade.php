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
                        <h1 class="card-title text-center">Sửa đợt đánh giá</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('list.update', $dotDG->id_DDG)}}">
                            @csrf @method('PUT')
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">

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
                                                                        <input name="tenDot"
                                                                            value="{{ $dotDG->tenDot }}"
                                                                            type="text" class="form-control"
                                                                            placeholder="Nhập tên đợt đánh giá">
                                                                    </td>
                                                                    @foreach ($tieuChis as $tieuChi)
                                                                        <td>
                                                                            @php
                                                                                $found = false;
                                                                            @endphp
                                                                            @foreach ($danhGias as $danhGia)
                                                                                @if ($danhGia->id_TC == $tieuChi->id_TC)
                                                                                    <input value="{{ $danhGia->diem }}"
                                                                                        name="diem[{{ $tieuChi->id_TC }}]"
                                                                                        type="number" min="0"
                                                                                        max="100" class="form-control"
                                                                                        placeholder="Nhập điểm tối đa {{ $tieuChi->diemQuyDinh }} điểm">
                                                                                    <input value="{{ $danhGia->link }}"
                                                                                        name="link[{{ $tieuChi->id_TC }}]"
                                                                                        type="text" class="form-control"
                                                                                        placeholder="Nhập link">
                                                                                    <input value="{{ $danhGia->ghiChu }}"
                                                                                        name="ghiChu[{{ $tieuChi->id_TC }}]"
                                                                                        type="text" class="form-control"
                                                                                        placeholder="Nhập ghi chú">
                                                                                    @php
                                                                                        $found = true;
                                                                                    @endphp
                                                                                @endif
                                                                            @endforeach

                                                                            @if (!$found)
                                                                                <input value=""
                                                                                    name="diem[{{ $tieuChi->id_TC }}]"
                                                                                    type="number" min="0"
                                                                                    max="100" class="form-control"
                                                                                    placeholder="Nhập điểm tối đa {{ $tieuChi->diemQuyDinh }} điểm">
                                                                                <input value=""
                                                                                    name="link[{{ $tieuChi->id_TC }}]"
                                                                                    type="text" class="form-control"
                                                                                    placeholder="Nhập link">
                                                                                <input value=""
                                                                                    name="ghiChu[{{ $tieuChi->id_TC }}]"
                                                                                    type="text" class="form-control"
                                                                                    placeholder="Nhập ghi chú">
                                                                            @endif
                                                                        </td>

                                                                        {{-- <td>
                                                                                @foreach ($danhGias as $danhGia)
                                                                                    @if ($danhGia->id_TC == $tieuChi->id_TC)
                                                                                        <input value="{{ $danhGia->diem }}" name="diem[{{ $tieuChi->id_TC }}]" type="number" min="0" max="100" class="form-control" placeholder="Nhập điểm tối đa {{ $tieuChi->diemQuyDinh }} điểm">
                                                                                        <input value="{{ $danhGia->link }}" name="link[{{ $tieuChi->id_TC }}]" type="text" class="form-control" placeholder="Nhập link">
                                                                                        <input value="{{ $danhGia->ghiChu }}" name="ghiChu[{{ $tieuChi->id_TC }}]" type="text" class="form-control" placeholder="Nhập ghi chú">
                                                                                    @endif
                                                                                @endforeach
                                                                            </td> --}}
                                                                    @endforeach
                                                                </tr>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </accordion-collapse>
                                            </accordion-item>
                                        </accordion>
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
