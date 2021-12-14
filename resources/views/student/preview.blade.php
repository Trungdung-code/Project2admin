@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Danh sách Sinh viên
                </h1><br>
                <form action="{{ url('/student-confirm') }}" method="post">
                    @csrf
                    <button class="btn btn-">Đồng ý thêm dữ liệu</button>
                </form><br>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Email </th>
                            <th>Mật khẩu </th>
                            <th>Giới tính </th>
                            <th>Ngày sinh </th>
                            <th>Lớp </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($student as $student)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student['ho_ten'] }}</td>
                                <td>
                                    {{ $student['email'] }}
                                </td>
                                <td>
                                    {{ $student['password'] }}
                                </td>
                                <td>
                                    {{ $student['gioi_tinh'] }}
                                </td>
                                <td>
                                    {{ $student['ngay_sinh'] }}
                                </td>
                                <td>
                                    {{ $student['lop'] }}
                                </td>
                            @empty
                            <tr>
                                <td>Không có dữ liệu</td>
                            </tr>

                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
