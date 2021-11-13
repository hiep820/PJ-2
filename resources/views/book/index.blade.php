@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Danh sách sách
                            @can('tao-sach')
                            <a class="btn btn-success" href="{{ route('books.create') }}">  Thêm mới</a>
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
                    <th>Tên sách</th>
                    <th>Thuộc môn học</th>
                    <th>Số lượng tổng</th>
                    <th>Số sách đã phát</th>
                    <th>Số sách còn lại</th>

                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($listBook as $item)
                <tbody>
                <tr>
                    <td>{{$item->id_book }}</td>
                    <td>{{$item->title_book }}</td>
                    <td>{{$item->name_subjects}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>
                        @php
                            $sum =\App\Models\invoice::where('id_book','=',$item->id_book)
                            ->sum('invoice.quantitys');
                        @endphp
                        {{ $sum}}
                    </td>

                    <td>{{ $item->quantity - $sum}}</td>


                    <td>
                        <a class="btn btn-info" href="{{ route('books.show',$item->id_book) }}"><i class="fa fa-tripadvisor"></i></a>
                        @can('capnhat-sach')
                        <a class="btn btn-primary" href="{{ route('books.edit',$item->id_book) }}"><i class="fa fa-pencil"></i></a>
                        @endcan
                        @can('xoa-sach')
                            {!! Form::open(['method' => 'DELETE','route' => ['books.destroy', $item->id_book],'style'=>'display:inline']) !!}
                            <button type="submit" class=" btn btn-danger "><i class="fa fa-trash"></i></button>
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            {{$listBook->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
