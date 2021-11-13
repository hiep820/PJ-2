<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Grade;
use App\Models\invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
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
        ->join("book","invoice.id_book","=","book.id_book")
        ->where("name_grade", "like", "%$search%")
        ->paginate(5);
        return view('invoice.index', [
            'listInvoice' => $listInvoice,
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
        $listInvoice = invoice:: all();
        $listGrade = Grade::all();
        $listBook =Book::all();
        return view('invoice.create',[
            "listInvoice" => $listInvoice,
            "listGrade" => $listGrade,
            "listBook" => $listBook,
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
        $book = $request->get('book');
        $grade = $request->get('grade');
        $exportDate = $request->get('export');
        $quantitys= $request->get('quantitys');
        $data = new invoice();
        $data -> id_grade = $grade;
        $data->id_book= $book;
        $data->exportDate= $exportDate;
        $data ->quantitys=$quantitys;
        $data->save();
        return redirect(route('invoice.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listInvoice = invoice::join("grade", "invoice.id_grade", "=", "grade.id_grade")
        ->join("book","invoice.id_book","=","book.id_book")
        ->find($id);
        $listGrade = Grade::all();
        $listBook =Book::all();
        return view('invoice.edit',[
            "listInvoice" => $listInvoice,
            "listGrade" => $listGrade,
            "listBook" => $listBook,
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
        $book = $request->get('book');
        $grade = $request->get('grade');
        $exportDate = $request->get('export');
        $quantitys= $request->get('quantitys');
        $data = invoice::find($id);
        $data -> id_grade = $grade;
        $data->id_book= $book;
        $data->exportDate= $exportDate;
        $data ->quantitys=$quantitys;
        $data->save();
        return redirect()->route('invoice.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        invoice::where('id_invoice', $id)->delete();
        return redirect(route('invoice.index'));
    }
}
