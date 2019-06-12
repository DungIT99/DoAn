<?php
session_start();

if(isset($_SESSION["login"])){
    $u = $_SESSION["login"];
    echo "<pre>";
    print_r($u["name"]);
}
// muốn hủy tạo thêm logout rồi sesion_start();
// session_destroy()
?>
