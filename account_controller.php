<?php 
$errors = [];
    if(isset($_POST["submit"])){
   $name =  isset($_POST["name"]) ? $_POST["name"]:"" ;
   if($name == ""){
        $errors["name"] = "name is null";
   }
   $email = isset($_POST["email"])?$_POST["email"]:"";
    if ($email == "") {
        $errors["email"] = "email is null";
    }
   $phone = isset($_POST["phone"])?$_POST["phone"]:"";
    if ($phone == "") {
        $errors["phone"] = "PHONE is null";
    }
   $password = isset($_POST["password"])?$_POST["password"]:"";
    if ($password == "") {
        $errors["password"] = "PASS is null";
    }
   $address = isset($_POST["address"])?$_POST["address"]:"";
    if ($address == "") {
        $errors["address"] = "ADDREss is null";
    }
    
    
// if($errors==""){

// }

}
?>