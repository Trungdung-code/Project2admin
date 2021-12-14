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
                    Sửa điểm
                </h1>
                <br><br><br>

                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif

                <form action="{{ route('editgrade.store') }}" method="post">
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
                                <select name='Skill'>
                                    <option value="Skill1">Skill 1</option>
                                    <option value="Skill2">Skill 2</option>
                                </select>
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
                                <select name='Final'>
                                    <option value="Final1">Final 1</option>
                                    <option value="Final2">Final 2</option>
                                </select>
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
                                <button class="btn btn-default">Update</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
