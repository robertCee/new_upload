<?php

namespace App\Http\Controllers;
use App\Models\StudentData;
use Illuminate\Http\Request;

class StudentDataController extends Controller
{
    public function index() {
        $students = Student::paginate(20);

        // yung variable $students need i compact papuntang view para magamit mo sa @foreach yung collection niya
        return view('students.index', compact('students'));
    }

    // Etong function name is yung naka assign dun sa route after ng url
    // Yung $id parameter is yung id na nasa url sa route mo sa web.php
    public function deleteStudent($id) {
        $deleteThis = StudentData::find($id)->delete();
        return redirect()->back();
    }
}
