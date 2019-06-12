<?php
$conn = mysqli_connect("localhost", "root", "", "qlbh");
mysqli_set_charset($conn, "utf8");

if (isset($_POST["s"])) {
    $search = $_POST["s"];
    echo $search;
    $sql = mysqli_query($conn, " SELECT * FROM category WHERE name LIKE '%$search%'");
  
    echo json_encode($sql);
}
