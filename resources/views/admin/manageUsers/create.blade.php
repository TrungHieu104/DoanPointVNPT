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
                                        <table class="table table-borderless">
                                            <tr >
                                                <th class="row">
                                                    <label class="col-3 m-auto">
                                                        Lựa chọn loại đánh giá
                                                    </label>
                                                    <label class="col-3 m-auto">
                                                        <input type="radio" id="thangRadios" class="option-input radio"
                                                            name="example" checked />
                                                            Đánh giá theo tháng
                                                    </label>
                                                    <label class="col-3 m-auto">
                                                        <input type="radio" id="quyRadios" class="option-input radio"
                                                            name="example" />
                                                            Đánh giá theo quý
                                                    </label>
                                                    <label class="col-3 m-auto">
                                                        <input type="radio" id="namRadios" class="option-input radio"
                                                            name="example" />
                                                            Đánh giá theo năm
                                                    </label>
                                                </th>
                                            </tr>
                                      
                                            <tr class="row">
                                            
                                                <td class="col-4 px-4">
                                                    <select name="thang" class="form-select col-6 "
                                                        aria-label="Default select example">
                                                        <option selected value="">Lựa chọn tháng</option>
                                                        @foreach ($thang as $thang)
                                                            <option value="{{ $thang->id_thang }}">{{ $thang->thang }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td class="col-4 px-4" id="test">
                                                    <select style="display: none" name="quy" class="form-select col-6 "
                                                        aria-label="Default select example">
                                                        <option selected value="">Lựa chọn quý</option>
                                                        @foreach ($quy as $quy)
                                                            <option value="{{ $quy->id_quy }}">{{ $quy->quy }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td class="col-4 px-4">
                                                    <select name="nam" class="form-select col-6 "
                                                        aria-label="Default select example">
                                                        <option selected value="">Lựa chọn năm</option>
                                                        @foreach ($nam as $nam)
                                                            <option value="{{ $nam->id_nam }}">{{ $nam->nam }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Tên Đợt</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <input name="tenDot" type="text" class="form-control"
                                                            placeholder="Nhập tên đợt đánh giá" value="text">
                                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">Lựa chọn các tên đợt có sẵn</button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                                            <li><a class="dropdown-item" href="#">Another action</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Something else
                                                                    here</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Separated link</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @foreach ($tieuChis as $tieuChi)
                                                <tr>
                                                    <th scope="col" rowspan="{{ $tieuChi->soLuongDiem }}">
                                                        {{ $tieuChi->ten }}</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input name="diem[{{ $tieuChi->id_TC }}]" type="number"
                                                            min="0" max="100" class="form-control"
                                                            placeholder="Nhập điểm tối đa {{ $tieuChi->diemQuyDinh }} điểm" value="2">
                                                        <input name="link[{{ $tieuChi->id_TC }}]" type="text"
                                                            class="form-control" placeholder="Nhập link">
                                                        <input name="ghiChu[{{ $tieuChi->id_TC }}]" type="text"
                                                            class="form-control" placeholder="Nhập ghi chú">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- </div> --}}


            </div>
    </main>
    <script>
        // Lấy ra các radio button và select options
        var radioThang = document.getElementById("thangRadios");
        var radioQuy = document.getElementById("quyRadios");
        var radioNam = document.getElementById("namRadios");
        var selectMonth = document.querySelector("select[name='thang']");
        var selectQuy = document.querySelector("select[name='quy']");
        var selectYear = document.querySelector("select[name='nam']");

        // Bắt sự kiện khi radio button được chọn
        radioThang.addEventListener("change", function() {
            if (this.checked) {
                selectQuy.value = '';

                selectMonth.style.display = 'block';
                selectQuy.style.display = 'none';
                selectYear.style.display = 'block';
            }
        });

        radioQuy.addEventListener("change", function() {
            if (this.checked) {
                selectMonth.value = '';

                selectQuy.style.display = 'block';
                selectMonth.style.display = 'none';
                selectYear.style.display = 'block';
            }
        });

        radioNam.addEventListener("change", function() {
            if (this.checked) {
                selectMonth.value = '';
                selectQuy.value = '';

                selectYear.style.display = 'block';
                selectMonth.style.display = 'none';
                selectQuy.style.display = 'none';
            }
        });
        
    </script>
@endsection
