@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Danh sách khóa học
                            @can('tao-khoahoc')
                                <a class="btn btn-success" href="{{ route('courses.create') }}"> Thêm mới</a>@endcan</h2>

                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Tên khóa học</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->name_course }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('courses.show',$value->id_course ) }}"><i class="fa fa-tripadvisor"></i></a>
                        @can('capnhat-khoahoc')
                        <a class="btn btn-primary" href="{{ route('courses.edit',$value->id_course ) }}"><i class="fa fa-pencil"></i></a>
                        @endcan
                        @can('xoa-khoahoc')
                        {!! Form::open(['method' => 'DELETE','route' => ['courses.destroy', $value->id_course ],'style'=>'display:inline']) !!}
                        <button type="submit" class=" btn btn-danger "><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
