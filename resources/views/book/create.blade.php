@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo mới sách <a class="btn btn-primary" href="{{ route('books.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('books.store') }}" method="post">
                @csrf
                Tiêu đề: <input type="text" name="title" required> <br><br>
                Số lượng: <input type="text" name="so_luong" required> <br><br>

                <select name="mon">
                    @foreach ($listSubject as $item)
                        <option value="{{ $item->id_subjects }}">
                            {{ $item->name_subjects }}
                        </option>
                    @endforeach
                </select>

                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
