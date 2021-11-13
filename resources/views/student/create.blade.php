@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo mới sinh viên <a class="btn btn-primary" href="{{ route('students.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('students.store') }}" method="post">
                @csrf
                Tên : <input type="text" name="name" required> <br><br>
                Ngày sinh <input type="date" name="ns" ><br>
                Giới tính <input type="radio" name="gt" value="0" >Nam <input type="radio" name="gt" value="1">Nữ <br>
                lớp học: <select name="grade">
                            @foreach ($listGrade as $item)
                                <option value="{{ $item->id_grade }}">
                                    {{ $item->name_grade}}
                                </option>
                            @endforeach
                        </select><br>
                Trạng thái <input type="radio" name="status" value = "2">Chưa đăng kí<input type="radio" name="status" value="1">Đã đăng kí <br>
                Trạng thái <input type="radio" name="statuss" value = "2">chưa  phát<input type="radio" name="statuss" value="1">đã phát <br>
                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
