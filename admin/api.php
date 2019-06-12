<?php
header("Content-Type: application/json");
$conn = mysqli_connect("localhost", "root", "", "qlbh");
mysqli_set_charset($conn, "utf8");
$category = $conn -> query("SELECT * from category");
$cat=[];
foreach($category as $a){
    $cat[]= $a;
}

echo json_encode($cat);
?>
