

<!-- Modal -->
<div class="modal fade" id="update_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="" method="post" id="update_student_form">
            @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <input type="hidden" name="up_id" id="up_id">
            <label for="">Roll</label>
            <input class="form-control" id="up_roll" name="up_roll" value="" required type="text">
            <label for="">Name</label>
            <input class="form-control" id="up_name" name="up_name" required type="text">
            <label for="">Email</label>
            <input class="form-control" id="up_email" name="up_email" required type="email">
            <label for="">Phone</label>
            <input class="form-control" id="up_phone" name="up_phone" required type="text">
            <label for="">Class</label>
            <input class="form-control" id="up_class_type" name="up_class_type" required type="text">

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary update_student">Update Data</button>
      </div>
     </form>
    </div>
  </div>
</div>