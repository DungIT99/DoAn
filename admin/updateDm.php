<?php
$conn = mysqli_connect("localhost", "root", "", "qlbh");
mysqli_set_charset($conn, "utf8");
if(isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["c"]) ){
    $name = $_POST["a"];
    $radio =  $_POST["b"];
    $id = $_POST["c"];
    $query = mysqli_query($conn, "UPDATE `category` SET `name` = '$name', `status` = '$status' WHERE `category`.`id` = $id" );
    echo json_encode($query);
}


// if (isset($_POST["submit"])) {
//     $id =  $_POST["id"];
//     $name = $_POST["namecate"];
//     $status = $_POST["status"];

//     echo $id;
//     echo $name;
//     echo $status;
    
//     $query = mysqli_query($conn, "UPDATE `category` SET `name` = '$name', `status` = '$status' WHERE `category`.`id` = $id" );
    
//     if($query){
//         header('location:quanLyDm.php');
//     } 
// } 
