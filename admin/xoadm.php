<?php
$conn = mysqli_connect("localhost","root","","qlbh");
mysqli_set_charset($conn,"utf8");

$id = isset($_GET["id"])?$_GET["id"]:0;
$a = mysqli_query($conn,"DELETE FROM category WHERE id = $id");
if($a){
    header('location:quanLyDm.php');
}
else{
  echo  "lỗi xóa danh mục";
}

?>
