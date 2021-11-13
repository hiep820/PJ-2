<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ds-monhoc|tao-monhoc|capnhat-monhoc|xoa-monhoc', ['only' => ['index','store']]);
        $this->middleware('permission:tao-monhoc', ['only' => ['create','store']]);
        $this->middleware('permission:capnhat-monhoc', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-monhoc', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listSubject = subjects::join("grade", "subjects.id_grade", "=", "grade.id_grade")
        ->where("name_subjects", "like", "%$search%")
        ->paginate(5);
        return view('subject.index', [
            'listSubject' => $listSubject,
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
        $listSubject = subjects:: all();
        $listGrade = Grade::all();
        return view('subject.create',[
            "listSubject" => $listSubject,
            "listGrade" => $listGrade,
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
        $name = $request->get('name');
        $grade = $request->get('grade');
        $Subjects = new subjects();
        $Subjects->name_subjects = $name;
        $Subjects->id_grade = $grade;
        $Subjects->save();
        return redirect(route('subjects.index'));
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
        $listSubject = subjects::join("grade", "subjects.id_grade", "=", "grade.id_grade")
        ->find($id);
        $listGrade = Grade::all();
        return view('subject.edit', [
            "listSubject" => $listSubject,
            "listGrade" => $listGrade
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
        $names = $request->get('names');
        $grade = $request->get('grade');
        $Subjects= subjects::find($id);
        $Subjects->name_subjects = $names;
        $Subjects->id_grade = $grade;
        $Subjects->save();
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        subjects::where('id_subjects', $id)->delete();
        return redirect(route('subjects.index'));
    }
}
