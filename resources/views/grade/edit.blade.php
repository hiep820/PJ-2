@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật lớp <a class="btn btn-primary" href="{{ route('grades.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('grades.update', $listGrade->id_grade) }}" method="post">
                @method('PUT')
                @csrf
                Tên: <input type="text" name="name" value="{{ $listGrade->name_grade }}"><br>
            Trạng thái <input type="radio" name="status" value = "2" @if ($listGrade->course == 2)
            checked
        @endif>Chưa phát
        <input type="radio" name="status" value = "1" @if ($listGrade->course == 1)
        checked
        @endif>Đã phát <br>
                Khóa học <select name="course">
                            @foreach ($listCourse as $item)
                                <option value="{{ $item->id_course }}" @if ($item->id_course = $listGrade->id_course)
                                    chosed
                                @endif>
                                    {{ $item->name_course}}
                                </option>
                            @endforeach
                        </select>
                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
