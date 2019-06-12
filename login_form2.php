<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <?php

    $conn = mysqli_connect("localhost", "root", "", "qlbh");
    mysqli_set_charset($conn, "utf8");
    session_start();
    $errors = [];
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $a = mysqli_query($conn, "SELECT * FROM account WHERE email ='$email'");
    // var_dump($a);


    if (mysqli_num_rows($a)) {
        $row = mysqli_fetch_assoc($a);
        // echo $pass["password"];
        if (!password_verify($password, $row["password"])) {
            $errors["loi"] = "email hoac mat khau khong chinhs sac";
        } else {
            $_SESSION['login'] = $row;
            // die();
            // //   muốn xoa session dùng sesion_detroy();
            // echo "<pre>";
            // print_r($_SESSION["login"]);
            //  $_SESSION['login'];
            //   header('location:hello_admin.php');
        }
    }


    if (isset($_POST["submit"])) {

        if ($email == "") {
            $errors["email "] = "email k dc bo trong";
        }
        if ($password == "") {
            $errors["password"] = "password khong dc de trong";
        }
    }

    ?>

    <div class="container">
        <?php if (count($errors) > 0) : foreach ($errors as $key => $value) : ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?php echo $key ?></strong><?php echo $value ?>
                </div>
            <?php endforeach;
    endif; ?>

        <form action="" method="POST" role="form">
            <legend>Form login</legend>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="email">
            </div>

            <div class="form-group">
                <label for="">Pass</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="password">
            </div>



            <input type="submit" class="btn btn-primary" name="submit" value="submit">
        </form>

    </div>

</body>

</html>