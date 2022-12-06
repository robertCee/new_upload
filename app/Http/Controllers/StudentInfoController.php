<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentInfoController extends Controller
{

    // Etong function para sa pag view ng list ng student
    public function index() {
        $students = Student::latest()->paginate(20);
    
        // yung variable $students need i compact papuntang view para magamit mo sa @foreach yung collection niya
        return view('students.index', compact('students'))
             ->with('i', (request()->input('page', 1) - 1) * 8);
    }

    // pag create or store ng student sa database etong function na ito
    // Need tong dalawang parameter na Request $request para makuha mo yung input ng user sa form mo
    public function store(Request $request) {

        // $request->student_name eto yung name attribute value sa create modal mo
        // Kukunin lang yung value nun at ipapasok sa mga column dito ahh
        // No need na yung [input] blah blah basta kung ano ang name attribute kung ano value ng input na yun kukunin na 
        // Ni $request-> yun dito
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

    // Etong function name is yung naka assign dun sa route after ng url
    // Yung $id parameter is yung id na nasa url sa route mo sa web.php

    // Student:: = eto yung model name bale eto yung eloquent version ng table students mo
    // galing sa route..
    // Route::delete('/delete-this-student/{id}', [StudentInfoController::class, 'destroy']);
    // kukunin ni function destroy yung {id} na pinasa mo at yun yung gagamitin niyapang find sa 
    // students table mo para yun ang i dedelete niya ->delete();

    public function destroy($id) {

        $deleteThis = Student::findOrFail($id)->delete();
        return redirect()->back();
    }

    // Parang sa store ng data need ng Request $request comma $id so bale 3 parameters siya need mo yung $request
    // Para makuha yung input or changes niya sa pag update yung $id naman need mo para malaman if anong data ang babaguhin sa 
    // Database kung anong row yung mismong i e edit niya
    public function update(Request $request, $id) {

        // parang delete i find mo muna then saka babaguhin yung mga need baguhin 
        $updateStudent = Student::find($id);
        $updateStudent->student_number = '0';
        $updateStudent->name = $request->student_name;
        $updateStudent->college = $request->college;
        $updateStudent->program = $request->program;
        $updateStudent->course_code = $request->course_code;
        $updateStudent->course_name = $request->course_name;
        $updateStudent->date_enroll = '0';
        $updateStudent->created_at = Carbon::now();
        $updateStudent->save();

        $updateStudent->date_enroll = $updateStudent->created_at;
        $updateStudent->student_number = $updateStudent->id;
        $updateStudent->save();

        return redirect()->back();
    }
}
