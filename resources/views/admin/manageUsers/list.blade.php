@extends('admin.layout')
@section('title')
    Quản lý Đoàn viên thanh niên
@endsection
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Danh sách Đoàn viên thanh niên

                </h1>

                <ul class="breadcrumb">
                    <li>
                        <a href="#" data-bs-toggle="tooltip">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="{{ route('manageUsers.index') }}">Quản lý Đoàn viên</a>
                    </li>

                </ul>
            </div>
        </div>
        <a href="{{ route('manageUsers.create') }}">
            <button type="button" class="btn btn-success">
                Thêm mới<span class="badge"><i class='bx bx-plus'></i></span>
            </button>
        </a>
        <div class="table-data">
            <div class="accordion accordion-flush order">
                @if ($data_list_users->isEmpty())
                    <span>Chưa có Đoàn viên nào</span>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Đoàn viên</th>
                                <th scope="col">Thông tin cá nhân</th>
                                <th scope="col">Vai trò / Chức vụ</th>
                                <th scope="col" class="text-center">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_list_users as $dl_users)
                                <tr>
                                    <th class="pt-4" scope="row">{{ $dl_users->id }}</th>
                                    <td>
                                        {{ $dl_users->ten }}
                                    </td>
                                    <td>
                                        <b> Email :</b>{{ $dl_users->email }} <br>
                                        <b> Số điện thoại :</b>{{ $dl_users->phone }} <br>
                                    </td>
                                    <td>
                                        @if ($dl_users->role == 0)
                                            Đoàn viên
                                        @else
                                            Quản trị viên
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-outline-success">

                                                <a href="{{ route('manageUsers.edit', $dl_users->id) }}"
                                                    style="border:none;" class="btn btn-outline-success"><i
                                                        class='bx bx-edit'></i></a>
                                            </button>
                                            <button class="btn btn-outline-danger" style="padding: 0 25px" type='button'
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $dl_users->id }}">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade " id="staticBackdrop{{ $dl_users->id }}" data-bs-backdrop="static"
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
                                                Xóa hàng này, tất cả dữ liệu đi kèm sẽ bị xóa ? {{$dl_users->id}}
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('manageUsers.destroy', $dl_users->id) }}"
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
                        @if ($data_list_users->hasPages())
                            <ul class="pagination">
                                <!-- Previous Page Link -->
                                @if ($data_list_users->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $data_list_users->previousPageUrl() }}">&laquo;</a></li>
                                @endif

                                <!-- Pagination Elements -->
                                @foreach ($data_list_users->onEachSide(1)->links()->elements as $element)
                                    <!-- "Three Dots" Separator -->
                                    @if (is_string($element))
                                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span>
                                        </li>
                                    @endif

                                    <!-- Array Of Links -->
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $data_list_users->currentPage())
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
                                @if ($data_list_users->hasMorePages())
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $data_list_users->nextPageUrl() }}">&raquo;</a></li>
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
    </script>
    @push('script-access')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
            // Get the flash message from the session
            var type = '{{ Session::get('alert.type') }}';
            var msg = '{{ Session::get('alert.message') }}';

            // Display the sweet alert message if it exists
            if (msg) {
                swal({
                    title: msg,
                    // text: msg,
                    icon: type,
                    button: "OK",
                });
            }
        </script>
    @endpush --}}
@endsection
