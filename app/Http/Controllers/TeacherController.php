<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index',['teachers'=>$teachers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'gender'=>'required|max:2',
            'phoneNumber'=>'required',
            'lesson'=>'required|max:255',
        ]);
        $newTeacher = Teacher::create($data);
        return redirect(route('teachers.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return 'id='.$id;
        $t=Teacher::find($id);
        return $t;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit',['teacher'=>$teacher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $data=$request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'gender'=>'required|max:2',
            'phoneNumber'=>'required',
            'lesson'=>'required|max:255',
        ]);
        $teacher->update($data);
        return redirect(route('teachers.index'))->with('success','Амжилттай шинэчлэгдлээ.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}