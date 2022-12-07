<?php

namespace App\Http\Controllers;
use App\Models\StudentData;
use Illuminate\Http\Request;

class StudentDataController extends Controller
{
    public function index() {
        $students = Student::paginate(20);

         return view('students.index', compact('students'));
    }

     public function deleteStudent($id) {
        $deleteThis = StudentData::find($id)->delete();
        return redirect()->back();
    }
}
