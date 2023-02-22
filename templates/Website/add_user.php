<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Add-New User</title>
    <?= $this->Html->css(['style','aos','bootstrap.min','glightbox.min','swiper-bundle.min']) ?>
   
</head>
<body>
    
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
                    <h2 class="my-4 pt-4 text-light">Registration Form</h2>
                    <?= $this->Form->create($user,["enctype" => "multipart/form-data"]) ?>
                    <fieldset>
                        
                        <div>
                            <?php echo $this->Form->control('first_name',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="fname_error"></span>
                        </div>

                        <div>
                            <?php echo $this->Form->control('last_name',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="lname_error"></span>
                        </div>

                        <div>
                            <?php echo $this->Form->control('email',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="email_error"></span>
                        </div>

                        <div>
                            <?php echo $this->Form->control('phone',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="phone_error"></span>
                        </div>

                        <div>
                            <?php echo $this->Form->control('password',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="pass_error"></span>
                        </div>

                        <div>
                            <?php echo $this->Form->control('Confirm_password',['class'=>'form-control border border-secondary','required'=>false]);?>
                            <span id="pass_error"></span>
                        </div>

                        <div>
                            <label for="">Gender</label><br>
                            <?php echo $this->Form->radio('gender',['male'=>'male','female'=>'female','other'=>'other'],['class'=>'border border-secondary','required'=>false]);?>
                            <span id="gender_error"><?php echo $this->Form->error('gender');?></span>
                        </div>

                        <div>
                        <?php echo $this->Form->control('image',['type'=>'file','class'=>'form-control border border-secondary','required'=>false]);?>
                        <span id="image_error"></span>
                        </div>
                        
                    </fieldset>
                    <?= $this->Form->button('Register', ['type' => 'submit','class'=>'btn btn-primary mt-3 text-center']); ?>
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
</body>
</html>