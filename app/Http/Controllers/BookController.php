<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Grade;
use App\Models\invoice;
use App\Models\Subjects;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ds-sach|tao-sach|capnhat-sach|xoa-sach', ['only' => ['index','store']]);
        $this->middleware('permission:tao-sach', ['only' => ['create','store']]);
        $this->middleware('permission:capnhat-sach', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-sach', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $listInvoice = invoice::join("grade", "invoice.id_grade", "=", "grade.id_grade")
        ->join("book","invoice.id_book","=","book.id_book")->get();
        $listBook = Book::join("subjects", "book.id_subjects", "=", "subjects.id_subjects")
        ->where("title_book", "like", "%$search%")
        ->paginate(5);
        return view('book.index', [
            'listBook' => $listBook,
            'listInvoice'=>$listInvoice,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listBook = Book:: all();
        $listSubject= Subjects::all();
        return view('book.create',[
            "listBook" => $listBook,
            "listSubject" => $listSubject,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('title');
        $soluong = $request->get('so_luong');
        $mon = $request->get('mon');
        $book = new Book();
        $book->title_book = $name;
        $book->quantity = $soluong;
        $book->id_subjects=$mon;
        $book->save();
        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        $grade= Grade::all();

        $listInvoice = invoice::join("book","invoice.id_book","=","book.id_book")
        ->join("grade", "invoice.id_grade", "=", "grade.id_grade");
        $sum =invoice::where('id_grade','=', $grade->id_grade)
                    ->where('id_book','=',$book->id_book)
                    ->sum('invoice.quantitys');
        return view('grade.show', [
            'listInvoice' => $listInvoice,
            'grade'=> $grade,
            'book'=>$book,
            'sum'=>$sum,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listBook = Book::join("subjects", "book.id_subjects", "=", "subjects.id_subjects")
        ->find($id);
        $listSubject = Subjects::all();
        return view('book.edit', [
            "listBook" => $listBook,
            "listSubject" => $listSubject
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->get('title_book');
        $soluong = $request->get('so_luong');
        $mon = $request->get('mon');
        $book = Book::find($id);
        $book->title_book= $name;
        $book->quantity = $soluong;
        $book->id_subjects=$mon;
        $book->save();
        return redirect()->route('books.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('id_book', $id)->delete();
        return redirect(route('books.index'));
    }

}
