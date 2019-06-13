
<?php
ob_start();
session_start();
if($_SESSION["loginAdmin"]){
  $e = $_SESSION["loginAdmin"];

}else{
  header('location:loginQuanTri.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/css/AdminLTE.css">
  <link rel="stylesheet" href="public/css/_all-skins.min.css">
  <link rel="stylesheet" href="public/css/style.css" />
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <ul class="nav navbar-nav navbar-right" style="margin-right: 10px">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">hello <?php echo $e["name"] ?><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Thông tin</a></li>
            <li><a href="logoutAdmin.php">Thoát tài khoản</a></li>
          </ul>
        </li>
       
      </ul>

    </nav>
  </header>
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="treeview">
            <a href="#">
            <i class="fa fa-home"></i> <span>Trang chủ</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          <li>
            <a href="./quanLySp.php">

              <i class="fa fa-th"></i> <span>Quản lý sản phẩm</span>
              
            </a>
          </li>
          <ul >
            <li><a href="./quanLySp.php"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
            <li><a href="./themMoiSp.php"><i class="fa fa-circle-o"></i> Thêm mới sản phẩm</a></li>
           
            <li><a href="./quanLyDm.php"><i class="fa fa-circle-o"></i> Quản lý danh mục</a></li>
            <!-- <li><a href="./SuaSp.php"><i class="fa fa-circle-o"></i> Sửa sản phẩm</a></li> -->
          </ul>
          </li>
          <li>
            <a href="../admin/cart.php">
              <i class="fa fa-th"></i> <span>quản lý đơn hàng</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">Hot</small>
              </span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="fa fa-th"></i> <span>quản lý khách hàng</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">Hot</small>
              </span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="fa fa-th"></i> <span>quản lý admin</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">Hot</small>
              </span>
            </a>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>