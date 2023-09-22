@extends('user.layout')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Cập nhật & đánh giá thông tin Đoàn viên
                    {{-- @foreach ($dataLDG as $ldg)
                        @if ($ldg->thang == $currentMonth && $ldg->quy == $currentQuarter && $ldg->nam == $currentYear)
                            {{ 'Quý: ' . $ldg->quy }} - {{ $ldg->thang }}/{{ $ldg->nam }}
                        @endif
                    @endforeach --}}

                </h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="" href="#">{{ $cq->ten }}</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        Mã Đoàn Viên:<a class="active" href="#"> {{ Auth::user()->id }}</a>
                    </li>
                </ul>
            </div>



            {{-- @foreach ($dataDG as $dDG) --}}
            @if (Auth::user()->id)
                @if (Auth::user()->trangThai == 0)
                    <button type="button" class="btn btn-outline-danger" disabled>
                        <i class="fa-solid fa-x"></i>
                        Chưa hoàn thành
                    </button>
                @elseif (Auth::user()->trangThai == 1)
                    <button type="button" class="btn btn-outline-warning" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #ffc107
                                }
                            </style>
                            <path
                                d="M16.1 260.2c-22.6 12.9-20.5 47.3 3.6 57.3L160 376V479.3c0 18.1 14.6 32.7 32.7 32.7c9.7 0 18.9-4.3 25.1-11.8l62-74.3 123.9 51.6c18.9 7.9 40.8-4.5 43.9-24.7l64-416c1.9-12.1-3.4-24.3-13.5-31.2s-23.3-7.5-34-1.4l-448 256zm52.1 25.5L409.7 90.6 190.1 336l1.2 1L68.2 285.7zM403.3 425.4L236.7 355.9 450.8 116.6 403.3 425.4z" />
                        </svg>
                        Đang chờ duyệt
                    </button>
                @elseif (Auth::user()->trangThai == 2)
                    <button type="button" class="btn btn-outline-success" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #198754
                                }
                            </style>
                            <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                        </svg>
                        Đã hoàn thành
                    </button>
                @endif
            @else
                <button type="button" class="btn btn-outline-danger" disabled>
                    <i class="fa-solid fa-x"></i>
                    Chưa hoàn thành
                </button>
            @endif
            {{-- @endforeach --}}




        </div>
        <div class="table-data">
            <div class="accordion accordion-flush order" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                            1. Thông tin cá nhân
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse show"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Họ và tên</label>
                                    <input type="text" name="ten" class="form-control" id="inputEmail4"
                                        value="{{ Auth::user()->ten }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="inputPassword4"
                                        value="{{ Auth::user()->phone }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Gmail</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4"
                                        value="{{ Auth::user()->email }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Mã cơ quan</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected value="{{ Auth::user()->id_CQ }}">{{ Auth::user()->id_CQ }} -
                                            {{ $cq->ten }}</option>
                                        @foreach ($dataCQ as $dCQ)
                                            <option value="{{ $dCQ->id_CQ }}">{{ $dCQ->id_CQ }} - {{ $dCQ->ten }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" min="0" max="100" name="id_CQ" class="form-control"
                                        id="inputPassword4" value="{{ Auth::user()->id_CQ }} - {{ $cq->ten }}"> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            2. Đánh giá tổng quan
                        </button>
                    </h2>
                    {{-- @php
                        echo var_dump($dataDG);
                        echo $id_LDG_current;
                    @endphp --}}
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row g-3">
                                {{-- @foreach ($dataTC as $dTC)
                                    <div class="col-md-12">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text w-25" id="addon-wrapping">{{ $dTC->ten }} :
                                            </span>
                                            @php
                                                $danhGia = $dataDG->where('id_TC', $dTC->id_TC)->first();
                                            @endphp

                                            <input type="number" min="0" max="{{ $dTC->diem }}"
                                                value="{{ $danhGia ? $danhGia->diemTuCham : '' }}" class="form-control"
                                                placeholder="Nhập điểm tối đa {{ $dTC->diem }} điểm"
                                                aria-label="Username" aria-describedby="addon-wrapping"
                                                oninput="if(this.value.length > {{ $dTC->max_length }}) { this.value = this.value.slice(0, {{ $dTC->max_length }}); }">

                                         
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2"
                                                    style="color: var(--bs-accordion-color);">Minh
                                                    chứng </label>
                                            </div>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2"
                                                    style="color: var(--bs-accordion-color);">Ghi
                                                    chú </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                3. Góp ý & Gửi đánh giá
                            </button>
                        </h2>
                        <br>
                        <div id="flush-collapseThree" class="accordion-collapse collapse "
                            data-bs-parent="#accordionFlushExample">

                            <div class="form-check py-3 px-5">
                                <input class="form-check-input checkbox" type="checkbox" id="gridCheck">
                                <label class="form-check-label text-checkbox" for="gridCheck">
                                    Tôi đã kiểm tra thông tin & xác nhận thông tin chính xác
                                </label>
                                <p id="warningMsg" style="display: none; color: red;">Vui lòng kiểm tra và xác nhận lại
                                    thông tin</p>
                            </div>
                            <a href="#" class="btn-submit" onclick="validateCheckbox()">
                                <i class='bx bxs-cloud-download'></i>
                                <span class="text">Gửi</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
