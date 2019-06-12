<?php
        $conn = mysqli_connect("localhost", "root", "", "qlbh");
        mysqli_set_charset($conn, "utf8");
        $attr = mysqli_query($conn,"SELECT * FROM `attribute`");
    //    echo "<pre>";
       var_dump($attr);
    //    echo "</pre>";
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

    <?php
    include("header.php")
    ?>
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
            <a href="./attribute.php">

              <i class="fa fa-th"></i> <span>quản lý sp</span>

            </a>
          </li>
          <ul>
            <li><a href=""><i class="fa fa-circle-o"></i> dah sách sp</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> thêm sp</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> xoa sp</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> dsnh mục sp</a></li>
          </ul>
          </li>
          <li>
            <a href="">
              <i class="fa fa-th"></i> <span>quản lý đươn hàng</span>
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
    </aside>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      
      
        <h2>quản lý thuoocj tinh </h2>
        <hr />
        <form action="" method="post">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <input type="text" name="timKiem" id="input" class="form-control">
          </div>


          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <input type="submit" class="btn btn-primary" value="submit" name="clickTk">
          </div>

          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
           <a href="themMoiTt.php"><input type="button" class="btn btn-primary" value="thêm mới"></a> 
          </div>
        </form>


        <table class="table table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>ten thuộc tính </th>
              <th>gia tri thuộc tính</th>
              <th>kiểu thuộc tính</th>
            
            
            </tr>
          </thead>
          <tbody>
        <?php foreach($attr as $att){ ?>
              <tr>
                  
                <td> <?php echo $att["id"] ?></td> 
                <td> <?php echo $att["name"] ?></td> 
                <td> <?php echo $att["value"] ?></td> 
                <td> <?php  echo $att["type"] ?></td> 
                <td>xoa</td>
                <td>sua</td>
                 
              </tr>
              <?php } ?>
          </tbody>


        </table>
      </section>
      <!-- /.content -->
    </div>
    


    <?php
    include("footer.php");
    ?>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/adminlte.min.js"></script>
</body>

</html>