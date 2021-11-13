<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
session_start();
class StudentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ds-sinhvien|tao-sinhvien|capnhat-sinhvien|xoa-sinhvien', ['only' => ['index','store']]);
        $this->middleware('permission:tao-sinhvien', ['only' => ['create','store']]);
        $this->middleware('permission:capnhat-sinhvien', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-sinhvien', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // dd($request->id_grade);
        $search = $request->get('search');
        $idGrade = $request->get('id-grade');
        $suly= $request->get('su-ly');
        $trangthai= $request->get('trangthai');
        $listGrade = Grade::all();
        // dd($suly);
        // $listStudent = student::join("grade", "student.id_grade", "=", "grade.id_grade")
        // ->where("student.id_grade", $idGrade)
        // ->where("student.su_ly",$suly)
        // ->where('student.trangthai',$trangthai)
        // ->where("name_student", "like", "%$search%")
        // ->paginate(10);
        $query = Student::query();
        $query->join("grade", "student.id_grade", "=", "grade.id_grade");
        if($idGrade != NULL) {
            $query->where("student.id_grade", $idGrade);
        }
        if($suly != NULL) {
            $query->where("student.su_ly", $suly);
        }
        if($trangthai != NULL) {
            $query->where('student.trangthai',$trangthai);
        }
        if($search != NULL) {
            $query->where("name_student", "like", "%$search%");
        }
        $listStudent=$query->paginate(10);
        // dd($listStudent);
        return view('student.index', [
            'listStudent' => $listStudent,
            'listGrade'=>$listGrade,
            'search' => $search,
            "idGrade" => $idGrade,
            'suly'=>$suly,
            'trangthai'=>$trangthai,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listGrade = Grade::all();
        return view('student.create', [
            "listGrade" => $listGrade
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
        $grade = $request->get('grade');
        $gender = $request->get('gt');
        $birthday = $request->get('ns');
        $status = $request->get('status');
        $statuss = $request->get('statuss');
        $Student= new Student();
        $Student->name_student = $names;
        $Student->id_grade = $grade;
        $Student->gender = $gender;
        $Student->birthday = $birthday;
        $Student->trangthai = $status;
        $Student -> su_ly = $statuss;
        $Student->save();
        return redirect()->route('students.index');
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
        $listStudent = student::join("grade", "student.id_grade", "=", "grade.id_grade")
        ->find($id);
        $listGrade = Grade::all();
        return view('student.edit', [
            "listStudent" => $listStudent,
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
        $names = $request->get('name');
        $grade = $request->get('grade');
        $gender = $request->get('gt');
        $birthday = $request->get('ns');
        $status = $request->get('status');
        $statuss = $request->get('statuss');
        $Student= student::find($id);
        $Student->name_student = $names;
        $Student->id_grade = $grade;
        $Student->gender = $gender;
        $Student->birthday = $birthday;
        $Student->trangthai = $status;
        $Student -> su_ly = $statuss;
        $Student->save();
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        student::where('id_student', $id)->delete();
        return redirect(route('students.index'));
    }

}
