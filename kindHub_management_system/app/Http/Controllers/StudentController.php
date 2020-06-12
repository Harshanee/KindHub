<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
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
        $request->validate([
            'firstName' => 'required',
            'gender' => 'required',
            'joinedYear' => 'required',
            'classId' => 'required', 
            'teacherId' => 'required' 
        ]);
        $student = Student::create($request->all());
        return response()->json(['message'=> 'student created', 
        'student' => $student]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return $student;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'firstName' => 'required',
            'gender' => 'required',
            'joinedYear' => 'required',
            'classId' => 'required', 
            'teacherId' => 'required' 
        ]);
        $student->firstName = $request->firstName();
        $student->lastName = $request->lastName();
        $student->gender = $request->gender();
        $student->joinedYear = $request->joinedYear();
        $student->classId = $request->classId();
        $student->teacherId = $request->teacherId();
        $student->save();
        
        return response()->json([
            'message' => 'student updated!',
            'student' => $student
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            'message' => 'student deleted'
        ]);
    }
}
