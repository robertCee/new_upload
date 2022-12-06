@extends('students.layout')
@section('tittle', 'Student Information')
@section('content')
 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2>Student Information System</h2>
                <br>
            </div>
            <div class="pull-right">
                <br>
                <a class="btn btn-success" href="{{ route('students.create') }}">Add New Student</a>
                <br>
            </div>
        </div>
    </div> 

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered"> 
        <tr>
            <th>ID</th>
            <th width="15%">Student Number</th>
            <th width="10%">Name</th>
            <th>College</th>
            <th>Program</th>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Date Enrolled</th>
            <th width="25%">Action</th> 
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->student_number }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->college }}</td>
            <td>{{ $student->program }}</td>
            <td>{{ $student->course_code }}</td>
            <td>{{ $student->course_name }}</td>
            <td>{{ $student->date_enroll}}</td>
            
            <td>

                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
            
        </tr>
        @endforeach
    </table>

    {!! $students->links() !!}
      
@endsection

