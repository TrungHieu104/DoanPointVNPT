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
                        <a class="" href="#">Điểm Đoàn viên</a>
                    </li>

                </ul>
            </div>
        </div>
        @if (Session::exists('alert'))
            <div class="alert alert-{{ session('alert')['type'] }} alert-dismissible fade show" role="alert">
                <strong>{{ session('alert')['message'] }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="{{ url('/list/create') }}">
            <button type="button" class="btn btn-success">
                Thêm mới<span class="badge"><i class='bx bx-plus'></i></span>
            </button>
        </a>
        <div class="table-data">
            <div class="accordion accordion-flush order">
                @if ($data_list_point->isEmpty())
                    <span>Chưa có đánh giá nào</span>
                @else
                    <table class="table">
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
                                                @foreach ($tieuChis as $tc)
                                                    {{ $tc->ten . '   :   ' }}
                                                    @foreach ($danhGias as $dg)
                                                        @if ($dlp->id_DDG == $dg->id_DDG && $dg->id_TC == $tc->id_TC)
                                                            {{ $dg->diem }}<br>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </span>
                                            {{ $dlp->tenDot }}
                                            <br>
                                            <sub>
                                                <i>
                                                    @foreach ($data_LDG as $dldg)
                                                        @if ($dlp->id_LDG == $dldg->id_LDG)
                                                            @foreach ($nam as $year)
                                                                @if ($year->id_nam == $dldg->id_nam)
                                                                    @if ($dldg->id_thang !== null && $dldg->id_nam !== null)
                                                                        {{ 'Tháng : ' . $dldg->id_thang }}
                                                                        {{ 'Năm : ' . $year->nam }}
                                                                    @else
                                                                        @if ($dldg->id_quy !== null && $dldg->id_nam !== null)
                                                                            {{ 'Quý : ' . $dldg->id_quy }}
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
                                    </td>
                                    <td>
                                        @if ($dlp->updated_at == $dlp->created_at)
                                            {{ date('H:i - d/m/Y', strtotime($dlp->created_at)) }}<br>
                                        @else
                                            {{ date('H:i - d/m/Y', strtotime($dlp->created_at)) }}<br>
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
                    <div class="pagination-container">
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
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                @endif

                                <!-- Array Of Links -->
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $data_list_point->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $page }}</span>
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
                    </div>
                @endif
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

@endsection
