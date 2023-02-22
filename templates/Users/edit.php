<!DOCTYPE html>
<html lang="en">
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
       <?php echo $this->element('flash/navbar')?>  
    <!-- ======= Header ======= -->

    <!-- ======= Body Content ======= -->
        <div class="container-fluid mt-4 py-4 edit_profile">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2 class="my-4 pt-4 text-light">Registration Form</h2>
                    <?= $this->Form->create($user,["enctype" => "multipart/form-data"]) ?>
                    <fieldset>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $this->Form->control('name',['class'=>'form-control border border-secondary','required'=>false]);?>
                                <span id="name_error"></span>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Html->image($user->image,['class'=>'edit_img']);?>
                               
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <?php echo $this->Form->control('email',['class'=>'form-control border border-secondary','required'=>false]);?>
                                <span id="email_error"></span>
                            </div>

                            <div class="col-md-6">
                                <?php echo $this->Form->control('profile.phone',['class'=>'form-control border border-secondary','required'=>false]);?>
                                <span id="phone_error"></span>
                            </div>

                            <div class="col-md-6">
                                <?php echo $this->Form->control('image',['type'=>'file','class'=>'form-control border border-secondary','required'=>false]);?>
                                <span id="image_error"></span>
                            </div>

                            <div class="col-md-6">
                                <label for="">Choose Occupation</label><br>
                                <?php echo $this->Form->select('profile.occupation',['engineer'=>'engineer','teacher'=>'teacher','doctor'=>'doctor','farmer'=>'farmer','carpenter'=>'carpenter'],['class'=>'form-control border border-secondary',]);?><br>
                            
                            </div>

                            <div class="col-md-6">
                                <label for="">Gender</label><br>
                                <?php echo $this->Form->radio('profile.gender',['male'=>'male','female'=>'female','other'=>'other'],['class'=>'border border-secondary','required'=>false]);?><br>
                                <label class="error" for="gender"><?php echo $this->Form->error('profile.gender');?></label>
                            </div>
                        </div>
                        
                    </fieldset>
                    <?= $this->Form->button('Save',['type' => 'submit','class'=>'btn btn-primary mt-3 text-center']); ?>
                    <?= $this->Form->end() ?>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    <!-- ======= Body Content ======= -->

    <!-- ======= Header ======= -->
      <?php echo $this->element('admin/admin_footer')?>  
    <!-- ======= Header ======= -->
</body>
</html>
