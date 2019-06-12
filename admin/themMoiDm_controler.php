<?php
$conn = mysqli_connect("localhost", "root", "", "qlbh");
mysqli_set_charset($conn, "utf8");

if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $created = $_POST["created"];
    $tes = "INSERT INTO `category` (`id`, `name`, `parent_id`, `status`, `ordering`, `created`) VALUES (NULL, '$name', '0', '1', '0', '$created')";
    // $tes = "INSERT INTO category('name',created) VALUES('$name','$created')";

    mysqli_query($conn, $tes);
    if (mysqli_query($conn, $tes));
    header('location:themMoiDm.php');
} else {
    echo 'looix';
}
