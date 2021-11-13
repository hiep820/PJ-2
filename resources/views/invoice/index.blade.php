@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Hóa đơn
                            @can('tao-sach')
                            <a class="btn btn-success" href="{{ route('invoice.create') }}">  Thêm mới</a>
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
                    <th>Mã hóa đơn</th>
                    <th>Lớp học</th>
                    <th>Tiêu đề sách</th>
                    <th>Số lượng</th>
                    <th>Ngày xuất</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($listInvoice as $item)
        <tbody>
                <tr>
                    <td>{{$item->id_invoice}}</td>
                    <td>{{$item->name_grade}}</td>
                    <td>{{$item->title_book}}</td>
                    <td>{{$item->quantitys}}</td>
                    <td>{{$item->exportDate}}</td>
                    <td>
                        @can('capnhat-sach')
                        <a class="btn btn-primary" href="{{ route('invoice.edit',$item->id_invoice) }}"><i class="fa fa-pencil"></i></a>
                        @endcan
                        @can('xoa-sach')
                            {!! Form::open(['method' => 'DELETE','route' => ['invoice.destroy', $item->id_invoice],'style'=>'display:inline']) !!}
                            <button type="submit" class=" btn btn-danger "><i class="fa fa-trash"></i></button>
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            {{$listInvoice->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
