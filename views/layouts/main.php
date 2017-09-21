<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
    
<!--un sidebar-collapse -->
  <body class="hold-transition skin-green sidebar-mini">
  <?php $this->beginBody() ?>
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>JD</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SI</b>JADIK</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>         
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
                <a> Sri Wahyuni </a>
              </li>
              <li>
                <a href="#" class="btn-danger"><i class="fa fa-sign-out text-default" ></i> <span class="text-default">Sign Out</span></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/makara.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Fak. Kedokteran Gigi</p>
              <a>UNIVERSITAS INDONESIA</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">SIAK PERIODE 2017/2018 - 1</li>
            <!-- Optionally, you can add icons to the links -->
            <li>
              <a href="#"><i class="fa fa-graduation-cap"></i> <span>S-1</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="s-1/fasilitator/index.html">Narasumber</a></li>
                <li><a href="s-1/fasilitator/index.html">Fasilitator</a></li>
                <li><a href="s-1/skills-lab/index.html">Skills Lab</a></li>
                <li><a href="s-1/pemberian-kuril/index.html">Pemberian Kuril</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-stethoscope"></i> <span>Profesi</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="profesi/klinik/index.html">Klinik</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-user-md"></i> <span>Spesialis</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="spesialis/kuliah/index.html">Kuliah</a></li>
                <li><a href="spesialis/draft/index.html">Draft</a></li>
                <li><a href="spesialis/cs-sr-j/index.html">CS / SR / J</a></li>
                <li><a href="spesialis/klinik/index.html">Klinik</a></li>
                <li><a href="spesialis/pemberian-kuril/index.html">Pemberian Kuril</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-graduation-cap"></i> <span>S-2</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="s-2/kuliah/index.html">Kuliah</a></li>
                <li><a href="s-2/seminar/index.html">Seminar</a></li>
                <li><a href="s-2/pemberian-kuril/index.html">Pemberian Kuril</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-graduation-cap"></i> <span>S-3</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="s-3/kuliah/index.html">Kuliah</a></li>
                <li><a href="s-3/publishing/index.html">Publishing</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sistem Informasi
                <small>JADWAL AKADEMIK DOSEN</small>
            </h1>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>
        <section class="content">
            <div class="box box-solid">
                <div class="content">
                    <?= $content ?>
                </div>
            </div>
        </section>
      </div><!-- /.content-wrapper -->
      
      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          SDM FKG UI
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2017 <a href="http://www.ui.ac.id/">Universitas Indonesia</a></strong>
      </footer>
    
    </div><!-- ./wrapper -->


    <?php $this->endBody() ?>
  </body>

</html>
<?php $this->endPage() ?>
