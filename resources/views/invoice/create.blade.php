@extends('layout.app')

@section('title', 'Thêm sách')

@section('content')
    <h1>Thêm hóa đơn</h1>
    <form action="{{ route('invoice.store') }}" method="post">
        @csrf
        lớp học: <select name="grade">
                    @foreach ($listGrade as $item)
                        <option value="{{ $item->id_grade }}">
                            {{ $item->name_grade}}
                        </option>
                    @endforeach
                </select><br> <br><br>
        Tiêu đề sách: <select name="book">
                    @foreach ($listBook as $item)
                        <option value="{{ $item->id_book}}">
                            {{ $item->title_book}}
                        </option>
                    @endforeach
                </select><br> <br><br>
        Ngày xuất:<input type="date" name="export" required> <br><br>
        Số lượng: <input type="text" name="quantitys" required> <br><br>
        <button>Ok</button>
    </form>
@endsection
