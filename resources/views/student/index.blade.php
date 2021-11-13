@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Danh sách sinh viên
                            @can('tao-sinhvien')
                            <a class="btn btn-success" href="{{ route('students.create') }}"> Thêm mới</a>
                                @endcan
                        </h2>
                    </div>
                </div>
            </div>
            <form action="">
                Chọn lớp
                <select name="id-grade">
                    <option value="">
                        tất cả
                    </option>
                    @foreach ($listGrade as $grade)
                        <option value="{{ $grade->id_grade }}" @if ($grade->id_grade == $idGrade) selected @endif>
                            {{ $grade->name_grade}}
                        </option>
                    @endforeach
                </select>
                <button>ok</button><br><br>
                Đăng kí:
                <select name="trangthai">
                    <option value="" selected> <!-- vd: chỗ này giữ nguyên -->
                        tất cả
                    </option>
                    <option value="1"  @if($trangthai==1) selected @endif>
                        đã đăng kí
                    </option>
                    <option value="2"  @if($trangthai==2) selected  @endif> <!-- vd: chỗ này đổi 0=>2 -->
                        chưa đăng kí
                    </option>
        </select>
        <button>ok</button><br><br>
        Nhận sách:
                <select name="su-ly">
                    <option value="" selected>
                        tất cả
                    </option>
                    <option value="1"  @if($suly==1) selected @endif>
                        đã nhận
                    </option>
                    <option value="2"  @if($suly==2) selected  @endif> <!-- vd: chỗ này đổi 0=>2 -->
                        chưa nhận
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
                    <th>Tên sinh viên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Thuộc lớp</th>
                    <th>đăng kí</th>
                    <th>nhận sách</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($listStudent as $item)
        <tbody>
        <tr>
            <td>{{$item->id_student}}</td>
            <td>{{$item->name_student}}</td>
            <td>{{$item->birthday}}</td>
            <td>{{$item->GenderName}}</td>
            <td>{{$item->name_grade}}</td>
            <td>{{$item->StatusName}}</td>
            <td>{{$item->SulyName}}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('students.show',$item->id_student) }}"><i class="fa fa-tripadvisor"></i></a>
                        @can('capnhat-sinhvien')
                        <a class="btn btn-primary" href="{{ route('students.edit',$item->id_student) }}"><i class="fa fa-pencil"></i></a>
                        @endcan
                        @can('xoa-sinhvien')
                        {!! Form::open(['method' => 'DELETE','route' => ['students.destroy', $item->id_student],'style'=>'display:inline']) !!}
                        <button type="submit" class=" btn btn-danger "><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            {{$listStudent->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
