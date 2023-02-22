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
                ['title' => 'Add_User<span>></span>', 'url' => ['controller' => 'Users', 'action' => 'add_user'],'options' => ['class' => 'active']],
                ['title' => 'Login<span>></span>', 'url' => ['controller' => 'Users', 'action' => 'login'],'options' => ['class' => 'active']],
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
                    <h2 class="my-4 pt-4 text-light">Reset Password</h2>
                    <fieldset>
                        <?php

                            echo $this->Form->create(null);
                           
                            echo $this->Form->control('password',['type'=>'password','class'=>'form-control border border-secondary']);
                            echo $this->Form->control('cpassword',['type'=>'password','class'=>'form-control border border-secondary']);

                        ?>
                    </fieldset>
                    <?= $this->Form->button('Reset', ['type' => 'submit','class'=>'btn btn-primary mt-3 text-center']); ?>
                    <?= $this->Form->end() ?>
                    <p class="text-light">If you have an account<a href="login" class="btn-services scrollto">Login here</a></p>
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