@extends('layout.app')
@section('title', 'Cập nhật sách')
@section('content')
    <h1>Sửa hóa đơn </h1>
    <form action="{{ route('invoice.update', $listInvoice->id_invoice) }}" method="post">
        @method('PUT')
        @csrf
        Lớp học <select name="grade">
                    @foreach ($listGrade as $item)
                        <option value="{{ $item->id_grade }}" @if ($item->id_grade = $listInvoice->name_grade)
                            chosed
                        @endif>
                            {{ $item->name_grade}}
                        </option>
                    @endforeach
                </select>
        Tiêu đề sách <select name="book">
                    @foreach ($listBook as $item)
                        <option value="{{ $item->id_book }}" @if ($item->id_book = $listInvoice->id_book)
                            chosed
                        @endif>
                            {{ $item->title_book }}
                        </option>
                    @endforeach
                </select><br>
        Ngày xuất: <input type="date" name="export" value="{{ $listInvoice->exportDate}}"><br><br>
        Số lượng: <input type="text" name="quantitys" value="{{$listInvoice->quantitys}}">
        <button>Cập nhật</button>
    </form>
@endsection
