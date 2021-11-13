@extends('layout.app')
@section('title', 'Cập nhật sách')
@section('content')
    <h1>Sửa hóa đơn </h1>
    <form action="{{ route('invoices.update', $listInvoices->id) }}" method="post">
        @method('PUT')
        @csrf
        học sinh : <select name="student">
            @foreach ($listStudent as $item)
                <option value="{{ $item->id_student }}" @if ($item->id_student = $listInvoices->name_student)
                    chosed
                @endif>
                    {{ $item->name_student}}
                </option>
            @endforeach
        </select><br> <br><br>
        Tiêu đề sách <select name="book">
                    @foreach ($listBook as $item)
                        <option value="{{ $item->id_book }}" @if ($item->id_book = $listInvoices->id_book)
                            chosed
                        @endif>
                            {{ $item->title_book }}
                        </option>
                    @endforeach
                </select><br>
        Ngày xuất: <input type="date" name="export" value="{{ $listInvoices->exportDate}}"><br><br>
        <button>Cập nhật</button>
    </form>
@endsection
