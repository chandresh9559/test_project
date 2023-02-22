<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- ======navbar====== -->
        <?php echo $this->element('flash/navbar') ?>
        <!-- =======navbar===== -->

        <!-- ======sidebar====== -->
        <?php 
            // echo $this->element('flash/admin_sidebar') 
        ?>
        <!-- =======sidebar===== -->

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <section class="col-lg-7 connectedSortable">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 post-left p-5">
                                <h2 class="my-4 pt-4 ">Add Post</h2>
                                <?= $this->Form->create($post,["enctype" => "multipart/form-data"]) ?>
                                <fieldset>
                                    
                                    <div>
                                        <?php echo $this->Form->control('image_file',['type'=>'file','class'=>'form-control border border-secondary','required'=>false]);?>
                                        <span id="post_error"></span>
                                    </div>
                                    <div>
                                        <?php echo $this->Form->control('caption',['class'=>'form-control border border-secondary','required'=>false]);?>
                                        <span id="post_error"></span>
                                    </div>

                                </fieldset>
                                <?= $this->Form->button('Register', ['type' => 'submit','class'=>'btn btn-primary mt-3 text-center']); ?>
                                <?= $this->Form->end() ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo $this->Html->image('team-1.jpg')?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </section>
            <!-- right col -->
        </div>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

</div>
</body>
</html>

   