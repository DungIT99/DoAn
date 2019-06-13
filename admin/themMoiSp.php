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
    mysqli_set_charset($conn, "utf8");
    $attribute_color = mysqli_query($conn, "SELECT * FROM attribute WHERE type ='color'");
    $attribute_size = mysqli_query($conn, "SELECT * FROM attribute WHERE type ='size'");
    $image = '';


    if (!empty($_FILES["image"]["name"])) {
        $f = $_FILES["image"];
        $f_name = time() . "-" . $f["name"];
        if (move_uploaded_file($f['tmp_name'], './public/images/' . $f_name)) {
            $image = $f_name;
        }
    }
    $elImage = [];
    if (!empty($_FILES["else_image"]["name"])) {
        $fs = $_FILES["else_image"];
        $count = count($fs["name"]);
        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {
                $fs_name = time() . "-" . $fs["name"][$i];
              
                if (move_uploaded_file($fs["tmp_name"][$i], './public/images/' . $fs_name)) {
                    $elImage[] = $fs_name;
                   
                }
            }
        }
    }


    if (isset($_POST["name"])) {
        // var_dump($_POST['color']); die;
        $name = $_POST['name'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $sale_price = $_POST['sale_price'];
        // foreach($_POST["color"] as $color){
        //     echo $color;
        // }
        // die;

        $a = mysqli_query($conn, "INSERT INTO `product` ( `name`, `image`, `category_id`, `price`, `sale_price`, `created`) VALUES ( '$name', '$image', '$category_id', '$price', '$sale_price', CURRENT_TIMESTAMP)");
        if ($a) {
            $product_id = mysqli_insert_id($conn);

            foreach ($_POST["color"] as $color) {

                mysqli_query($conn, "INSERT INTO product_attribute(product_id,attribute_id) VALUES('$product_id','$color')");
            }
            foreach ($_POST["size"] as $color) {
                mysqli_query($conn, "INSERT INTO product_attribute(product_id,attribute_id) VALUES('$product_id','$color')");
            }
            header('location:quanLySp.php');
            foreach ($elImage as $el) {
                $test =  mysqli_query($conn, "INSERT INTO `product_image` ( `product_id`, `image`) VALUES ( '$product_id', '$el')");
                if ($test) {
                    echo "nhieu anh thanh cong";
                } else {
                    echo "nhieu anh fail r nhes";
                }
            }
        } else {
            echo "loi";
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
            <div id="showImage"> </div>
            <div class="form-group">
                <label for="">image khac</label>
                <input type="file" name="else_image[]" class="form-control" multiple>
            </div>
            <div class="form-group">
                <label for="">color</label>
                <div class="checkbox">
                    <?php foreach ($attribute_color as $cl) { ?>
                        <label>
                            <input type="checkbox" value="<?php echo $cl["id"] ?>" name="color[]"><?php echo $cl["value"] ?> <br />
                        </label>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">size</label>
                <div class="checkbox">
                    <?php foreach ($attribute_size as $si) { ?>
                        <label>
                            <input type="checkbox" name="size[]" value="<?php echo $si["id"] ?> "><?php echo $si["value"] ?>;

                        </label>
                    <?php } ?>
                </div>
            </div>
            <input type="submit" value="submit">
        </form>
    </div>


</body>

</html>