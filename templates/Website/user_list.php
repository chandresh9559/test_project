<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>List- All Users</title>
    <?= $this->Html->css(['style','aos','bootstrap.min','glightbox.min','swiper-bundle.min']) ?>
    <style>
     
    </style>
</head>
<body>

   <!-- ======= Bredcrumb ======= -->
        <div>
            <?php
                $this->Breadcrumbs->add([
                ['title' => 'Add_User<span>></span>', 'url' => ['controller' => 'Users', 'action' => 'add_user'],'options' => ['class' => 'active']],
                ['title' => 'Login<span>></span>', 'url' => ['controller' => 'Users', 'action' => 'login'],'options' => ['class' => 'active']],
                ['title' => 'User_List<span>></span>', 'url' => ['controller' => 'Users', 'action' => 'user_list'],'options' => ['class' => 'active']],
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
            <div class="col">
                <h2 class="my-2  text-light">List Of All Users</h2>
                <div class="users index content">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('id') ?></th>
                                    <th><?= $this->Paginator->sort('first_name') ?></th>
                                    <th><?= $this->Paginator->sort('last_name') ?></th>
                                    <th><?= $this->Paginator->sort('email') ?></th>
                                    <th><?= $this->Paginator->sort('phone') ?></th>
                                    <th><?= $this->Paginator->sort('gender') ?></th>
                                    <th><?= $this->Paginator->sort('image') ?></th>
                                    <th><?= $this->Paginator->sort('created_date') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $this->Number->format($user->id) ?></td>
                                    <td><?= h($user->first_name) ?></td>
                                    <td><?= h($user->last_name) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td><?= h($user->phone) ?></td>
                                    <td><?= h($user->gender) ?></td>
                                    <td><?= $this->Html->image($user->image,['width'=>'50px']) ?></td>
                                    <td><?= h($user->created_date) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'user_view' , $user->id],['class'=>'btn btn-primary']) ?>
                                        <?= $this->Html->link(__('Update'), ['action' => 'update_user', $user->id],['class'=>'btn btn-success']) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class'=>'btn btn-danger']) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, total {{count}} are presents in the table ')) ?></p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
  <!-- ======= Body Content ======= -->

  <!-- ======= Footer ======= -->
     <?php echo $this->element('flash/footer')?>  
  <!-- ======= Footer ======= -->

</body>
</html>