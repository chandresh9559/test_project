    
   <!-- ======= Bredcrumb ======= -->
        <div>
            <?php
                $this->Breadcrumbs->add([
                ['title' => 'Add_User', 'url' => ['controller' => 'Users', 'action' => 'add_user'],'options' => ['class' => 'active']],
                ['title' => 'Login', 'url' => ['controller' => 'Users', 'action' => 'login'],'options' => ['class' => 'active']],
                ]);
            ?>
        </div>
    <!-- ======= Bredcrumb ======= -->

    <!-- ======= Header ======= -->
       <?php echo $this->element('flash/header')?>  
    <!-- ======= Header ======= -->

    <!-- ======= Body Content ======= -->
        <div class="container-fluid mt-4 py-4 register">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div id="success"></div>
                    <div id="error"></div>
                    <h2 class="my-4 pt-4 text-light">Registration Form</h2>
                    <?= $this->Form->create(null,['id'=>'form' ,'enctype' => 'multipart/form-data']) ?>
                    <fieldset>
                        
                        <div>
                            <?php echo $this->Form->control('name',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="name_error"></span>
                        </div>

                        <div>
                            <?php echo $this->Form->control('email',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="email_error"></span>
                        </div>

                        <div>
                            <?php echo $this->Form->control('profile.phone',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="phone_error"></span>
                        </div>

                        <div>
                            <?php echo $this->Form->control('profile.address',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="phone_error"></span>
                        </div>

                        <div>
                            <?php echo $this->Form->control('password',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="pass_error"></span>
                        </div>

                        <div>
                            <?php echo $this->Form->control('Confirm_password',['type'=>'password','class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="pass_error"></span>
                        </div>

                        <div>
                            <label for="">Gender</label><br>
                            <?php echo $this->Form->radio('profile.gender',['male'=>'male','female'=>'female','other'=>'other'],['class'=>'border border-secondary','required'=>false]);?><br>
                            <label class="error" for="gender"><?php echo $this->Form->error('profile.gender');?></label>
                        </div>

                        <div>
                            <?php echo $this->Form->control('image',['type'=>'file','class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="image_error"></span>
                        </div>

                        <div>
                            <label for="">Choose Occupation</label><br>
                            <?php echo $this->Form->select('occupation',['engineer'=>'engineer','teacher'=>'teacher','doctor'=>'doctor','farmer'=>'farmer','carpenter'=>'carpenter'],['empty'=>'choose one','class'=>'form-control border border-secondary','required'=>false]);?><br>
                           
                        </div>
                        
                    </fieldset>
                    <?= $this->Form->button('Register', ['type' => 'button','class'=>'btn btn-primary mt-3 text-center', 'id'=>"button"]); ?>
                    
                   
                    <?= $this->Form->end() ?>
                    <p class="text-light">If you are already registered <a href="login" class="btn-services scrollto">Login here</a></p>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    <!-- ======= Body Content ======= -->

   <!-- ======= Footer ======= -->
       <?php echo $this->element('flash/footer')?>  
   <!-- ======= Footer ======= -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
    $(document).ready(function(){
   
        // $("#form").validate({
            // rules:{
                
            //     name: "required",
            //     email: {
            //         required:true,
            //         email:true,
            //     },
            //     phone: {
            //         required:true,
            //         minlength:10,
            //         maxlength:12,
            //     },
            //     password: {
            //         required:true,
            //         minlength:5,
                
            //     },
            //     Confirm_password: {
            //         required:true,
            //         minlength:5,
            //         equalTo:"#password",
            //     },
            //     gender:"required",
            //     image:"required",
            
            // },
            // messages:{
                
            //     name:"name is required",
            //     email:{
            //         required:"Email must be required",
            //         email:"please enter a valid email",
            //     },
            //     profilephone:{
            //         required:"phone number is required",
            //         minlength:"Phone number must be within 10 -12 digit",
            //         maxlength:"Phone number must be within 10 -12 digit",
            //     },
            //     gender:"select your gender",
            //     image:"select your image",
            //     password:{
            //         required:"password must be required",
            //         minlength:"password must be 5 characters",
            //     },
            //     Confirm_password:{
            //         required:"Confirm password must be required",
            //         minlength:"Confirm password must be 5 characters",
            //         equalTo:"Confirm password does not match",
            //     },
            // }
      // });

     $("#button").on('click', function(){


        var name = $('#name').val();
        if(name == ''){
            $("#name_error").html('enter name');
        }
        var email = $('#email').val();
        if(email == ''){
            $("#email_error").html('enter email');
        }
        var password = $('#password').val();
        if(password == ''){
            $("#pass_error").html('enter pass');
        }
     });
    });
   </script>
   