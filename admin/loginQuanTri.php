<?php include("header.php");?>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "qlbh");
        mysqli_set_charset($conn, "utf8");


       
        $errors = [];
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            if ($email == "") {
                $errors["email"] = "user email not null";
            }
            if ($password == "") {
                $errors["password"] = "password not null";
            }
            if (count($errors) == 0) {
                $query = mysqli_query($conn, "SELECT * from account WHERE email='$email'and level='1'");
                // echo "<pre>";
                // print_r($query);
                if (mysqli_num_rows($query) == 1) {
                    $q = mysqli_fetch_assoc($query);
                    $verify = password_verify($password, $q["password"]);
                    if ($verify) {
                        $_SESSION["loginAdmin"] = $q;
                        header('location:index.php');
                    } else {
                        $errors["errorpass"] = "password khong dung";
                    }
                } else {
                    $errors["errorEmail"] = "loi email";
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
                    <legend>đăng ký</legend>

                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" class="form-control" id="" placeholder="Input field" name="email">
                    </div>

                    <div class="form-group">
                        <label for="">password</label>
                        <input type="text" class="form-control" id="" placeholder="Input field" name="password">
                    </div>


                    <button type="submit" class="btn btn-primary" value="submit" name="submit"> submit </button>
                </form>
                <br/>
               <a href="dangKyAdmin"> <button type="button" class="btn btn-success">Đăng Ký</button></a>
                




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