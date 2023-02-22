<?php


// print_r($comment);
// die;

?>
  <div class="wrapper">
    <!-- ========Navbar======== -->
    <?php echo $this->element('flash/navbar') ?>
    <!-- ======navbar====== -->


    <div class="content-wrapper">
      <section class="content-header all-post">
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
            <div class="col-md-1"></div>
            <div class="col-md-3">
              <div class="card mb-4">
                <div class="card-body text-center user_aside">
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
            <div class="col-md-6">
                <?php foreach($posts as $post){
                  ?>
                <div class="row index">
                  <div class=" col-md-12 user_profile">
                      <?= $this->Html->image($post->user->image,['class'=>'user_profile1'])?>
                    
                        <?php 
                          echo $this->Html->link(
                          
                          h($post->user->name),['controller'=>'Users','action'=>'Profile',$post->user->id]);
                        ?>
                     
                  </div>
                  <div class="col-md-12 user_post">
                      <div class="card">
                         <?= $this->Html->image($post->post,['class'=>'user_post'])?><br>
                        <div class="caption">
                          <div class="left-caption">
                            <?=h($post->caption)?><br>
                            <?php
                            
                            foreach($comment as $comment){
                             
                              if($post->id == $comment->posts_id){
                                  echo $comment->comment." ";
                                }
                            }
                            
                            ?>
                            <?=h($user->comment)?>

                          </div>
                          <div class="comment">
                            <?php echo $this->Form->create(null,['action'=>'/Users/addComment/'.$post->id])?>
                            <?php echo $this->Form->control('comment')?>
                            <?= $this->Form->button('Add Comment', ['type' => 'submit','class'=>'btn btn-primary mt-3 text-center']); ?>
                            <?= $this->Form->end() ?>

                          </div>
                        </div>
                      </div>
                    </div>
                 </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
      </section>
    </div>

    <!-- ==========footer content============ -->
      <?php echo $this->element('admin/admin_footer') ?>
    <!-- ==========footer content============ -->
    
  </div>



