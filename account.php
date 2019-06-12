<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>

</head>

<body>
    <?php
    
  $conn = mysqli_connect("localhost","root","","qlbh");
  mysqli_set_charset($conn,"utf8");
    $name =  isset($_POST["name"]) ? $_POST["name"]:"" ;
    $email = isset($_POST["email"])?$_POST["email"]:"";
    $phone = isset($_POST["phone"])?$_POST["phone"]:"";
    $password = isset($_POST["password"])?$_POST["password"]:"";
    $address = isset($_POST["address"])?$_POST["address"]:"";
    if(isset($_POST["submit"])){
        $errors = [];
   if($name == ""){
        $errors["name"] = "name is null";
   }
  
    if ($email == "") {
        $errors["email"] = "email is null";
    }
   
    if ($phone == "") {
        $errors["phone"] = "PHONE is null";
    }
  
    if ($password == "") {
        $errors["password"] = "PASS is null";

    }
   
    if ($address == "") {
        $errors["address"] = "ADDREss is null";
    }
    
$passwordhash = password_hash("$password", PASSWORD_BCRYPT);
var_dump($passwordhash);
$sql = "INSERT INTO `account` ( `name`, `email`, `phone`, `password`, `address`) VALUES ('$name','$email','$phone','$passwordhash','$address')";
$a = mysqli_query($conn,$sql);
if($a){
    echo 'thanhncng';
}else{
    echo 'loi';
}
}



    ?>
    <div class="container">
        <?php if(count($errors)): foreach ($errors as $k => $error) : ?>
        
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><?php echo $k ?></strong> <?php echo $error ?>
            </div>
        <?php endforeach; ?> <?php endif ?>

        <form action="" method="POST" role="form">
            <legend>Form đăng kí</legend>

            <div class="form-group">
                <label for="">full name</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="name">
            <?php if($name =="") echo "name is null"?>
    

            </div>
            <div class="form-group">
                <label for="">email</label>
                <input type="email" class="form-control" id="" placeholder="Input field" name="email">
            </div>
            <div class="form-group">
                <label for="">phone</label>
                <input type="number" class="form-control" id="" placeholder="Input field" name="phone">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="password" class="form-control" id="" placeholder="Input field" name="password">
            </div>
            <div class="form-group">
                <label for="">address</label>
                <input type="text" class="form-control" id="" placeholder="Input field" name="address">
            </div>


            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    </div>

</body>

</html>