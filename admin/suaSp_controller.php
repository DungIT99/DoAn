<?php

$conn = mysqli_connect("localhost", "root", "", "qlbh");
mysqli_set_charset($conn, 'utf8');
$color = mysqli_query($conn, "SELECT * FROM attribute WHERE typett='color'");

$size = mysqli_query($conn, "SELECT * FROM attribute WHERE typett='size'");
$product_id  = isset($_GET["id"]) ? $_GET["id"] : 0;
$attribute_id = mysqli_query($conn, "SELECT attribute_id from product_attribute WHERE product_id ='$product_id'");
// echo '<pre>';
// print_r($attribute_id);
// echo '</pre>';
// foreach ($attribute_id as $att) {
//     echo '<pre>';
//     print_r($att["attribute_id"]);
//     echo '</pre>';
// }


if(isset($_POST["name"])){
$name = $_POST["name"];
$content = $_POST["content"];
$category_id = $_POST["category_id"];
$price = $_POST["price"];
$sale_price = $_POST["sale_price"];
var_dump($_POST['color']);
$a= mysqli_query($conn,"UPDATE `product` set `name`='$name', `category_id`='$category_id', `price`='$price', `sale_price`='$sale_price' WHERE id='$product_id'");
if($a){
  $c=  mysqli_query($conn, "DELETE * FROM product_attribute WHERE product_id= '$product_id'");
    if($c){
        echo 'thanh cong';
    }
    foreach($_POST["color"] as $col){
     mysqli_query($conn,"INSERT INTO product_attribute(product_id,attribute_id) VALUES('$product_id','$col')");
   
    
    }
    foreach($_POST["size"] as $siz){
     mysqli_query($conn,"INSERT INTO product_attribute(product_id,attribute_id) VALUES('$product_id','$siz')");
     header('location:quanLySp.php');
    }
}
}




?>