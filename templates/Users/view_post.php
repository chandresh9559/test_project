<!DOCTYPE html>
<html lang="en">

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- ========Navbar======== -->
    <?php echo $this->element('flash/navbar') ?>
    <!-- ======navbar====== -->

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>See all comments on your post</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Posts</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section style="background-color: #eee;">
      <div class="container py-5">
        <div class="row">
          
          <div class="col-lg-3">
            <div class="card mb-4">
              <div class="card-body text-center">
              <?php echo $this->Html->image($user->image,['class'=>'user_img']); ?>
                <h5 class="my-3"><?=h($user->name)?></h5>
                <p class="text-muted mb-1">Full Stack Developer</p>
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
                  <?=h($user->phone)?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Mobile</p>
                  </div>
                  <div class="col-sm-9">
                  <?=h($user->mobile)?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                  <?=h($user->address)?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!--===== Listing of all users ======-->
                <div class="card-body">
                <?= $this->Html->link(__('Logout'), ['controller'=>'Users','action' => 'logout'],['confirm' => __('Are you sure you want to delete # {0}?'),'class' => 'button float-right']) ?>
                <h3><?= __('Posts') ?></h3>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Post</th>
                        <th>Created Date</th>
                        <th>Operations</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($post->comments as $comment) : ?>
                            <tr>
                            
                                <td><?=h($user->name)?></td>
                                <td><?= h($comment->comment) ?></td>
                                <td><?= h($comment->created_date) ?></td>
                                
                                <td class="actions">
                                    <?= $this->Html->link(__('view'), ['controller' => 'comments', 'action' => 'view', $comment->id, $post->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'comments', 'action' => 'delete', $comment->id, $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Post</th>
                        <th>Created Date</th>
                        <th>Operations</th>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="comment form content">
                      <?= $this->Form->create($comment) ?>
                      <fieldset>
                          <?php echo $this->Form->control('comment');?>
                          <span><i class="fa-solid fa-arrow-right"></i></span>
                      </fieldset>
                      <?= $this->Form->button(__('Submit'), ['class' => 'hidethis']) ?>
                      <?= $this->Form->end() ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- ==========footer content============ -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
</body>
</html>