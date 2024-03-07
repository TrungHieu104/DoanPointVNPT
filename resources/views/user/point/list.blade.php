@extends('user.layout')
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Danh sách điểm Đoàn viên
                    {{ Auth::user()->ten }}
                </h1>

                <ul class="breadcrumb">
                    <li>
                        <a href="#" data-bs-toggle="tooltip">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('list.index') }}">Điểm Đoàn viên</a>
                    </li>

                </ul>
            </div>
        </div>
        @if (Session::exists('alert'))
            <div class="alert alert-{{ session('alert')['type'] }} alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('alert.message') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="{{ url('/list/create') }}">
            <button type="button" class="btn btn-success">
                Thêm mới<span class="badge"><i class='bx bx-plus'></i></span>
            </button>
        </a>
        <div class="card mt-4 text-center border-0">
            <div class="card-body">
                <h5 class="card-title">Lọc kết quả</h5>
                <form action="{{ route('list.sort') }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div class="d-flex align-items-center m-3">
                            <span class="mx-3">Tháng</span>
                            <select class="form-select" name="thang" id="">
                                <option selected value="">Lựa chọn tháng</option>
                                @foreach ($thang as $month)
                                    <option value="{{ $month->id_thang }}">{{ $month->thang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex align-items-center m-3">
                            <span class="mx-3">Quý</span>
                            <select class="form-select" name="quy" id="">
                                <option selected value="">Lựa chọn quý</option>
                                @foreach ($quy as $quarter)
                                    <option value="{{ $quarter->id_quy }}">{{ $quarter->quy }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex align-items-center m-3">
                            <span class="mx-3">Năm</span>
                            <select class="form-select" name="nam" id="">
                                <option selected value="">Lựa chọn năm</option>
                                @foreach ($nam as $year)
                                    <option value="{{ $year->id_nam }}">{{ $year->nam }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Lọc kết quả
                    </button>
                </form>
            </div>
        </div>
        <div class="table-data">
            <div class="accordion accordion-flush order">
                @if ($text)
                    <sub>
                        <i>{{ $text }}</i>
                    </sub> <br>
                    <sub>
                        <a href="{{ route('list.index') }}">Xóa bộ lọc</a>
                    </sub><br>
                @endif
                @if ($data_list_point->isEmpty())
                    <span>Chưa có đánh giá nào</span>
                @else
                    <table class="table">
                        <sub>
                            <i></i>
                        </sub>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Đợt</th>
                                <th scope="col">Thời gian đánh giá</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ghi chú / Yêu cầu</th>
                                <th scope="col" class="text-center">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_list_point as $dlp)
                                <tr>
                                    <th class="pt-4" scope="row">{{ $dlp->id_DDG }}</th>
                                    <td>
                                        <div class="tooltip">
                                            <span class="tooltiptext">
                                                @foreach ($danhGias as $dg)
                                                    @if ($dlp->id_DDG == $dg->id_DDG)
                                                        {{ $dg->ten_tieu_chi . ' : ' . $dg->diem }}<br>
                                                    @endif
                                                @endforeach
                                            </span>
                                            {{ $dlp->tenDot }}
                                            <br>
                                            <sub>
                                                <i>
                                                    @foreach ($nam as $year)
                                                        @if ($year->id_nam == $dlp->id_nam)
                                                            @if ($dlp->id_thang !== null && $dlp->id_nam !== null)
                                                                @foreach ($thang as $month)
                                                                    {{ $month->id_thang == $dlp->id_thang ? 'Tháng : ' . $month->thang : '' }}
                                                                @endforeach
                                                                {{ 'Năm : ' . $year->nam }}
                                                            @else
                                                                @if ($dlp->id_quy !== null && $dlp->id_nam !== null)
                                                                    @foreach ($quy as $quarter)
                                                                        {{ $quarter->id_quy == $dlp->id_quy ? 'Quý : ' . $quarter->quy : '' }}
                                                                    @endforeach
                                                                    {{ 'Năm : ' . $year->nam }}
                                                                @else
                                                                    {{ 'Năm : ' . $year->nam }}
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </i>
                                            </sub>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($dlp->updated_at == $dlp->date)
                                            {{ date('H:i - d/m/Y', strtotime($dlp->date)) }}<br>
                                        @else
                                            {{ date('H:i - d/m/Y', strtotime($dlp->date)) }}<br>
                                            <sub> <b>Lần cập nhật gần nhất: </b>
                                                {{ date('H:i - d/m/Y', strtotime($dlp->updated_at)) }}</sub>
                                        @endif
                                    </td>
                                    <td class="pt-4">
                                        @if ($dlp->trangThai == 0)
                                            <span class="alert alert-danger"><i class='bx bx-x'></i> Chưa hoàn thành</span>
                                        @else
                                            @if ($dlp->trangThai == 1)
                                                <span class="alert alert-warning"><i class='bx bx-send'></i> Đang chờ
                                                    duyệt</span>
                                            @else
                                                <span class="alert alert-success"><i class='bx bx-check'></i> Đã hoàn
                                                    thành</span>
                                            @endif
                                        @endif

                                    </td>
                                    <td>{{ $dlp->ghiChu }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <div class="btn-group">
                                            <button class="btn btn-outline-success">

                                                <a href="{{ route('list.edit', $dlp->id_DDG) }}" style="border:none;"
                                                    class="btn btn-outline-success"><i class='bx bx-edit'></i></a>
                                            </button>
                                            <button class="btn btn-outline-danger" style="padding: 0 25px" type='button'
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $dlp->id_DDG }}">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                            {{-- <form class="btn btn-outline-danger"
                                                action="{{ route('list.destroy', $dlp->id_DDG) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-outline-danger" style="border: none;cursor: pointer;"
                                                    type='submit'>
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade " id="staticBackdrop{{ $dlp->id_DDG }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Xác nhận thao tác</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Xóa hàng này, tất cả dữ liệu đi kèm sẽ bị xóa ? {{ $dlp->id_DDG }}
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('list.destroy', $dlp->id_DDG) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class='bx bx-trash'></i></button>
                                                </form>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    @if(!$has_dotDG)
                        <div class="pagination-container">
                            @if ($data_list_point->hasPages())
                                <ul class="pagination">
                                    <!-- Previous Page Link -->
                                    @if ($data_list_point->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $data_list_point->previousPageUrl() }}">&laquo;</a></li>
                                    @endif

                                    <!-- Pagination Elements -->
                                    @foreach ($data_list_point->onEachSide(1)->links()->elements as $element)
                                        <!-- "Three Dots" Separator -->
                                        @if (is_string($element))
                                            <li class="page-item disabled"><span class="page-link">{{ $element }}</span>
                                            </li>
                                        @endif

                                        <!-- Array Of Links -->
                                        @if (is_array($element))
                                            @foreach ($element as $page => $url)
                                                @if ($page == $data_list_point->currentPage())
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
                                    @if ($data_list_point->hasMorePages())
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $data_list_point->nextPageUrl() }}">&raquo;</a></li>
                                    @else
                                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </main>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script> --}}

@endsection
