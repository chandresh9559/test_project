$(document).ready(function(){
    
    // alert("klpokok");die ();
    // file for custom js code

    // Ajax csrf token setup
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
    //     }
    // });


    // $("#form").validate({
    //     rules:{
            
    //         name: "required",
    //         email: {
    //             required:true,
    //             email:true,
    //         },
    //         phone: {
    //             required:true,
    //             minlength:10,
    //             maxlength:12,
    //         },
    //         password: {
    //             required:true,
    //             minlength:5,
               
    //         },
    //         Confirm_password: {
    //             required:true,
    //             minlength:5,
    //             equalTo:"#password",
    //         },
    //         gender:"required",
    //         image:"required",
           
    //     },
    //     messages:{
             
    //         name:"name is required",
    //         email:{
    //             required:"Email must be required",
    //             email:"please enter a valid email",
    //         },
    //         profilephone:{
    //             required:"phone number is required",
    //             minlength:"Phone number must be within 10 -12 digit",
    //             maxlength:"Phone number must be within 10 -12 digit",
    //         },
    //         gender:"select your gender",
    //         image:"select your image",
    //         password:{
    //             required:"password must be required",
    //             minlength:"password must be 5 characters",
    //         },
    //         Confirm_password:{
    //             required:"Confirm password must be required",
    //             minlength:"Confirm password must be 5 characters",
    //             equalTo:"Confirm password does not match",
    //         },
    //     }
    // });
});
    //     },submitHandler: function (form) {



    //         // ajax request to save student
    //         $("#button").on("click", function(e){
    //             e.preventDefault();
            
            //     $.ajax({
            //         url: "http://localhost:8765/Users/add",
            //         data: $("#form").serialize(),
            //         type: "JSON",
            //         method: "post",
                    
            //         success:function(response){
            //             var data = JSON.parse(response);
            //             var status = data['status'];
            //             if(status == '1'){
            //                 // $('#success').html('');
            //                 $('#success').append(data['message']);
                        
            //                 window.location.href = 'http://localhost:8765/users/login';
            //             }else if(status == '0'){
            //                 // $('#email-error').html('');
            //                 // $('#email-error').show();
            //                 $('#email_error').append(data['message']);
                        
            //             }
            //         }
            //     });
            // });
    //     }
//     });
// });
  

    // submitHandler: function (form) {
    //     var postdata = $("#frm-add-student").serialize();
    //     $.ajax({
    //         url: "/add-student",
    //         data: postdata,
    //         type: "JSON",
    //         method: "post",
    //         success: function (response) {
    //             alert(response);
    //             var data = JSON.parse(response);
    //             var status = data['status'];
    //             if(status == '0'){
    //                 $('#email-error').html('');
    //                 $('#email-error').show();
    //                 $('#email-error').append(data['message']);
    //             }else if(status == '1'){
    //                 $('#success').html('');
    //                 $('#success').append(data['message']);
    //             }
    //         }
    //     });
    // }

    // // ajax request to update student
    // $(document).on("submit", "#frm-edit-student", function(){

    //     var postdata = $("#frm-edit-student").serialize();
    //     console.log(postdata);
    //     $.ajax({
    //         url: "http://localhost:8765/Students/editStudents",
    //         data: postdata,
    //         type: "JSON",
    //         method: "post",
    //         success:function(response){
                
    //             window.location.href = 'http://localhost:8765/Students/list_students'
    //         }
    //     });
    // });

    // // ajax request to delete student
    // $(document).on("click", ".btn-delete-student", function(){

    //     if(confirm("Are you sure want to delete ?")){
           
    //         var postdata = "student_id=" + $(this).attr("data-id");
          
    //         $.ajax({
    //             url: "http://localhost:8765/Students/deleteStudent",
    //             data: postdata,
    //             type: "JSON",
    //             method: "post",
    //             success:function(response){
    //                responseArr =  JSON.parse(response);
    //                if(responseArr.status == 1){
                       
    //                    $('#response').html()
    //                     // $("#studentRec"+$(this).attr('data-id')).hide();
    //                     // $('#studentRec'+$(this).attr("data-id")).hide();
    //                     window.location.href = 'http://localhost:8765/Students/list_students'

                          
    //                  }

    //             }
    //         });
    //     }
    // });
// });