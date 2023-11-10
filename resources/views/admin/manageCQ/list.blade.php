@extends('admin.layout')
@section('title')
    Quản lý cơ quan
@endsection
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Danh sách cơ quan Đoàn trực thuộc</h1>

                <ul class="breadcrumb">
                    <li>
                        <a href="#" data-bs-toggle="tooltip">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="pe-auto active" href="{{ route('manageCQ.index') }}">Quản lý Cơ quan</a>
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
        <a href="{{ route('manageCQ.create') }}">
            <button type="button" class="btn btn-success">
                Thêm mới<span class="badge"><i class='bx bx-plus'></i></span>
            </button>
        </a>
        <div class="table-data">
            <div class="accordion accordion-flush order">
                @if ($data_list_cq->isEmpty())
                    <span>Chưa có cơ quan nào</span>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên cơ quan</th>
                                <th scope="col">Thông tin cơ quan</th>
                                <th scope="col">Trực thuộc</th>
                                <th scope="col" class="text-center">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_list_cq as $dlcq)
                                <tr>
                                    <th class="pt-4" scope="row">{{ $dlcq->id_CQ }}</th>
                                    <td>
                                            {{ $dlcq->ten }}
                                    </td>
                                    <td>
                                        <b> Địa chỉ :</b>  {{ $dlcq->diaChi }} <br>
                                        <b> Email :</b>{{ $dlcq->email }} <br>
                                        <b> Số điện thoại :</b>{{ $dlcq->phone }} <br>
                                    </td>
                                    <td>

                                        @foreach ($data_list_parent_cq as $dl_pcq)
                                            @if ($dlcq->parent_CQ == $dl_pcq->id_CQ)
                                                {{$dl_pcq->ten}}
                                            @else
                                                
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-outline-success">

                                                <a href="{{ route('manageCQ.edit', $dlcq->id_CQ) }}" style="border:none;"
                                                    class="btn btn-outline-success"><i class='bx bx-edit'></i></a>
                                            </button>
                                            <button class="btn btn-outline-danger" style="padding: 0 25px"
                                                type='button' data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $dlcq->id_CQ }}">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade " id="staticBackdrop{{ $dlcq->id_CQ }}" data-bs-backdrop="static"
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
                                                Xóa hàng này, tất cả dữ liệu đi kèm sẽ bị xóa ? {{ $dlcq->id_CQ }}
                                            </div>
                                            <div class="modal-footer">
                                                <form 
                                                    action="{{ route('manageCQ.destroy', $dlcq->id_CQ) }}" method="POST">
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
                    {{-- <div class="pagination-container">
                        <ul class="pagination">
                            <!-- Previous Page Link -->
                            @if ($data_list_cq->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $data_list_cq->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            <!-- Pagination Elements -->
                            @foreach ($data_list_cq->onEachSide(1)->links()->elements as $element)
                                <!-- "Three Dots" Separator -->
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                @endif

                                <!-- Array Of Links -->
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $data_list_cq->currentPage())
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
                            @if ($data_list_cq->hasMorePages())
                                <li class="page-item"><a class="page-link"
                                        href="{{ $data_list_cq->nextPageUrl() }}">&raquo;</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    </div> --}}
                @endif
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

@endsection
