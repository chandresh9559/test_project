<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="posts view content">
            <h3><?= h($post->user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $post->has('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Post') ?></th>
                    <td><?= h($post->post) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($post->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($post->created_date) ?></td>
                </tr>
            </table>

            <div class="related">
                <h4><?= __('Related Comment') ?></h4>
                <?php if (!empty($post->comments)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Comment') ?></th>
                                <th><?= __('Created_date') ?></th>
                                
                            </tr>
                            <?php foreach ($post->comments as $comment) : ?>
                                <tr>
                                   
                                    <td><?= h($comment->comment) ?></td>
                           4
                                    <td><?= h($comment->created_date) ?></td>
                                    <?php if($post->userid != null){
                                        ?>
                                    <td class="actions">
                                        <?= $this->Html->link(__('view'), ['controller' => 'comments', 'action' => 'view', $comment->id, $post->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'comments', 'action' => 'delete', $comment->id, $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?>
                                    </td>
                                    <?php
                                  }?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
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
