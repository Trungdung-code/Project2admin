@extends('layout.layout');

@section('main')
    <style>
        table,
        th,
        td {
            padding: 7px;
        }

    </style>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Thêm điểm thi lai
                </h1>
                <br><br><br>

                <a href="{{ route('grade2.insert-by-excel') }}"><button class="btn btn-default">Thêm điểm = excel</button></a>
                <a href="{{ url('/grade-sample') }}"><button class="btn btn-default">Tải xuống bản mẫu excel</button></a><br><br>

                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif

                <form action="{{ route('grade2.store') }}" method="post">
                    @csrf
                    <table>
                        <tr>
                            <td>Chọn lớp:</td>
                            <td>
                                <select id="id-class">
                                    <option>------</option>
                                    @foreach ($listClass as $class)
                                        <option value="{{ $class->idClass }}">{{ $class->nameClass }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Chọn sinh viên:</td>
                            <td>
                                <select id="id-student" name="idStudent">
                                    <option>------</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Chọn môn:</td>
                            <td>
                                <select id="idSub" name="idSubject">
                                    <option>------</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Điểm thi:</td>
                            <td>
                                Skill 2
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="number" name="skillGrade">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                Final 2
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="number" name="finalGrade">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-default">Thêm</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
