(function($){
    $(document).ready(function(){

        // Add New Student Modal Show

        $('a#add_student_modal_btn').click(function(e){
            e.preventDefault();
            $('#add_student_modal').modal('show');

        });


        // Student Store

        $(document).on('submit', 'form#add_student_form', function(e){
            e.preventDefault();

            let name = $('form#add_student_form input[name="name"]').val();
            let email = $('form#add_student_form input[name="email"]').val();
            let cell = $('form#add_student_form input[name="cell"]').val();
            let uname = $('form#add_student_form input[name="uname"]').val();

                // Email Check Resource from W3 School
            let checkEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

                // Form Validation
            if( name == '' | email == '' | cell == '' | uname == '' ){
                $('.msg').html(customMsg('All Feilds Are Required !'));
            } else if (checkEmail.test(email) == false ){
                $('.msg').html(customMsg('Invalid Email Address !', 'warning'));
            }else{

                // Ajax Start
                 $.ajax({

                    url : 'student/store',
                    method : "POST",
                    data : new FormData(this),
                    contentType : false,
                    processData : false,
                    success : function(data){
                        allStudent()
                        $('form#add_student_form')[0].reset();
                        $('.msg').html(customMsg('Student Added Successfully !', 'success'));
                    }
                 }); 
            }
        });



        // Single Student Data Show

        $(document).on('click', '#view_btn', function(e){
            e.preventDefault();

            let id = $(this).attr('viewId');

            $.ajax({
                
                url : 'student/show/' + id,
                success : function(data){
                    let single_student = JSON.parse(data);

                    $('img#student_profile_img').attr('src', 'media/student/' + single_student.photo);
                    $('table tr td#student_name').html(single_student.name);
                    $('table tr td#student_email').html(single_student.email);
                    $('table tr td#student_cell').html(single_student.cell);
                    $('table tr td#student_uname').html(single_student.uname);
                    $('table tr td#student_gender').html(single_student.gender);
                    $('#single_student_modal').modal('show');

                }

            });
            
        });



        // Student Delete

        $(document).on('click', 'a#delete_btn', function(e){
            e.preventDefault();

                // User id
            let id = $(this).attr('deleteId');

                // Confirmation Alert
            let conn = confirm('are you sure ??');

            if( conn == false ){
                return false;
            }else if( conn == true ){

                $.ajax({

                    url : 'student/delete/' + id,
                    success : function(data){
                        $('.img').html(data);
                        allStudent();
                    }

                });


           }

        });




        // Student Data Edit 

        $(document).on('click', 'a#edit_btn', function(e){
            e.preventDefault();

            let id = $(this).attr('editId');

            

            $.ajax({
                url : 'student/edit/' + id,
                success: function (data){
                    $edit_data = JSON.parse(data);

                    $('#edit_student_modal form input[name="name"]').val($edit_data.name);
                    $('#edit_student_modal form input[name="email"]').val($edit_data.email);
                    $('#edit_student_modal form input[name="cell"]').val($edit_data.cell);
                    $('#edit_student_modal form input[name="uname"]').val($edit_data.uname);
                    $('#edit_student_modal form img').attr('src','media/student/' + $edit_data.photo);
                    $('#edit_student_modal').modal('show');

                }
            });

            

        });



    });
})(jQuery)