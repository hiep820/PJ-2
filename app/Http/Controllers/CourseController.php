<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ds-khoahoc|tao-khoahoc|capnhat-khoahoc|xoa-khoahoc', ['only' => ['index','store']]);
        $this->middleware('permission:tao-khoahoc', ['only' => ['create','store']]);
        $this->middleware('permission:capnhat-khoahoc', ['only' => ['edit','update']]);
        $this->middleware('permission:xoa-khoahoc', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data = Course::get();
        return  view('course.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_course' => 'required',
        ]);

        $input = $request->all();
        $data = Course::create($input);
        return redirect()->route('courses.index')
            ->with('success','Tạo mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Course::Where('id_course',$id)->first();
        return  view('course.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Course::Where('id_course',$id)->first();
        return view('course.edit',compact('data'));
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
        $this->validate($request, [
            'name_course' => 'required',
        ]);

        $input = $request->all();
        $data = Course::Where('id_course',$id)->first();
        $data->update($input);
        return redirect()->route('courses.index')
            ->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::Where('id_course',$id)->first()->delete();
        return redirect()->route('courses.index')
            ->with('success','Xóa thành công');
    }
}
