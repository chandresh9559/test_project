


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

    <section style="background-color: #eee;">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <?php echo $this->Html->image($user->image,['class'=>'user_img']); ?>
                <h4 class="my-3"><?=h($user->name)?></h4>
                <h6 class="my-3"><?=h($user->occupation)?></h6>
                <div class="d-flex justify-content-center mb-2">
                  <button type="button" class="btn btn-primary">Follow</button>
                  <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                  <?=h($user->name)?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                  <?=h($user->email)?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9">
                  <?=h($user->profile->phone)?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">gender</p>
                  </div>
                  <div class="col-sm-9">
                  <?=h($user->profile->gender)?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                  <?=h($user->profile->address)?>
                  </div>
                </div>
                
              </div>
            </div>
            <?= $this->Html->link(__('Edit Profile'), ['controller'=>'Users','action' => 'edit',$user->id,$user->profile->id],['class'=>'btn btn-primary']) ?>
          </div>
        </div>
      </div>
    </section>
  </div>
   <!-- ======navbar====== -->
   <?php echo $this->element('admin/admin_footer') ?>
  <!-- =======navbar===== -->

</div>
</body>
</html>
