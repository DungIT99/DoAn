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
        <?php
       $conn = mysqli_connect("localhost","root","","qlbh");
       mysqli_set_charset($conn,"utf8");
       
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $repassword = $_POST["repassword"];

        $errors = [];


        if (isset($_POST["submit"])) {
            if ($name == "") {
                $errors["name"] = "user name not null";
            }
            if ($email == "") {
                $errors["email"] = "user email not null";
            }
            if ($phone == "") {
                $errors["phone"] = "user phone not null";
            }
            if ($password == "") {
                $errors["password"] = "password not null";
            }
            if ($repassword == "" and $repassword != $password) {
                $errors["repassword"] = " repassword not null and not match";
            }
            if(count($errors)==0){
                $sql= mysqli_query($conn, "INSERT INTO account(name,email,phone,password,level) VALUES ('$name','$email','$phone','$passwordHash','1')");
                if($sql){
                    echo " thanh cong";
                    header('location:quanLyQunaTri.php');
                }else{
                    echo "loi ne";
                }
            }
            
        }


        ?>
        <div class="content-wrapper">

            <section class="content-header">
                <?php if (count($errors) > 0) : foreach ($errors as $key => $value) : ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong><?php echo $key ?></strong> <?php echo $value ?>
                        </div>
                    <?php endforeach;
            endif; ?>

                <form action="" method="POST" role="form">
                    <legend>them moi quan tri vien</legend>

                    <div class="form-group">
                        <label for="">user name</label>
                        <input type="text" class="form-control" id="" placeholder="Input field" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" class="form-control" id="" placeholder="Input field" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">phone</label>
                        <input type="number" class="form-control" id="" placeholder="Input field" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="text" class="form-control" id="" placeholder="Input field" name="password">
                    </div>

                    <div class="form-group">
                        <label for=""> repassword </label>
                        <input type="text" class="form-control" id="" placeholder="Input field" name="repassword">
                    </div>



                    <button type="submit" class="btn btn-primary" value="submit" name="submit"> submit </button>
                </form>




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