{{-- Dito sa update parang same lang sa index kung pano ka mag display ng data  
    pinag kaiba lang dito is yung data ng id na pinili mo ang ilalabas niya lang pero naka foreach lang din
    --}}
    @foreach ($students as $student)
    <!-- Modal -->
    <div class="modal fade" id="editStudent{{ $student->id }}" tabindex="-1" aria-labelledby="addNewStudentLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Update Student</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               <form action="{{ url('/edit-this-student', $student->id) }}" method="POST">
                   @csrf
                   {{-- eto yun imbes na delete update naman pag mag a update  --}}
                   @method('UPDATE')
                   <div class="mb-3">
                     <label for="exampleInput" class="form-label">Student Name</label>
                     <input type="text" class="form-control" name="student_name" value="{{ $student->name }}">
                   </div>
                   <div class="mb-3">
                       <label for="exampleInput" class="form-label">College</label>
                       <input type="text" class="form-control" name="college" value="{{ $student->college }}">
                     </div>
                     <div class="mb-3">
                       <label for="exampleInput" class="form-label">Program</label>
                       <input type="text" class="form-control" name="program" value="{{ $student->program }}">
                     </div>
                     <div class="mb-3">
                       <label for="exampleInput" class="form-label">Course Code</label>
                       <input type="text" class="form-control" name="course_code" value="{{ $student->course_code }}">
                     </div>
                     <div class="mb-3">
                       <label for="exampleInput" class="form-label">Course Name</label>
                       <input type="text" class="form-control" name="course_name" value="{{ $student->course_name }}">
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                       <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                 </form>
           </div>
         </div>
       </div>
   </div>   
   @endforeach
   {{-- display palang to need natin ma update mismo yung mababago niya  --}}