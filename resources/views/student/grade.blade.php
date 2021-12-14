@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Họ và tên</th>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                {{ $student->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>Giới tính</th>
                            <td>
                                @if ($student->gender == 0)
                                    Nam
                                @else
                                    Nu
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Ngày sinh</th>
                            <td>
                                {{ $student->dob }}
                            </td>
                        </tr>
                        <tr>
                            <th>Lớp</th>
                            <td>
                                @foreach ($class as $cnass)
                                    {{ $cnass->nameClass }}
                                @endforeach
                            </td>
                        </tr>
                </table>
                <table class="table table-striped">
                    <tr>
                        <th>
                            Bảng điểm
                        </th>
                        <th>
                            Skill 1
                        </th>
                        <th>
                            Skill 2
                        </th>
                        <th>
                            Final 1
                        </th>
                        <th>
                            Final 2
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($grade as $listGrade)
                            <tr>
                                <td>
                                    {{ $listGrade->nameSub }}
                                </td>
                                <td>
                                    {{ $listGrade->Skill1 }}
                                </td>
                                <td>

                                    {{ $listGrade->Final1 }}
                                </td>
                                <td>

                                    {{ $listGrade->Skill2 }}

                                </td>
                                <td>

                                    {{ $listGrade->Final2 }}
                                </td>                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
