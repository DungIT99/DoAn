<?php 
$conn = mysqli_connect("localhost","root","","qlbh");
mysqli_set_charset($conn,"utf8");
$product_id = isset($_POST["id"])?$_POST["id"]:0;
$images = mysqli_query($conn,"SELECT * FROM `product_image` WHERE 'product_id' = $product_id");
$pro = mysqli_fetch_assoc($images);
if($pro){
    unlink('./public/images/'.$pro["image"]);
}else{
    echo "fail";
}

$c = mysqli_query($conn,"DELETE FROM product WHERE 'product_id' = $product_id");


// header('location:quanLySp.php');
?>