@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Xem chi tiết Khóa học <a class="btn btn-primary" href="{{ route('courses.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tên tài khoản:</strong>
                        {{ $data->name_course }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
