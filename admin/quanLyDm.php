<?php
$conn = mysqli_connect("localhost", "root", "", "qlbh");
mysqli_set_charset($conn, "utf8");
$category = mysqli_query($conn, 'select * from category');
?>
<?php 
include('header.php');
?>
    <div class="content-wrapper">
      <section class="content-header">
        <?php

        if (isset($_POST["clickTk"])) {
          $timKiem = $_POST["timKiem"];
          $res =  mysqli_query($conn, "SELECT * from category where name like '%$timKiem%'");
          $a = mysqli_fetch_assoc($res);
          //  echo '<pre>';
          //  print_r ($a);
          //  echo '</pre>';
         
          ?>
         

        <?php    }
      // }
      ?>
        <h2>quản lý danh mục </h2>
        <hr />
        <form action="" method="post">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <input type="text" name="timKiem" id="inputSearch" class="form-control">
          </div>


          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <input type="button" class="btn btn-primary" value="Tìm kiếm" id="clickMe" name="clickTk">
          </div>

          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <a href="themMoiDm.php"><input type="button" class="btn btn-primary" value="thêm mới"></a>
          </div>
        </form>

        <div id="updateNe">
          <table class="table table-hover " id="my-table">
            <thead>
              <tr>
                <th>id</th>
                <th>ten danh muc</th>
                <th>ngày tạo</th>
                <th>trạng thái</th>
                <th>xoa </th>
                <th>thêm</th>
              </tr>
            </thead>
            <tbody>

              <?php
              foreach ($category as $cate) {
                ?>

                <tr id="render">
                  <td><?php echo $cate["id"] ?></td>
                  <td><?php echo $cate["name"] ?></td>
                  <td><?php echo $cate["created"] ?></td>
                  <td><?php echo $cate["status"] ?></td>
                  <td class="xoa" tt="<?php echo $cate["id"] ?>">xoa</td>
                  <td> <a href="suaDm.php?id=<?php echo $cate["id"] ?>">Sửa</a></td>
                </tr>

              <?php  } ?>

            </tbody>
          </table>
        </div>
      </section>
      <!-- /.content -->

      <!-- /.content-wrapper -->
    </div>

    <?php
    include("footer.php");
    ?>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->

  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/adminlte.min.js"></script>


  <script>
    $(document).ready(function() {

      $(".xoa").click(function() {
        var a = $(this).attr("tt");
        alert(location.href);
        $.ajax({
          type: "post",
          url: "controller_Dm.php",
          data: {
            a: a
          },

          success: function(data) {
            alert(location.href);
            $('#updateNe').load(location.href + ' #my-table');
          }
        });
      });
      $("#clickMe").click(function(){
        var search = $(this).val();
        // console.log(search);
        $.ajax({
          type:"post",
          url:"search.php",
          data :{
            s : search,
          },success : function(data){
            console.log(data);
            $('#updateNe').load(location.href + ' #my-table');
          }
        })
      })
    })
  </script>

</body>

</html>