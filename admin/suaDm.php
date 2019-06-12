

<?php 
include('header.php');
?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <?php
                    $conn = mysqli_connect("localhost", "root", "", "qlbh");
                    mysqli_set_charset($conn, "utf8");
                    if (isset($_GET["id"])) {
                        $id =  $_GET["id"];
                        // echo $id;
                        $sql = mysqli_query($conn, "SELECT * FROM `category` WHERE id=$id");
                        $a = mysqli_fetch_assoc($sql);
                    }
                    ?>
                <form method="POST" role="form" class="myForm" >
                    <input type="hidden" value="<?php echo $id?>" name="id" id="idcate">
                   
                    <legend>sửa danh mục</legend>

                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control" placeholder="Input field" name="namecate" value="<?php echo $a["name"] ?>" id="nameCate">
                    </div>
                    <div class="form-group">
                        <label for="">Trang thai</label>

                        <div >
                            <label>
                                <input type="radio" class="radio" name="status"  class="input" value="0" checked=""> an  <br/>
                                <input type="radio"  class="radio" name="status" class="input" value="1" checked=""> hien
                            </label>
                        </div>
                    </div>
                    <input type="submit" id="btn" class="btn btn-primary" name="submit">
                </form>



            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php
        include("footer.php");
        ?>
 
    </div>
   <script>
   $(document).ready(function(){
       $("#btn").click(function(){
           var idcate = $("#idcate").val();
           var na = $("#nameCate").val();
           var ra = $(".radio").val();
           $.ajax({
               type:"post",
               url:"updateDm.php",
               data:{
                   a:na,
                   b:ra,
                   c:idcate,
               },
               success:function(data){
                   window.location.replace("quanLyDm.php");
               }

           })
       })
   })
   </script>
   
    <!-- <script src="js/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="js/adminlte.min.js"></script> -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>

</html>