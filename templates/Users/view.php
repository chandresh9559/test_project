<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
        <?= $this->Html->link(__('New Post'), ['controller'=>'Posts','action' => 'add',$user->id], ['class' => 'side-nav-item btn']) ?>
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($user->created_date) ?></td>
                </tr>
            </table>
            <table>
            <h4><?= __('Related Posts') ?></h4>
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('users_id') ?></th>
                        <th><?= $this->Paginator->sort('post') ?></th>
                        <th><?= $this->Paginator->sort('created_date') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user->posts as $post) : ?>
                        <tr>
                            <td><?= h($post->users_id) ?></td>
                            <td><?= h($post->post) ?></td>
                            <td><?= h($post->created_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'posts' , 'action' => 'view', $post->id, $user->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'posts' , 'action' => 'edit', $post->id, $user->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'post' , 'action' => 'delete', $post->id, $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            
        </div>
    </div>
</div>
