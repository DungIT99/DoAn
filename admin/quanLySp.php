<?php
include("header.php");
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    $conn = mysqli_connect("localhost", "root", "", "qlbh");
    mysqli_set_charset($conn, "utf8");
    $product = mysqli_query($conn, 'SELECT * from product');
    // if (isset($_REQUEST['clickTk'])) {
    if (isset($_POST["timKiem"])) {
      $timKiem = $_POST["timKiem"];
      ?>


    <?php    }
  // }
  ?>
    <h2>quản lý SP</h2>
    <hr />
    <form action="" method="post">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <input type="text" name="timKiem" id="input" class="form-control">
      </div>


      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <input type="submit" class="btn btn-primary" value="submit" name="clickTk">
      </div>

      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <a href="themMoiDm.php"><input type="button" class="btn btn-primary" value="thêm mới"></a>
      </div>
    </form>


    <table class="table table-hover">
      <thead>
        <tr>
          <th>id</th>
          <th>ten </th>
          <th>ảnh</th>
          <th>nội dung</th>
          <th>giá </th>
          <th>giá sale</th>
          <th>trạng thái</th>
          <th>ngày tạo</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($product as $pro) {

          ?>
          <tr>
            <td><?php echo $pro['id'] ?></td>
            <td><?php echo $pro['name'] ?></td>
            <td><?php echo $pro['image'] ?></td>
            <td><?php echo $pro['content'] ?></td>
            <td><?php echo $pro['category_id'] ?></td>
            <td><?php echo $pro['price'] ?></td>
            <td><?php echo $pro['sale_price'] ?></td>
            <td><?php if ($pro['status'] == 1) : ?>
                <span>hiển thi </span>
              <?php else : ?>
                <span>ẩn</span>
              <?php endif ?>
            </td>
            <td> <a href="xoaSp.php?id=<?php echo $pro['id'] ?>">xóa</a></td>
            <td> <a href="suaSp.php?id=<?php echo $pro['id'] ?>">sửa</a></td>
          </tr>
        <?php  } ?>

      </tbody>
    </table>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include("footer.php");
?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/adminlte.min.js"></script>
</body>

</html>