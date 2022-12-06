<!-- Modal -->
<div class="modal fade" id="addNewStudent" tabindex="-1" aria-labelledby="addNewStudentLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <form action="{{ url('/store-new-student') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInput" class="form-label">Student Name</label>
                    <input type="text" class="form-control" name="student_name">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInput1" class="form-label">College</label>
                      <input type="text" class="form-control" name="college">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInput" class="form-label">Program</label>
                      <input type="text" class="form-control" name="program">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInput" class="form-label">Course Code</label>
                      <input type="text" class="form-control" name="course_code">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInput" class="form-label">Course Name</label>
                      <input type="text" class="form-control" name="course_name">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
        </div>
      </div>
    </div>
  </div>
  