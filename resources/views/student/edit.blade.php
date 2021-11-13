@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật sinh viên <a class="btn btn-primary" href="{{ route('students.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('students.update', $listStudent->id_student) }}" method="post">
                @method('PUT')
                @csrf
                Tên: <input type="text" name="name" value="{{ $listStudent->name_student }}"><br>
                Giới tính <input type="radio" name="gt" value = "0" @if ($listStudent->grade == 0)
                    checked
                @endif>Nam <input type="radio" name="gt" value = "1" @if ($listStudent->grade == 1)
                checked
            @endif>Nữ <br>
            Trạng thái <input type="radio" name="status" value = "1" @if ($listStudent->grade == 1)
            checked
        @endif>Chưa đăng kí<input type="radio" name="status" value = "2" @if ($listStudent->grade == 2)
        checked
        @endif>Đã đăng kí <br>

        nhận sách  <input type="radio" name="statuss" value = "1" @if ($listStudent->grade == 1)
            checked
        @endif>Chưa nhận<input type="radio" name="statuss" value = "2" @if ($listStudent->grade == 2)
        checked
        @endif>Đã nhận <br>
                Ngày sinh <input type="text" name="ns" value="{{ $listStudent->birthday}}">
                Lớp học <select name="grade">
                            @foreach ($listGrade as $item)
                                <option value="{{ $item->id_grade }}" @if ($item->id_grade = $listStudent->id_grade)
                                    chosed
                                @endif>
                                    {{ $item->name_grade}}
                                </option>
                            @endforeach
                        </select>
                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
