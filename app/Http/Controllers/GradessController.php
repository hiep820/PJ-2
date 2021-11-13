<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\invoice;
use Illuminate\Http\Request;

class GradessController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ds-lophoc|tao-lophoc|capnhat-lophoc|xoa-lophoc', ['only' => ['index','store']]);
        $this->middleware('permission:tao-lophoc', ['only' => ['create','store']]);
        $this->middleware('permission:capnhat-lophoc', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-lophoc', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listInvoice = invoice::join("grade", "invoice.id_grade", "=", "grade.id_grade")
        ->join("book","invoice.id_book","=","book.id_book")
        ->get();
        return view('grade.show', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
