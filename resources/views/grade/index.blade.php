@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Danh sách Lớp
                            @can('tao-lophoc')
                            <a class="btn btn-success" href="{{ route('grades.create') }}"> Thêm mới</a>
                                @endcan
                        </h2>
                    </div>
                </div>
            </div>
            <form action="">
                Chọn khóa
                <select name="id-course">
                    <option value="">
                        tất cả
                    </option>
                    @foreach ($listCourse as $course)
                        <option value="{{ $course->id_course }}" @if ($course->id_course == $idCourse) selected @endif>
                            {{ $course->name_course}}
                        </option>
                    @endforeach
                </select>
                <button>ok</button><br><br>
                Trạng thái
                <select name="trangthai">
                            <option value=""selected>
                                tất cả
                            </option>
                            <option value="1" @if($trangthai==1) selected @endif>
                                đã phát
                            </option>
                            <option value="2"  @if($trangthai==2) selected @endif  >
                                chưa phát
                            </option>
                </select>
                <button>ok</button><br><br>
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
                    <th>Tên Lớp</th>
                    <th>Thuộc khóa học</th>
                    <th>phát sách</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($listGrade as $item)
        <tbody>
        <tr>
            <td>{{$item->id_grade}}</td>
            <td>{{$item->name_grade}}</td>
            <td>{{$item->name_course}}</td>
            <td>{{$item->StatusName}}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('grades.show',$item->id_grade) }}"><i class="fa fa-tripadvisor"></i></a>
                        @can('capnhat-lophoc')
                        <a class="btn btn-primary" href="{{ route('grades.edit',$item->id_grade) }}"><i class="fa fa-pencil"></i></a>
                        @endcan
                        @can('xoa-lophoc')
                        {!! Form::open(['method' => 'DELETE','route' => ['grades.destroy', $item->id_grade],'style'=>'display:inline']) !!}
                        <button type="submit" class=" btn btn-danger "><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            </tbody>
                @endforeach
            </table>
            {{$listGrade->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
