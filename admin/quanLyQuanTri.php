

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
                        <a href="./quanLySp.php">

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

            <section class="content-header">
               
            <?php
        $conn = mysqli_connect("localhost", "root", "", "qlbh");
        mysqli_set_charset($conn, "utf8");
        $admin = mysqli_query($conn, "SELECT * FROM account WHERE level='1'");

        ?>

        <table class="table table-hover">
            <thead>
                <tr>

                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>address</th>
                    <th>created</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($admin as $ad) : ?>

                        <td> <?php echo $ad["name"] ?></td>
                        <td> <?php echo $ad["email"] ?></td>
                        <td> <?php echo $ad["phone"] ?></td>
                        <td> <?php echo $ad["address"] ?></td>
                        <td> <?php echo $ad["created"] ?></td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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




