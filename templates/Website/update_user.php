<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Update-Users Detail</title>
    <?= $this->Html->css(['style','aos','bootstrap.min','glightbox.min','swiper-bundle.min']) ?>
    
</head>
<body>

    <!-- ======= Bredcrumb ======= -->
        <div>
            <?php
                $this->Breadcrumbs->add([
                ['title' => 'Add_User<span>></span>', 'url' => ['controller' => 'Users', 'action' => 'add_user'],'options' => ['class' => 'active']],
                ['title' => 'Login<span>></span>', 'url' => ['controller' => 'Users', 'action' => 'login'],'options' => ['class' => 'active']],
                ['title' => 'User_List<span>></span>', 'url' => ['controller' => 'Users', 'action' => 'user_list'],'options' => ['class' => 'active']],
                ['title' => 'Update_User<span>></span>', 'url' => ['controller' => 'Users', 'action' => 'update_user'],'options' => ['class' => 'active']],
                ]);
            ?>
        </div>
    <!-- ======= Bredcrumb ======= -->

    <!-- ======= Header ======= -->
       <?php echo $this->element('flash/header1')?>  
    <!-- ======= Header ======= -->

    <!-- ======= Body Content ======= -->
        <div class="container-fluid mt-4 py-4 register">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <h2 class="my-4 pt-4 text-light">Update Users Details</h2>
                    <?= $this->Form->create($user,["enctype" => "multipart/form-data"]) ?>
                    <fieldset>
                        
                    <div class="row bg-primary p-3">
                            <div class="col-md-4 profile-img">
                                <?php echo $this->Html->image($user->image); ?>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo $this->Form->control('first_name', ['class' => 'form-control border border-secondary', 'required' => false]); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo $this->Form->control('last_name', ['class' => 'form-control border border-secondary', 'required' => false]); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo $this->Form->control('email', ['class' => 'form-control border border-secondary', 'required' => false]); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo $this->Form->control('phone', ['class' => 'form-control border border-secondary', 'required' => false]); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Gender</label><br>
                                        <?php echo $this->Form->radio('gender', ['male' => 'male', 'female' => 'female', 'other' => 'other'], ['class' => 'border border-secondary', 'required' => false]); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo $this->Form->control('image', ['type'=>'file','class' => 'form-control border border-secondary', 'required' => false]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <?= $this->Form->button('Update', ['type' => 'submit','class'=>'btn btn-primary mt-3 text-center']); ?>
                    <?= $this->Form->end() ?>
                
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