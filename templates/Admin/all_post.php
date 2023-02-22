<!DOCTYPE html>
<html lang="en">

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- ========Navbar======== -->
    <?php echo $this->element('flash/navbar') ?>
    <!-- ======navbar====== -->

    <!-- =========sidebar========== -->
      <?php echo $this->element('flash/admin_sidebar') ?>
    <!-- ==========sidebar========= -->

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>List Of All Existing Post</h1>
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
                        <?php foreach ($posts as $post): ?>
                        <tr>
                            
                            <td><?= $post->has('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
                            <td><?= h($post->post) ?></td>
                            <td><?= h($post->created_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'viewPost',$post->user->id, $post->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'editPost',$post->user->id, $post->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete',$post->user->id, $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
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


