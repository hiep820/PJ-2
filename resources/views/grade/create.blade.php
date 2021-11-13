@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo mới lớp <a class="btn btn-primary" href="{{ route('grades.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('grades.store') }}" method="post">
                @csrf
                Tên Lớp : <input type="text" name="name" required> <br><br>
               Khóa học: <select name="course">
                            @foreach ($listCourse as $item)
                                <option value="{{ $item->id_course }}">
                                    {{ $item->name_course}}
                                </option>
                            @endforeach
                        </select><br>
                Trạng thái <input type="radio" name="status" value = "2">Chưa phát<input type="radio" name="status" value="1">Đã phát <br>
                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
