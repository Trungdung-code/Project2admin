@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Môn học
                </h1>

                <a href="{{ route('subject.create') }}"><button class="btn btn-default">Thêm môn</button></a><br><br>

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
                            <th>Môn học</th>
                            <th>Chuyên ngành</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listSub as $sub)
                            <tr>
                                <td><?= $sub->idSub ?></td>
                                <td><?= $sub->nameSub ?></td>
                                <td><?= $sub->nameMajor ?></td>
                                <td><a href="{{ route('subject.edit', $sub->idSub) }}">Sửa</a></td>
                                {{-- <td>Ẩn</td> --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $listSub->appends(['search' => $search])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
