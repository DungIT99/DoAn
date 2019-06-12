<?php
        $conn = mysqli_connect("localhost", "root", "", "qlbh");
        mysqli_set_charset($conn, "utf8");
     
       if(isset($_POST["namett"])){
           $namett = $_POST["namett"];
           $valuett = $_POST["valuett"];
           $typett = $_POST["typett"];
       }
      $atts=  mysqli_query($conn,"INSERT INTO attribute(name,value,type) VALUES ('$namett','$valuett','$typett')");
if($atts){
   header('location:attribute.php');

}else{
echo "lỗi";
}
         ?>