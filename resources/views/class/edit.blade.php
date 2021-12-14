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
                    Sửa lớp
                </h1>
                <form action="{{ route('class.update', ['class' => $class->idClass]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <table>
                        <tr>
                            <td>Tên lớp</td>
                            <td><input type="text" name="nameClass" value="{{ $class->nameClass }}" /></td>
                        </tr>
                        <tr>
                            <td>Chuyên ngành</td>
                            <td><select name="idMajor">
                                    @foreach ($listMajor as $major)
                                        <option value="{{ $major->idMajor }}" @if ($major->idMajor == $class->idMajor) <?php echo 'selected'; ?> @endif>
                                            {{ $major->nameMajor }}
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
