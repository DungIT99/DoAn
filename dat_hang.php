<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "qlbh");
    mysqli_set_charset($conn, "utf8");
    // echo "<pre>";
    // print_r($_SESSION["login"]);
    if (isset($_SESSION["login"])) {
        $login = $_SESSION["login"];
        $accountId = $login["id"];
        // echo "<pre>";
        // print_r( $accountId);
        if ($accountId) {
            $a = mysqli_query($conn, "INSERT INTO orders(account_id) VALUES ('$accountId')");
            $e = mysqli_insert_id($conn);
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION["cart"];
                foreach ($cart as $ca) {
                    $id = $ca["id"];
                    $b = ($_SESSION['cart'][$id]);
                    // echo "<pre>";
                    // print_r($b);
                    $product_id = $b["id"];
                    $product_quantity = $b["quantity"];
                    $price = $b["price"];
                    $c = mysqli_query($conn, "INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`) VALUES ('$e','$product_id','$product_quantity',' $price')");
                    if ($c) {
                        // echo " thanh cong nhes";
                    } else {
                        echo "fail";
                    }
                }
            }
        }
    } else {
        echo " k có tài khan login";
    }





    ?>
    <div class="container">
        <?php if (isset($_SESSION["login"])) : ?>
            <form action="" method="post">
                <legend>tai khoan cua ban</legend>
                <div class="form-group">
                    <label for="">email</label>
                    <input type="text" class="form-control" id="" placeholder="Input field" name="email" value="<?php echo $_SESSION['login']["email"] ?>">
                </div>

                <div class="form-group">
                    <label for="">name</label>
                    <input type="text" class="form-control" id="" placeholder="Input field" name="name" value="<?php echo  $_SESSION['login']["name"] ?>">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="click to verify your account ">
            </form>
        <?php else : ?>
            <legend>ban chua dang nhap</legend>

        <?php endif; ?>
</body>

</html>