@extends('admin.layout')
@section('title')
    Dashboard
@endsection
@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Tổng quan</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Bảng điều khiển</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Tổng quan</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3>34/64</h3>
                    <p>Tỉnh/ thành phố đã đăng ký</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3>3000/5000</h3>
                    <p>Đoàn viên đã chấm</p>
                </span>
            </li>
        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Tỉnh / Thành Đoàn đã đăng ký gần đây</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Tỉnh / Thành Đoàn</th>
                            <th>Tiến độ</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>
                                <img src="images/people.png">
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status completed">Đã hoàn thành</span></td>
                        </tr> -->
                        <tr>
                            <td>

                                <p>Thành Đoàn Vũng Tàu</p>
                            </td>
                            <td>58/60</td>
                            <td>01-10-2021</td>
                            <td><span class="status completed">Đã hoàn thành</span></td>
                        </tr>
                        <tr>
                            <td>

                                <p>Tỉnh Đoàn Bà Rịa - Vũng Tàu</p>
                            </td>
                            <td>58/60</td>
                            <td>01-10-2021</td>
                            <td><span class="status pending">Chưa hoàn thành</span></td>
                        </tr>
                        <tr>
                            <td>

                                <p>Thành Đoàn thành phố Thủ đức</p>
                            </td>
                            <td>58/60</td>
                            <td>01-10-2021</td>
                            <td><span class="status process">Đang chờ duyệt</span></td>
                        </tr>
                        <tr>
                            <td>

                                <p>Quận Đoàn quận 4</p>
                            </td>
                            <td>58/60</td>
                            <td>01-10-2021</td>
                            <td><span class="status pending">Chưa hoàn thành</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Ghi chú</h3>
                    <div class="todo_box">
                        <input type="text" name="" id="inputBox" placeholder="Ghi chú gì đó ...">
                        <button onclick="addTask()">
                            <i class='bx bx-plus'></i>
                            
                        </button>
                    </div>
                    <i class='bx bx-trash' onclick="delAllTask()"></i>
                </div>
                <span class="error-text"></span>
                <ul id="list-container">
                    <!-- <li class="checked">task 1</li>
                    <li>task 1</li>
                    <li>task 1</li> -->
                </ul>
            </div>
        </div>
    </main>
@endsection
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
@endpush