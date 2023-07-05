

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>
    <script>
      $(document).ready(function() {
        $(document).on('click', '.add_student', function(e){
            e.preventDefault();
            let name = $("#name").val();
            let roll = $("#roll").val();
            let email = $("#email").val();
            let phone = $("#phone").val();
            let class_type = $("#class_type").val();
            // console.log(name+email);
            $.ajax({
                url: "{{url('add_student')}}",
                method:'post',
                data:{
                    name:name,
                    roll:roll,
                    email:email,
                    phone:phone,
                    class_type:class_type,
                },
                success:function(res){
                    if(res.status=='success'){
                        $('#add_student').modal('hide');
                        $('#add_student_form')[0].reset();
                        $('.table').load(location.href+' .table');

                        Command: toastr["success"]("Student Inserted Successfully", "Success")

                        toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }
                },
                

            });
        });
        // Edit
        $(document).on('click', '.edit_student', function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let roll = $(this).data('roll');
            let email = $(this).data('email');
            let phone = $(this).data('phone');
            let class_type = $(this).data('class_type');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_roll').val(roll);
            $('#up_email').val(email);
            $('#up_phone').val(phone);
            $('#up_class_type').val(class_type);
        });
        //Update
        $(document).on('click', '.update_student', function(e){
            e.preventDefault();
            let up_id = $("#up_id").val();
            let up_name = $("#up_name").val();
            let up_roll = $("#up_roll").val();
            let up_email = $("#up_email").val();
            let up_phone = $("#up_phone").val();
            let up_class_type = $("#up_class_type").val();
            // console.log(name+email);
            $.ajax({
                url: "{{url('update_student')}}",
                method:'post',
                data:{
                    up_id:up_id,
                    up_name:up_name,
                    up_roll:up_roll,
                    up_email:up_email,
                    up_phone:up_phone,
                    up_class_type:up_class_type,
                },
                success:function(res){
                    if(res.status=='success'){
                        $('#update_student').modal('hide');
                        $('#update_student_form')[0].reset();
                        $('.table').load(location.href+' .table');
                        Command: toastr["success"]("Student Updated Successfully", "Success")

                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                    }
                },
                

            });
        });
        //Delete
        $(document).on('click', '.delete_student', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            if(confirm('Are you sure to delete.??')){
                $.ajax({
                    url: "{{url('delete_student')}}",
                    method:'post',
                    data:{
                        id:id,
                    },
                    success:function(res){
                        if(res.status=='success'){
                            $('.table').load(location.href+' .table');
                            Command: toastr["success"]("Student Deleted Successfully", "Success")

                                toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                                }
                        }
                    },
                });
            }
        });
        //Pagination
        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            pagination(page);
        });
        function pagination(page){
            $.ajax({
                url:"?page="+page,
                success:function(res){
                    $('#pagination').html(res);
                }
            });
        }

        //Search
        $(document).on('keyup', function(e){
            e.preventDefault();
            let search = $("#search").val();
            $.ajax({
                url:"search",
                method:'GET',
                data:{
                    search:search,
                },
                success:function(res){
                    $('#pagination').html(res);
                },
            });

        });



      });
    </script>

