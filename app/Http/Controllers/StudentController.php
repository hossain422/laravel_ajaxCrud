<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function students(Request $request){
        $students = Student::orderBy('id', 'desc')->paginate(10);
        if($request->ajax()){
            return view('student_pagination', compact('students'));
        }
        return view('students', compact('students'));
    }
    public function store(Request $request){
        $student = new Student();
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->class_type = $request->class_type;
        $student->save();
        return response()->json([
            'status' => 'success'
        ]);
    }
    public function update(Request $request){
        $student = Student::find($request->up_id);
        $student->name = $request->up_name;
        $student->roll = $request->up_roll;
        $student->email = $request->up_email;
        $student->phone = $request->up_phone;
        $student->class_type = $request->up_class_type;
        $student->save();
        return response()->json([
            'status' => 'success'
        ]);
    }
    public function destroy(Request $request){
        $student = Student::find($request->id);
        $student->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
    public function pagination(Request $request){
        $students = Student::orderBy('id', 'desc')->paginate(10);
        return view('student_pagination', compact('students'))->render();
    }
    public function search(Request $request){
        $students = Student::where('name', 'like', "%$request->search%")
                    ->orWhere('email', 'like', "%$request->search%")
                    ->orWhere('phone', 'like', "%$request->search%")
                    ->orWhere('roll', 'like', "%$request->search%")
                    ->orWhere('class_type', 'like', "%$request->search%")
                    ->orderBy('id', 'desc')->paginate(10);
        if($students->count() >= 1){
            return view('student_pagination', compact('students'));
        }
        else{
            return response()->json([
                'status' => 'Nothing Found!!'
            ]);
        }
                    
    }

}
