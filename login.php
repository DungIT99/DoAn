<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <?php
    ob_start();
    $conn = mysqli_connect("localhost", "root", "", "qlbh");
    mysqli_set_charset($conn, "utf8");
    $errors=[];
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
  
    $pass = mysqli_query($conn,"SELECT password from account WHERE email ='$email'");
    // $a = "SELECT * FROM account WHERE email = '$email' and password ='$password'";
    $b = mysqli_fetch_assoc($pass);
    // var_dump($pass);
   $d= password_verify ( $password ,$b["password"]);
if($d){
    // header("location: ../index.php");
}else{
    $errors['ver']="tai= khgioab nat jau ko ddu";
}
    // $check=mysqli_query($conn,$a);
    

    // var_dump($check); 
    // var_dump(mysqli_num_rows($check));
    if (isset($_POST["submit"])) {
       
        if ($email == "") {
            $errors['email'] = "email khong duoc rong";
        }
        if ($password == "") {
            $errors['password'] = "password khong duoc rong";
        }
    }
    // password_verify ( string $password , string $hash )


    ?>

    <div class="container">

        <?php  if(count($errors)>0) : foreach($errors as $key => $er): ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?php echo $key ?></strong> <?php echo $er?>
                </div>
            <?php endforeach;
     endif?>


        <form action="" method="POST" role="form">
            <legend>Form login</legend>

            <div class="form-group">
                <label for="">email</label>
                <input type="email" name="email" class="form-control" id="" placeholder="Input field">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="text" name="password" class="form-control" id="" placeholder="Input field">
            </div>



            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

    </div>

</body>

</html>