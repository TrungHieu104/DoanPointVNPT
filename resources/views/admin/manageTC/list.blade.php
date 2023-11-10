@extends('admin.layout')
@section('title')
    Quản lý Tiêu chí đánh gía
@endsection
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Danh sách Tiêu chí đánh giá

                </h1>

                <ul class="breadcrumb">
                    <li>
                        <a href="#" data-bs-toggle="tooltip">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="pe-auto active" href="{{ route('manageTieuChi.index') }}">Quản lý Tiêu chí</a>
                    </li>

                </ul>
            </div>
        </div>
        <a href="{{ route('manageTieuChi.create') }}">
            <button type="button" class="btn btn-success">
                Thêm mới<span class="badge"><i class='bx bx-plus'></i></span>
            </button>
        </a>
        <div class="table-data">
            <div class="accordion accordion-flush order">
                @if ($data_list_tc->isEmpty())
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
                            @foreach ($data_list_tc as $dl_tc)
                                <tr>
                                    <th class="pt-4" scope="row">{{ $dl_tc->id_TC }}</th>
                                    <td>
                                        {{ $dl_tc->ten }}
                                    </td>
                                    <td>
                                        {{ $dl_tc->diemQuyDinh }} <br>
                                    </td>
                                    <td //></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-outline-success">
                                                <a href="{{ route('manageTieuChi.edit', $dl_tc->id_TC) }}"
                                                    style="border:none;" class="btn btn-outline-success"><i
                                                        class='bx bx-edit'></i></a>
                                            </button>
                                            <button class="btn btn-outline-danger" style="padding: 0 25px" type='button'
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $dl_tc->id_TC }}">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade " id="staticBackdrop{{ $dl_tc->id_TC }}" data-bs-backdrop="static"
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
                                                Xóa hàng này, tất cả dữ liệu đi kèm sẽ bị xóa ? {{$dl_tc->id_TC}}
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('manageTieuChi.destroy', $dl_tc->id_TC) }}"
                                                    method="POST">
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
                        @if ($data_list_tc->hasPages())
                            <ul class="pagination">
                                <!-- Previous Page Link -->
                                @if ($data_list_tc->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $data_list_tc->previousPageUrl() }}">&laquo;</a></li>
                                @endif

                                <!-- Pagination Elements -->
                                @foreach ($data_list_tc->onEachSide(1)->links()->elements as $element)
                                    <!-- "Three Dots" Separator -->
                                    @if (is_string($element))
                                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span>
                                        </li>
                                    @endif

                                    <!-- Array Of Links -->
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $data_list_tc->currentPage())
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
                                @if ($data_list_tc->hasMorePages())
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $data_list_tc->nextPageUrl() }}">&raquo;</a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                @endif
                            </ul>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </main>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script> --}}
    
@endsection
