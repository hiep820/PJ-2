<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use App\Models\Grade;
use App\Models\invoice;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ds-lophoc|tao-lophoc|capnhat-lophoc|xoa-lophoc', ['only' => ['index','store']]);
        $this->middleware('permission:tao-lophoc', ['only' => ['create','store']]);
        $this->middleware('permission:capnhat-lophoc', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-lophoc', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $search = $request->get('search');
        $idCourse = $request->get('id-course');
        $trangthai= $request->get('trangthai');
        $listCourse= Course::all();
        // $listGrade = Grade::join("course", "grade.id_course", "=", "course.id_course")
        // ->where("name_grade", "like", "%$search%")
        // ->where('grade.trang_thai',$trangthai)
        // ->paginate(10);
        $query = Grade::query();
        $query->join("course", "grade.id_course", "=", "course.id_course");
        if($idCourse != NULL) {
            $query->where("grade.id_course", $idCourse);
        }
        if($trangthai != NULL) {
            $query->where("grade.trang_thai", $trangthai);
        }
        if($search != NULL) {
            $query->where("name_grade", "like", "%$search%");
        }
        $listGrade=$query->paginate(10);
        return view('grade.index', [
            'listGrade' => $listGrade,
            'idCourse'=>$idCourse,
            'listCourse'=>$listCourse,
            'trangthai'=>$trangthai,
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
        $listCourse= Course::all();
        return view('grade.create', [
            "listCourse" => $listCourse
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
        $names = $request->get('name');
        $course = $request->get('course');
        $status = $request->get('status');
        $grade= new Grade();
        $grade->name_grade = $names;
        $grade->id_course = $course;
        $grade->trang_thai = $status;
        $grade->save();
        return redirect()->route('grades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $grade = Grade::find($id);
        $book= $grade->books()->get();

        return view('grade.show', [
            'book'=>$book,
            'grade'=>$grade,
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
        $listGrade = Grade::join("course", "grade.id_course", "=", "course.id_course")
        ->find($id);
        $listCourse = Course::all();
        return view('grade.edit', [
            "listGrade" => $listGrade,
            "listCourse" => $listCourse
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
        $names = $request->get('name');
        $course = $request->get('course');
        $status = $request->get('status');
        $grade= Grade::find($id);
        $grade->name_grade = $names;
        $grade->id_course = $course;
        $grade->trang_thai = $status;
        $grade->save();
        return redirect()->route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        grade::where('id_grade', $id)->delete();
        return redirect(route('grades.index'));
    }

}
