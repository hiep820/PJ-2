@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">

                        <h2>Danh sách môn học
                            @can('tao-monhoc')<a class="btn btn-success" href="{{ route('subjects.create') }}"> Thêm mới</a>
                            @endcan
                        </h2>
                    </div>
                </div>
            </div>
            <form action="">
                Tìm kiếm
                <input type="text" value="{{$search}}" name="search">
                <button>ok</button>
            </form>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Tên môn học</th>
                    <th>Thuộc lớp</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($listSubject as $item)
        <tbody>
        <tr>
            <td>{{$item->id_subjects }}</td>
            <td>{{$item->name_subjects }}</td>
            <td>{{$item->name_grade}}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('subjects.show',$item->id_subjects) }}"><i class="fa fa-tripadvisor"></i></a>
                        @can('capnhat-monhoc')
                        <a class="btn btn-primary" href="{{ route('subjects.edit',$item->id_subjects) }}"><i class="fa fa-pencil"></i></a>
                        @endcan
                        @can('xoa-monhoc')
                        {!! Form::open(['method' => 'DELETE','route' => ['subjects.destroy', $item->id_subjects],'style'=>'display:inline']) !!}
                        <button type="submit" class=" btn btn-danger "><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            {{$listSubject->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
