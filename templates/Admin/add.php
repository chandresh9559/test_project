<!DOCTYPE html>
<html lang="en">


<body>
    
   <!-- ======= Bredcrumb ======= -->
        <div>
            <?php
                $this->Breadcrumbs->add([
                ['title' => 'Add_User', 'url' => ['controller' => 'Admin', 'action' => 'add_user'],'options' => ['class' => 'active']],
                ['title' => 'Login', 'url' => ['controller' => 'Admin', 'action' => 'login'],'options' => ['class' => 'active']],
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
                            <?php echo $this->Form->select('profile.occupation',['engineer'=>'engineer','teacher'=>'teacher','doctor'=>'doctor','farmer'=>'farmer','carpenter'=>'carpenter'],['class'=>'form-control border border-secondary',]);?><br>
                           
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