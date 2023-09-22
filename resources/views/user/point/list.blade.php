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
        @if (Session::exists('alert'))
            <div class="alert alert-{{ session('alert')['type'] }} alert-dismissible fade show" role="alert">
                <strong>{{ session('alert')['message'] }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-data">
            <div class="accordion accordion-flush order" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                            <a href="{{ url('/list/create') }}">
                                <i class='bx bx-plus'></i>
                                Thêm mới
                            </a>
                        </button>
                    </h2>
                    {{-- <div id="flush-collapseOne" class="accordion-collapse collapse show"
                        data-bs-parent="#accordionFlushExample"> --}}
                    @if ($data_list_point->isEmpty())
                        <span>Chưa có đánh giá nào</span>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên Đợt</th>
                                    <th scope="col">Ngày đánh giá</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Ghi chú / Yêu cầu</th>
                                    <th scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_list_point as $dlp)
                                    <tr>
                                        <th scope="row">{{ $dlp->id_DDG }}</th>
                                        <td>{{ $dlp->tenDot }}</td>
                                        <td>{{ date('H:i:s - d/m/Y', strtotime($dlp->date)) }}</td>
                                        <td>
                                            @if ($dlp->trangThai == 0)
                                                <span class="alert alert-danger"><i class='bx bx-x'></i> Chưa hoàn thành</span>
                                            @else
                                                @if ($dlp->trangThai == 1)
                                                    <span class="alert alert-warning"><i class='bx bx-send'></i> Đang chờ duyệt</span>
                                                @else
                                                    <span class="alert alert-success"><i class='bx bx-check'></i> Đã hoàn thành</span>
                                                @endif
                                            @endif

                                        </td>
                                        <td>{{ $dlp->ghiChu }}</td>
                                        {{-- <td class="d_flex">
                                            <a href="{{route('list.edit',$dlp->id_DDG)}}"><span class="alert alert-success"><i
                                                class='bx bx-edit'></i></span> </a>
                                            <form action="{{ route('list.destroy', $dlp->id_DDG) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="status danger" style="border: none;cursor: pointer;" type='submit'
                                                    onclick="return confirm('Xóa hả')">
                                                    Delete
                                                </button>
                                            </form>
            
                                        </td> --}}
                                        {{-- <td>
                                            <a href=""><span class="alert alert-success"><i
                                                        class='bx bx-edit'></i></span> </a>
                                            <a href=""><span class="alert alert-danger"><i
                                                        class='bx bx-trash'></i></span> </a>
                                        </td> --}}
                                        <td class="d-flex justify-content-center align-items-center">
                                            <div class="btn-group">
                                                <button class="btn btn-outline-success">

                                                    <a href="{{ route('list.edit', $dlp->id_DDG) }}" style="border:none;"
                                                        class="btn btn-outline-success"><i class='bx bx-edit'></i></a>
                                                </button>
                                                <form class="btn btn-outline-danger"
                                                    action="{{ route('list.destroy', $dlp->id_DDG) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-outline-danger"
                                                        style="border: none;cursor: pointer;" type='submit'
                                                        onclick="return confirm('Xóa hả')">
                                                        <i class='bx bx-trash'></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    {{-- </div> --}}
                </div>

            </div>
        </div>
    </main>
@endsection
