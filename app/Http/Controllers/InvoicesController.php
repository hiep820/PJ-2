<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Invoices;
use App\Models\student;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $search = $request->get('search');
        // $listStudent = Student::join("grade", "student.id_grade", "=", "grade.id_grade");
        // $listInvoices = Invoices::join("student", "invoices.id_student", "=", "student.id_student")
        // ->join("book","invoices.id_book","=","book.id_book")
        // ->where("name_student", "like", "%$search%")
        // ->paginate(5);
        // return view('invoices.index', [
        //     'listInvoices' => $listInvoices,
        //     'listStudent'=>$listStudent,
        //     'search' => $search,
        // ]);
        $search = $request->get('search');
        $listInvoices = Invoices::join('student','invoices.id_student','=','student.id_student')
                            ->join('book', 'invoices.id_book', '=', 'book.id_book')
                            ->join('grade','student.id_grade','=','grade.id_grade')
                            ->selectRaw('invoices.id,invoices.exportDate, grade.name_grade as Ten_lop, student.name_student as Ten_Sinh_Vien, student.id_student as Ma_Sinh_Vien, book.id_book as Ma_sach, book.title_book as Ten_sach')
                            ->where("name_student", "like", "%$search%")
                            ->paginate(5);
                            return view('invoices.index', [
                                  'listInvoices' => $listInvoices,
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
        $listInvoices = invoices:: all();
        $listStudent = student::all();
        $listBook =Book::all();
        return view('invoices.create',[
            "listInvoices" => $listInvoices,
            "listStudent" => $listStudent,
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
        $student = $request->get('student');
        $exportDate = $request->get('export');
        $data = new invoices();
        $data -> id_student = $student;
        $data->id_book= $book;
        $data->exportDate= $exportDate;
        $data->save();
        return redirect(route('invoices.index'));
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
        $listInvoices = Invoices::join("student", "invoices.id_student", "=", "student.id_student")
        ->join("book","invoices.id_book","=","book.id_book")
        ->find($id);
        $listStudent = student::all();
        $listBook =Book::all();
        return view('invoices.edit',[
            "listInvoices" => $listInvoices,
            "listStudent" => $listStudent,
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
        $student = $request->get('student');
        $exportDate = $request->get('export');
        $data = invoices::find($id);
        $data -> id_student = $student;
        $data->id_book= $book;
        $data->exportDate= $exportDate;
        $data->save();
        return redirect()->route('invoices.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        invoices::where('id', $id)->delete();
        return redirect(route('invoices.index'));
    }
}
