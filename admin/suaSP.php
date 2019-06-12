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

    $conn = mysqli_connect("localhost", "root", "", "qlbh");
    mysqli_set_charset($conn, 'utf8');
    $color = mysqli_query($conn, "SELECT * FROM attribute WHERE typett='color'");

    $size = mysqli_query($conn, "SELECT * FROM attribute WHERE typett='size'");
    $product_id  = isset($_GET["id"]) ? $_GET["id"] : 0;
    $attribute_id = mysqli_query($conn, "SELECT attribute_id from product_attribute WHERE product_id ='$product_id'");
    $c = [];
    foreach ($attribute_id as $att) {
        $c[] = $att["attribute_id"];
    }
    // var_dump($c);


    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $content = $_POST["content"];
        $category_id = $_POST["category_id"];
        $price = $_POST["price"];
        $sale_price = $_POST["sale_price"];
        $a = mysqli_query($conn, "UPDATE `product` SET `name` = '$name', `content` = '$content',`category_id` = '$category_id',`price` = '$price',`sale_price` = '$sale_price' WHERE `product`.`id` = '$product_id';");
        if ($a) {
            echo 'thanh cong';
        } else {
            echo 'loi';
        }
    }
    $d =  mysqli_query($conn, "DELETE FROM product_attribute WHERE product_id= '$product_id'");


    if (isset($_POST["color"])) {
        foreach ($_POST["color"] as $col) {
            mysqli_query($conn, "INSERT INTO product_attribute(product_id,attribute_id) VALUES('$product_id','$col')");
        }
    }
    if (isset($_POST["size"])) {
        foreach ($_POST["size"] as $siz) {
            mysqli_query($conn, "INSERT INTO product_attribute(product_id,attribute_id) VALUES('$product_id','$siz')");
            header('location:quanLySp.php');
        }
    }




    ?>
    <div class="container">
        <form action="" method="POST" role="form" enctype="multipart/form-data">
            <legend>Form title</legend>

            <div class="form-group">
                <label for="">name</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="name">
            </div>

            <div class="form-group">
                <label for="">content</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="content">
            </div>
            <div class="form-group">
                <label for="">category_id</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="category_id">
            </div>
            <div class="form-group">
                <label for="">price</label>
                <input type="number" class="form-control" id="" placeholder="Input field" name="price">
            </div>
            <div class="form-group">
                <label for="">sale_price</label>
                <input type="number" class="form-control" id="" placeholder="Input field" name="sale_price">
            </div>
            <div class="form-group">
                <label for="">image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">

                <label for="">color</label>

                <div class="checkbox">
                    <label>




                    </label>
                </div>
                <label for="">size</label>
                <div class="checkbox">
                    <label>
                        <?php foreach ($size as $si) { ?>

                            <input type="checkbox" name="size[]" <?php echo ((in_array($si['id'], $c)) ? 'checked' : 0); ?> value="<?php echo $si["id"] ?>"> <?php echo $si["valuett"] ?> <br />
                        <?php } ?>

                    </label>
                </div>
                <label for="">color</label>
                <div class="checkbox">
                    <label>
                        <?php foreach ($color as $cl) { ?>
                            <input type="checkbox" name="color[]" <?php echo ((in_array($cl['id'], $c)) ? 'checked' : 0); ?> value="<?php echo $cl["id"] ?>"> <?php echo $cl["valuett"] ?> <br />
                        <?php } ?>
                    </label>
                </div>


            </div>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>


</body>

</html>