<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentInfoController extends Controller
{

    public function index() {
        $students = Student::latest()->paginate(20);
    
        return view('students.index', compact('students'))
             ->with('i', (request()->input('page', 1) - 1) * 8);
    }

    public function store(Request $request) {

        $newStudent = new Student;
        $newStudent->student_number = '0';
        $newStudent->name = $request->student_name;
        $newStudent->college = $request->college;
        $newStudent->program = $request->program;
        $newStudent->course_code = $request->course_code;
        $newStudent->course_name = $request->course_name;
        $newStudent->date_enroll = '0';
        $newStudent->created_at = Carbon::now();
        $newStudent->save();

        $newStudent->date_enroll = $newStudent->created_at;
        $newStudent->student_number = $newStudent->id;
        $newStudent->save();

        return redirect()->back();
    }

    public function destroy($id) {

        $deleteThis = Student::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id) {

        $updateStudent = Student::find($id);
        $updateStudent->student_number = '0';
        $updateStudent->name = $request->student_name;
        $updateStudent->college = $request->college;
        $updateStudent->program = $request->program;
        $updateStudent->course_code = $request->course_code;
        $updateStudent->course_name = $request->course_name;
        $updateStudent->date_enroll = '0';
        $updateStudent->created_at = Carbon::now();
        $updateStudent->update();

        $updateStudent->date_enroll = $updateStudent->created_at;
        $updateStudent->student_number = $updateStudent->id;
        $updateStudent->save();

        return redirect()->back();
    }
}
