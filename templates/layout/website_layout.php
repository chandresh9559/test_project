<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CkTech: The Leading Website Development Company';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
    <?= $this->Html->css(['website/style','website/aos','website/bootstrap.min','website/plyr.min','website/swiper-bundle.min','website/glightbox.min']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
  
</head>
<body>
<?php 
// echo $this->Html->meta('csrf-token', $this->request->getAttribute('csrfToken')); 
?>
 

    <!-- <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/">Documentation</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>
        </div>
    </nav> -->
    <main class="main">
        <div class="container-fluid">
            <div style="margin-top: 100px;">
            <?= $this->Breadcrumbs->render() ?>
            </div>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            
            
        </div>
    </main>
    <footer>
    
    </footer>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <?= $this->Html->script([
            // 'website/jquery',
            // 'website/validate_plugin',
            // 'website/custom',
            'website/aos',
            'website/validate',
            'website/swiper-bundle.min',
            'website/isotope.pkgd.min',
            'website/glightbox.min',
            'website/bootstrap.bundle',
            'website/purecounter_vanilla',
            'website/main',
        ]);
    ?>
     
    <?= $this->fetch('script') ?>
</body>
</html>
