<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "qlbh");
mysqli_set_charset($conn, "utf8");
$quantity = isset($_GET["quantity"]) ? $_GET["quantity"] : 1;
$action = isset($_GET["action"]) ? $_GET["action"] : "No";
if (isset($_GET["id"])) {
    $id = $_GET["id"];


    $query = mysqli_query($conn, "SELECT * FROM product WHERE id = '$id'");

    if ($query) {
        $a = mysqli_fetch_assoc($query);

        if ($action == "No") {

            if (isset($_SESSION['cart']["$id"])) {
                $_SESSION['cart']["$id"]["quantity"] += 1;
            } else {
                $_SESSION['cart']["$id"] = $a;
                $_SESSION['cart']["$id"] = [
                    'id' => $a["id"],
                    'name' => $a["name"],

                    'image' => $a["image"],
                    'content' => $a["content"],
                    'price' => isset($a["sale_price"]) ? $a["sale_price"] : $a["price"],
                    'quantity' => 1,

                ];
                header('location:cart.php');
            }
        } if ($action == "update") {
            if ($quantity > 0) {
                if (isset($_SESSION['cart']["$id"])) {
                    $_SESSION['cart']["$id"]["quantity"] = $quantity;
                }
            } else {
                $_SESSION['cart']["$id"]["quantity"] = 1;
            }
        } if($action =="delelte") {
            if (isset($_SESSION['cart']["$id"])) {
                session_unset($_SESSION['cart']["$id"]);
               
                
                
            }
        }






        // session_destroy();
        header('location:cart.php');
    } else {

        echo "<script type='text/javascript'>alert('hết hàng');</script>";
        header('location:index.php');
    }
}
