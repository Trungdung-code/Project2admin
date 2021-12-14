@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Chuyên ngành
                </h1>

                <a href="{{ route('major.create') }}"><button class="btn btn-default">Thêm chuyên ngành</button></a><br><br>

                <form class="navbar-form navbar-left navbar-search-form" role="search">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Search..." name="search">

                    </div>
                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Chuyên ngành</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listMajor as $major)
                            <tr>
                                <td>{{ $major->idMajor }}</td>
                                <td>{{ $major->nameMajor }}</td>
                                <td><a href="{{ route('major.edit', $major->idMajor) }}">Sửa</a></td>
                                {{-- <td>Ẩn</td> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $listMajor->appends(['search' => $search])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
