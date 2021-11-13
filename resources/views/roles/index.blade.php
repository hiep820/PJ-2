@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Danh sách nhóm quyền
                            @can('role-create')
                                <a class="btn btn-success" href="{{ route('roles.create') }}"> Thêm mới</a>
                            @endcan
                        </h2>

                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>No</th>
                    <th>Tên nhóm quyền</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-tripadvisor"></i></a>
                            @can('role-edit')
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                <button type="submit" class=" btn btn-danger "><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $roles->render() !!}
        </div>
    </div>
@endsection
