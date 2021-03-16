<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Student_marklist;
use Session;
use DB;

class StudentController extends Controller{

    public function index(){
        $student = Student::orderBy('created_at','desc')->get();
        return view('welcome',['student' => $student]);
    }

    public function add(){
        return view('create_student');
    }
    public function store(Request $request){
        $this->validate($request, [
            'student_name' => 'required',
            'student_age' => 'required|numeric',
            'gender'=> 'required|in:male,female' ,
            'reporting_teacher' => 'required'
        ]);
        
         $postData = $request->all();
         Student::create($postData);
        Session::flash('success_msg', 'Student  details added successfully!');

        return redirect()->route('student.index');
    }
    public function delete($id){
        $count = Student_marklist::where('student_name', $id)->count();
        if($count > 0){
            DB::table('student_marklists')->where('student_name', $id)->delete();      
        }
        
        Student::find($id)->delete();
        Session::flash('success_msg', 'Student  details deleted successfully!');

        return redirect()->route('student.index');
    }
    public function edit($id){
        $student = Student::find($id);
        return view('edit_student', ['student' => $student]);
    }
    public function update($id, Request $request){
        $this->validate($request, [
            'student_name' => 'required',
            'student_age' => 'required|numeric',
            'gender'=> 'required|in:male,female' ,
            'reporting_teacher' => 'required'
        ]);
        $postData = $request->all();
        Student::find($id)->update($postData);
        Session::flash('success_msg', 'Student  details updated successfully!');

        return redirect()->route('student.index');
    }
}
