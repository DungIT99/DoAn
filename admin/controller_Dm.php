<?php
$conn = mysqli_connect("localhost", "root", "", "qlbh");
mysqli_set_charset($conn, "utf8");
// $id = $_POST["a"];
// echo $id;
if(isset($_POST['a'])){
    $id = $_POST["a"];
    $test=mysqli_query($conn, "DELETE FROM `category` WHERE `id` = $id");
    echo json_encode($test);
}



?>
	