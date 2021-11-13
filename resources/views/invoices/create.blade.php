@extends('layout.app')

@section('title', 'Thêm sách')

@section('content')
    <h1>Thêm môn</h1>
    <form action="{{ route('invoices.store') }}" method="post">
        @csrf
        Tên :<select name="student">
            @foreach ($listStudent as $item)
                <option value="{{ $item->id_student }}">
                    {{ $item->name_student}}
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

        <button>Ok</button>
    </form>
@endsection
