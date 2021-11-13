@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Danh sách tài khoản
                            @can('tao-taikhoan')<a class="btn btn-success" href="{{ route('users.create') }}"> Thêm mới</a>
                        @endcan</h2>
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
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Thuộc nhóm quyền</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><i class="fa fa-tripadvisor"></i></a>
                        @can('capnhat-taikhoan')
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-pencil"></i></a>
                        @endcan
                        @can('xoa-taikhoan')
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        <button type="submit" class=" btn btn-danger "><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $data->render() !!}
        </div>
    </div>
@endsection
