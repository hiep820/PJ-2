@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo mới môn học <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('subjects.store') }}" method="post">
                @csrf
                Tên môn: <input type="text" name="name" required> <br><br>
                lớp học: <select name="grade">
                            @foreach ($listGrade as $item)
                                <option value="{{ $item->id_grade }}">
                                    {{ $item->name_grade}}
                                </option>
                            @endforeach
                        </select><br>
                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
