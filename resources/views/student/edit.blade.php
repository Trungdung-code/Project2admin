@extends('layout.layout');

@section('main')
    <style>
        table,
        th,
        td {
            padding: 5px;
        }

    </style>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Sửa thông tin sinh viên
                </h1>
                <form action="{{ route('student.update', ['student' => $student->idStudent]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <table>
                        <tr>
                            <td>
                                Họ và tên
                            </td>
                            <td>
                                <input type="text" value="{{ $student->name }}" name="name" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                <input type="email" value="{{ $student->email }}" name="email" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Mật khẩu
                            </td>
                            <td>
                                <input type="text" value="{{ $student->password }}" name="password" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Giới tính
                            </td>
                            <td>
                                <label><input type="radio" name="gender" value="0" @if ($student->gender == 0) <?php echo 'checked'; ?> @endif>
                                    Nam </label>
                                <label><input type="radio" name="gender" value="1" @if ($student->gender == 1) <?php echo 'checked'; ?> @endif>
                                    Nữ </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Ngày sinh
                            </td>
                            <td>
                                <input type="date" value="{{ $student->dob }}" name="date">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Lớp
                            </td>
                            <td>
                                <select name="idClass">
                                    @foreach ($listClass as $class)
                                        <option value="{{ $class->idClass }}" @if ($class->idClass == $student->idClass) <?php echo 'selected'; ?> @endif>
                                            {{ $class->nameClass }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>


                    <br>
                    <button class="btn btn-default">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
