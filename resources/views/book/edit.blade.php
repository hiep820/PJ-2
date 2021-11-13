@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật sách <a class="btn btn-primary" href="{{ route('books.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>


            <form action="{{ route('books.update', $listBook->id_book) }}" method="post">
                @method('PUT')
                @csrf
                Tên: <input type="text" name="title_book" value="{{ $listBook->title_book }}">
                Số lượng: <input type="text" name="so_luong" value="{{ $listBook->quantity }}"><br><br>


                <select name="mon">
                    @foreach ($listSubject as $item)
                        <option value="{{ $item->id_subjects }}" @if ($item->id_subjects = $listBook->id_subjects)
                            chosed
                        @endif>
                            {{ $item->name_subjects }}
                        </option>
                    @endforeach
                </select>
                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
