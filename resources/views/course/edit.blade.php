@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật khóa học <a class="btn btn-primary" href="{{ route('courses.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {!! Form::model($data, ['method' => 'PATCH','route' => ['courses.update', $data->id_course ]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tên khóa học:</strong>
                        {!! Form::text('name_course', null, array('placeholder' => 'Name','class' => 'form-control', 'required'=>'required')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
