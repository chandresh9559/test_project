  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 fixed-top">
    <!-- Brand Logo -->
    <!-- Brand Logo -->
        <div class="info">

          <h3><?=h($user->name)?></h3>

        </div>
          
    <!-- Sidebar -->
    <div class="sidebar">
     
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link bg-primary">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <i class="nav-icon fas fa-user text-light"></i>
            <?= $this->Html->link(__('All Users'), ['controller'=>'Users','action' => 'userIndex']) ?>
          </li>

          <li class="nav-item">
            <i class="nav-icon fas fa-user text-light"></i>
            <?= $this->Html->link(__('All Posts'), ['controller'=>'Users','action' => 'allPost']) ?>
          </li>

          <li class="nav-item">
            <i class="nav-icon fas fa-user text-light"></i>
            <?= $this->Html->link(__('View Profile'), ['controller'=>'Admin','action' => 'profile',$user->id]) ?>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  