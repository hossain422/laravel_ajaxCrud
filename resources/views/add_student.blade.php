

<!-- Modal -->
<div class="modal fade" id="add_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="" method="post" id="add_student_form">
            @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <label for="">Roll</label>
            <input class="form-control" id="roll" name="roll" required type="text">
            <label for="">Name</label>
            <input class="form-control" id="name" name="name" required type="text">
            <label for="">Email</label>
            <input class="form-control" id="email" name="email" required type="email">
            <label for="">Phone</label>
            <input class="form-control" id="phone" name="phone" required type="text">
            <label for="">Class</label>
            <input class="form-control" id="class_type" name="class_type" required type="text">

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary add_student">Save Student</button>
      </div>
     </form>
    </div>
  </div>
</div>