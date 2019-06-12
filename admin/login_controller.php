<?php
$conn = mysqli_connect("localhost", "root", "", "qlbh");
mysqli_set_charset($conn, "utf8");


$email = $_POST["email"];
$password = $_POST["password"];
$errors = [];
if (isset($_POST["submit"])) {


    if ($email == "") {
        $errors["email"] = "user email not null";
    }
    if ($password == "") {
        $errors["password"] = "password not null";
    }
    if (count($errors) == 0) {
        $query = mysqli_query($conn, "SELECT * from account WHERE email='$email'");
        echo "<pre>";
        print_r($query);
        if (mysqli_num_rows($query) == 1) {
            $q = mysqli_fetch_assoc($query);
            $verify = password_verify($password, $q["password"]);
            if ($verify) {
                header('location:index.php');
            } else {
                $errors["errorpass"] = "password khong dung";
            }
        } else {
            $errors["errorEmail"] = "loi email";
        }
    }
}
