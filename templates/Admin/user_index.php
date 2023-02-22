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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>List Of All Existing Users</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
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
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Reg. No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contacts</th>
                        <th>Gender</th>
                        <th>Picture</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                            <td><?= h($user->name) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->phone) ?></td>
                            <td><?= h($user->gender) ?></td>
                            <td><?= h($user->image) ?></td>
                            <td><?= h($user->created_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'profile', $user->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Reg. No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contacts</th>
                        <th>Gender</th>
                        <th>Picture</th>
                        <th>Created Date</th>
                        <th>Actions</th>
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
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
</body>
</html>

