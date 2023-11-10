@extends('admin.layout')
@section('title')
    Quản lý Đánh gía
@endsection
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Danh sách Đánh giá </h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#" data-bs-toggle="tooltip">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="pe-auto active" href="{{ route('manageDanhGia.index') }}">Quản lý Đánh giá</a>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="nav nav-tabs bg-light-subtle shadow-sm" style="place-content: center;" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button"
                    role="tab" aria-controls="home-tab-pane" aria-selected="true">Tất cả đánh
                    giá</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Đánh giá theo Đoàn
                    viên</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Đánh giá
                    mới</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="table-data mt-0">
                    <div class="order border border-top-0 rounded-0">
                        {{-- @if ($dotDanhGia->isEmpty())
                            <span>Chưa có tiêu chí đánh giá nào</span>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên Tiêu chí</th>
                                        <th scope="col">Điểm Quy Định</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col" class="text-center">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dotDanhGia as $dl_tc)
                                        <tr>
                                            <th class="pt-4" scope="row">{{ $dl_tc->id_TC }}</th>
                                            <td>
                                                {{ $dl_tc->ten }}
                                            </td>
                                            <td>
                                                {{ $dl_tc->diemQuyDinh }} <br>
                                            </td>
                                            <td / />
                                            </td>
                                            <td class="text-center">

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-container">
                                @if ($dotDanhGia->hasPages())
                                    <ul class="pagination">
                                        <!-- Previous Page Link -->
                                        @if ($dotDanhGia->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $dotDanhGia->previousPageUrl() }}">&laquo;</a></li>
                                        @endif

                                        <!-- Pagination Elements -->
                                        @foreach ($dotDanhGia->onEachSide(1)->links()->elements as $element)
                                            <!-- "Three Dots" Separator -->
                                            @if (is_string($element))
                                                <li class="page-item disabled"><span
                                                        class="page-link">{{ $element }}</span>
                                                </li>
                                            @endif

                                            <!-- Array Of Links -->
                                            @if (is_array($element))
                                                @foreach ($element as $page => $url)
                                                    @if ($page == $dotDanhGia->currentPage())
                                                        <li class="page-item active"><span
                                                                class="page-link">{{ $page }}</span>
                                                        </li>
                                                    @else
                                                        <li class="page-item"><a class="page-link"
                                                                href="{{ $url }}">{{ $page }}</a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        <!-- Next Page Link -->
                                        @if ($dotDanhGia->hasMorePages())
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $dotDanhGia->nextPageUrl() }}">&raquo;</a></li>
                                        @else
                                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                        @endif
                                    </ul>
                                @endif
                            </div>
                        @endif --}}
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                tabindex="0">
                <div class="table-data mt-0">
                    <div class="order border border-top-0 rounded-0">
                        @if ($data_user->isEmpty())
                            <span>Chưa có Đoàn viên nào</span>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên Đoàn viên</th>
                                        <th scope="col">Vai trò / Chức vụ</th>
                                        <th scope="col" class="text-center">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_user as $d_user)
                                        <tr>
                                            <th class="pt-4" scope="row">{{ $d_user->id }}</th>
                                            <td>
                                                {{ $d_user->ten }}
                                            </td>
                                            <td>
                                                @if ($d_user->role == 0)
                                                    Đoàn viên
                                                @else
                                                    Quản trị viên
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-outline-success" style="font-size: x-large;"
                                                        type='button' data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop{{ $d_user->id }}">
                                                        <i class='bx bx-show-alt'></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-container">
                                @if ($data_user->hasPages())
                                    <ul class="pagination">
                                        <!-- Previous Page Link -->
                                        @if ($data_user->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $data_user->previousPageUrl() }}">&laquo;</a></li>
                                        @endif

                                        <!-- Pagination Elements -->
                                        @foreach ($data_user->onEachSide(1)->links()->elements as $element)
                                            <!-- "Three Dots" Separator -->
                                            @if (is_string($element))
                                                <li class="page-item disabled"><span
                                                        class="page-link">{{ $element }}</span>
                                                </li>
                                            @endif

                                            <!-- Array Of Links -->
                                            @if (is_array($element))
                                                @foreach ($element as $page => $url)
                                                    @if ($page == $data_user->currentPage())
                                                        <li class="page-item active"><span
                                                                class="page-link">{{ $page }}</span>
                                                        </li>
                                                    @else
                                                        <li class="page-item"><a class="page-link"
                                                                href="{{ $url }}">{{ $page }}</a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        <!-- Next Page Link -->
                                        @if ($data_user->hasMorePages())
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $data_user->nextPageUrl() }}">&raquo;</a></li>
                                        @else
                                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                        @endif
                                    </ul>
                                @endif
                            </div>
                            @php
                                $thead = true;
                            @endphp
                            @foreach ($data_user as $d_user)
                                {{-- <div> --}}
                                <div class="modal fade " id="staticBackdrop{{ $d_user->id }}" data-bs-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Đoàn Viên:
                                                    {{ $d_user->ten }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @php
                                                    $hasData = false;
                                                @endphp
                                                @foreach ($dotDanhGia as $ddg)
                                                    @if ($d_user->id === $ddg->id_ND)
                                                        <table class="table mb-0" style="--bs-table-bg:none !important;">
                                                            @if ($thead)
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Tên Đợt</th>
                                                                        <th scope="col">Thời gian đánh giá</th>
                                                                        <th scope="col">Trạng thái</th>
                                                                        <th scope="col">Ghi chú / Yêu cầu</th>
                                                                        <th scope="col" class="text-center">Chức năng
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                @php
                                                                    $thead = false;
                                                                @endphp
                                                            @endif
                                                            <tbody>
                                                                <tr>
                                                                    <td width="20%">
                                                                        <div class="tooltip">
                                                                            <span class="tooltiptext">
                                                                                @foreach ($DanhGia as $dg)
                                                                                    @if ($ddg->id_DDG == $dg->id_DDG)
                                                                                        {{ $dg->ten_tieu_chi . ' : ' . $dg->diem }}<br>
                                                                                    @endif
                                                                                @endforeach
                                                                            </span>
                                                                            {{ $ddg->tenDot }}
                                                                            <br>
                                                                            <sub>
                                                                                <i>
                                                                                    @foreach ($LoaiDanhGia as $ldg)
                                                                                        @if ($ddg->id_LDG == $ldg->id_LDG)
                                                                                            @foreach ($nam as $year)
                                                                                                @if ($year->id_nam == $ldg->id_nam)
                                                                                                    @if ($ldg->id_thang !== null && $ldg->id_nam !== null)
                                                                                                        {{ 'Tháng : ' . $ldg->id_thang }}
                                                                                                        {{ 'Năm : ' . $year->nam }}
                                                                                                    @else
                                                                                                        @if ($ldg->id_quy !== null && $ldg->id_nam !== null)
                                                                                                            {{ 'Quý : ' . $ldg->id_quy }}
                                                                                                            {{ 'Năm : ' . $year->nam }}
                                                                                                        @else
                                                                                                            {{ 'Năm : ' . $year->nam }}
                                                                                                        @endif
                                                                                                    @endif
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endif
                                                                                    @endforeach
                                                                                </i>
                                                                            </sub>
                                                                        </div>
                                                                        <br>

                                                                    </td>
                                                                    <td width="20%" class="">
                                                                        <div>
                                                                            @if ($ddg->updated_at == $ddg->date)
                                                                                <sub>
                                                                                    {{ date('H:i - d/m/Y', strtotime($ddg->created_at)) }}
                                                                                </sub>
                                                                            @else
                                                                                <sub>
                                                                                    {{ date('H:i - d/m/Y', strtotime($ddg->created_at)) }}
                                                                                </sub>
                                                                                <br><sub> <b>Lần cập nhật gần nhất: </b><br>
                                                                                    {{ date('H:i - d/m/Y', strtotime($ddg->date)) }}</sub>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td class="pt-4" width="17%">
                                                                        <div class="my-2">
                                                                            <span id="trangThai{{ $ddg->id_DDG }}" class="alert alert-{{ $ddg->trangThai == 0 ? 'danger' : ($ddg->trangThai == 1 ? 'warning' : 'success') }}">
                                                                                <i class="bx {{ $ddg->trangThai == 0 ? 'bx-x' : ($ddg->trangThai == 1 ? 'bx-send' : 'bx-check') }}"></i>
                                                                                {{ $ddg->trangThai == 0 ? 'Chưa hoàn thành' : ($ddg->trangThai == 1 ? 'Đang chờ duyệt' : 'Đã hoàn thành') }}
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="mx-5" width="30%">
                                                                        <div class="form-floating">
                                                                            <textarea id="ghiChu{{ $ddg->id_DDG }}" class="form-control" placeholder="Leave a comment here" style="height: 100px">{{ $ddg->ghiChu }}</textarea>
                                                                            <label for="ghiChu{{ $ddg->id_DDG }}">Ghi chú</label>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button {{ $ddg->trangThai == 2 ? 'disabled' : ($ddg->trangThai == 1 ? '' : 'disabled')}} 
                                                                            id="confirmDanhGia{{ $ddg->id_DDG }}"
                                                                            data-id="{{ $ddg->id_DDG }}"
                                                                            title="Xác nhận"
                                                                            class="btn btn-success confirmDanhGia">
                                                                            <i class='bx bx-check'></i>
                                                                        </button>
                                                                        <button {{ $ddg->trangThai == 0 ? 'disabled' : ''}} 
                                                                            id="returnDanhGia{{ $ddg->id_DDG }}"
                                                                            data-id="{{ $ddg->id_DDG }}"
                                                                            title="Yêu cầu xác nhận lại"
                                                                            class="btn btn-danger returnDanhGia">
                                                                            <i class='bx bxs-error'></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        @php
                                                            $hasData = true;
                                                        @endphp
                                                    {{-- @else --}}
                                                    @endif
                                                @endforeach
                                                @if (!$hasData)
                                                    <span>Không có dữ liệu để hiển thị !</span>
                                                @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endif
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
            tabindex="0">
            <div class="table-data mt-0">
                <div class="order border border-top-0 rounded-0">
                   
                </div>
            </div>

        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.confirmDanhGia').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "/dashboard/change_status/" + id,
                data: false,
                success: function(response) {
                    var trangThaiElement = $('#trangThai' + id);
                    var confirmDanhGiaElement = $('#confirmDanhGia' + id);
                    trangThaiElement.removeClass('alert-danger alert-warning alert-success');
                    trangThaiElement.addClass('alert-' + (2 == 0 ? 'danger' : (2 == 1 ? 'warning' : 'success')));
                    trangThaiElement.html('<i class="bx ' + (2 == 0 ? 'bx-x' : (2 == 1 ? 'bx-send' : 'bx-check')) + '"></i> ' + (2 == 0 ? 'Chưa hoàn thành' : (2 == 1 ? 'Đang chờ duyệt' : 'Đã hoàn thành')));
                    confirmDanhGiaElement.prop('disabled', true);
                    console.log(response.message);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseJSON.message);
                }
            });
        });

        $('.returnDanhGia').on('click', function() {
            var id = $(this).data('id');
            var ghiChu = $('#ghiChu' + id).val();
            var trangThai = 0;

            $.ajax({
                type: "POST",
                url: "/dashboard/returnDanhGia/" +id,
                data: {
                    id: id,
                    trangThai: trangThai,
                    ghiChu: ghiChu
                },
                success: function(response) {
                    var trangThaiElement = $('#trangThai' + id);
                    var returnDanhGiaElement = $('#returnDanhGia' + id);
                    trangThaiElement.removeClass('alert-danger alert-warning alert-success');
                    trangThaiElement.addClass('alert-' + (trangThai == 0 ? 'danger' : (trangThai == 1 ? 'warning' : 'success')));
                    trangThaiElement.html('<i class="bx ' + (trangThai == 0 ? 'bx-x' : (trangThai == 1 ? 'bx-send' : 'bx-check')) + '"></i> ' + (trangThai == 0 ? 'Chưa hoàn thành' : (trangThai == 1 ? 'Đang chờ duyệt' : 'Đã hoàn thành')));
                    returnDanhGiaElement.prop('disabled', true);
                    console.log(response.message);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseJSON.message);
                }
            });
        });
    });
</script>

@endsection
