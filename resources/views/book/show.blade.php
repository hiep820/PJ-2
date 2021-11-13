@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Xem chi tiết Lớp <a class="btn btn-primary" href="{{ route('grades.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>


            <table class="table table-bordered">
                <tr>
                    <th>lớp</th>
                    <th>sách</th>
                    <th>số lượng sách đã lấy</th>
                </tr>

            @foreach ($book as $item)
            <tbody>
        <tr>
            <td>{{$grade->name_grade}}</td>
            <td>{{$item->title_book}}</td>
            <td>

                {{ $sum}}

            </td>
        </tr>
            @endforeach
            </table>
        </div>
    </div>
@endsection
