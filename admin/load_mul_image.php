<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
    $image='';
    if(!empty($_FILES["image"]["name"])){
        $f = $_FILES["image"];
        $f_name = time().'-'.$f["name"];
       if(move_uploaded_file($f['tmp_name'],'./public/images/'.$f_name)){
           $image = $f_name;
       }
}
    ?>
    <form action="" method="POST" enctype="multipart/form-date">
        <input type="file" name="image[]" id="" multiple >
    </form>
</body>

</html>