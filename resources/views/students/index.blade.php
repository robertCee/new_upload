<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="mt-5">
        <h1>STUDENT INFORMATION SYSTEM</h1>
        <br>
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addNewStudent">Add new</button>
    </div>
    <div class="card shadow border-0 mt-2">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Student Number</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">College</th>
                    <th scope="col">Program</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Date Enroll</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->college }}</td>
                            <td>{{ $student->program }}</td>
                            <td>{{ $student->course_code }}</td>
                            <td>{{ $student->course_name }}</td>
                            <td>{{ $student->date_enroll }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <form action="{{ url('/delete-this-student', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                    <div class="mx-1">
                                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editStudent{{ $student->id }}">Update</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <span class="text-muted">No data available</span>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>

    @include('students.modals.create')
    @include('students.modals.edit')
</div>
</body>
</html>
