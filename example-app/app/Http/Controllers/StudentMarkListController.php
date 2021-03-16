<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Student_marklist;
use Illuminate\Http\Request;
use Session;

class StudentMarkListController extends Controller{
    public function index(){
        $student = Student::orderBy('created_at','desc')->get();
        $student_marks = Student::join('student_marklists', 'students.id', '=', 'student_marklists.student_name')
                ->get(['students.student_name as stud', 'student_marklists.*']);
        return view('stud_marklist',['student' => $student,'student_marks'=>$student_marks]);
    }
    public function add(){
        $student = Student::orderBy('created_at','desc')->get();
        return view('create_student_mark',['student' => $student]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'student_name' => 'required',
            'term' => 'required',
            'maths'=> 'required|numeric' ,
            'science' => 'required|numeric',
            'history'=>'required|numeric'
        ]);
        
         $postData = $request->all();
         Student_marklist::create($postData);
        Session::flash('success_msg', 'Student marklist details added successfully!');

        return redirect()->route('student.marklist');
    }
    public function delete($id){
        Student_marklist::find($id)->delete();
        Session::flash('success_msg', 'Student marklist details deleted successfully!');

        return redirect()->route('student.marklist');
    }
    public function edit($id){
        $student = Student::orderBy('created_at','desc')->get();
        $student_marks = Student_marklist::find($id);
        return view('edit_student_mark', ['student' => $student,'student_marks'=>$student_marks]);
    }
    public function update($id, Request $request){
        $this->validate($request, [
            'student_name' => 'required',
            'term' => 'required',
            'maths'=> 'required|numeric' ,
            'science' => 'required|numeric',
            'history'=>'required|numeric'
        ]);
        $postData = $request->all();
        Student_marklist::find($id)->update($postData);
        Session::flash('success_msg', 'Student  marklist details updated successfully!');

        return redirect()->route('student.marklist');
    }
}
