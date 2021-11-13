@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Xem chi tiết môn học <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>lớp</th>
                    <th>sách</th>
                    <th>số lượng</th>
                </tr>
                @foreach ($listSubject as $item)
        <tbody>
        <tr>
            <td>{{$item->id_subjects }}</td>
            <td>{{$item->name_subjects }}</td>
            <td>{{$item->name_grade}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
