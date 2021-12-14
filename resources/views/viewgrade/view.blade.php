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



                <table>
                    <thead>

                        <tr>
                            <td>
                                <h3 hidden>{{ $student->idStudent }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Họ và tên</h3>
                            </td>
                            <td>
                                <h3>{{ $student->name }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Ngày sinh</h3>
                            </td>
                            <td>
                                <h3>{{ $student->dob }}</h3>
                            </td>
                        </tr>
                    </thead>
                </table>

                <a href="{{ url('/export-by-id-student', $student->idStudent) }}"><button class="btn btn-default">Tải xuống
                        điểm của sinh viên</button></a><br><br>

                <Table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Môn</th>
                            <th>Điểm Skill </th>
                            <th>Điểm Final </th>
                            <th>Điểm thi lại Skill</th>
                            <th>Điểm thi lại Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listGrade as $grade)
                            <tr>
                                <td>{{ $grade->nameSub }}</td>
                                <td>{{ $grade->Skill1 }}</td>
                                <td>{{ $grade->Final1 }}</td>
                                <td>{{ $grade->Skill2 }}</td>
                                <td>{{ $grade->Final2 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </Table>
            </div>
        </div>
    </div>
@endsection
