@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật môn học <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>


            <form action="{{ route('subjects.update', $listSubject->id_subjects) }}" method="post">
                @method('PUT')
                @csrf
                Tên: <input type="text" name="names" value="{{ $listSubject->name_subjects }}">
                Lớp học <select name="grade">
                            @foreach ($listGrade as $item)
                                <option value="{{ $item->id_grade }}" @if ($item->id_grade = $listSubject->id_grade)
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
