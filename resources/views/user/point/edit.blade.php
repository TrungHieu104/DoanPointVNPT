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
                        <a class="pe-auto" href="{{route('list.index')}}">Điểm Đoàn viên</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Sửa đợt</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="accordion accordion-flush order" id="accordionFlushExample">
                {{-- <div class="card"> --}}
                    <div class="card-header">
                        <h1 class="card-title text-center">Sửa đợt đánh giá</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('list.update', $dotDG->id_DDG) }}">
                            @csrf @method('PUT')
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th scope="col">Tên Đợt</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="tenDot" value="{{ $dotDG->tenDot }}" type="text"
                                                        class="form-control" placeholder="Nhập tên đợt đánh giá">
                                                </td>
                                            </tr>
                                            @foreach ($tieuChis as $tieuChi) 
                                                <tr>
                                                    <th scope="col">{{ $tieuChi->ten }}</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        @php
                                                            $found = false;
                                                        @endphp
                                                        @foreach ($danhGias as $danhGia)
                                                            @if ($danhGia->id_TC == $tieuChi->id_TC)
                                                                <input value="{{ $danhGia->diem }}"
                                                                    name="diem[{{ $tieuChi->id_TC }}]" type="number"
                                                                    min="0" max="{{ $tieuChi->diemQuyDinh }}" class="form-control"
                                                                    placeholder="Nhập điểm tối đa {{ $tieuChi->diemQuyDinh }} điểm">
                                                                <input value="{{ $danhGia->link }}"
                                                                    name="link[{{ $tieuChi->id_TC }}]" type="text"
                                                                    class="form-control" placeholder="Nhập link">
                                                                <input value="{{ $danhGia->ghiChu }}"
                                                                    name="ghiChu[{{ $tieuChi->id_TC }}]" type="text"
                                                                    class="form-control" placeholder="Nhập ghi chú">
                                                                @php
                                                                    $found = true;
                                                                @endphp
                                                            @endif
                                                        @endforeach

                                                        @if (!$found)
                                                            <input value="" name="diem[{{ $tieuChi->id_TC }}]"
                                                                type="number" min="0" max="100"
                                                                class="form-control"
                                                                placeholder="Nhập điểm tối đa {{ $tieuChi->diemQuyDinh }} điểm">
                                                            <input value="" name="link[{{ $tieuChi->id_TC }}]"
                                                                type="text" class="form-control" placeholder="Nhập link">
                                                            <input value="" name="ghiChu[{{ $tieuChi->id_TC }}]"
                                                                type="text" class="form-control"
                                                                placeholder="Nhập ghi chú">
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
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
