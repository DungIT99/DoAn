<?php
session_start();
$gh = isset($_SESSION['cart']) ? $_SESSION['cart'] : 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            vertical-align: middle;
        }

        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control {
                width: 20%;
                display: inline !important;
            }

            .actions .btn {
                width: 36%;
                margin: 1.5em 0;
            }

            .actions .btn-info {
                float: left;
            }

            .actions .btn-danger {
                float: right;
            }

            table#cart thead {
                display: none;
            }

            table#cart tbody td {
                display: block;
                padding: .6rem;
                min-width: 320px;
            }

            table#cart tbody tr td:first-child {
                background: #333;
                color: #fff;
            }

            table#cart tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: inline-block;
                width: 8rem;
            }



            table#cart tfoot td {
                display: block;
            }

            table#cart tfoot td .btn {
                display: block;
            }

        }
    </style>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>


    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>

                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>

            </thead>
            <tbody>

                <?php $total = 0; ?>
                <?php foreach ($gh as $b) : ?>
                    <?php $c = $b["price"] * $b["quantity"];

                    $total += $c;

                    ?>



                    <tr>

                        
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="./admin/public/images/<?php echo $b["image"] ?>" class="img-responsive" /></div>
                                    <div class="col-sm-10">
                                        <h4 class="nomargin"><?php echo $b["name"] ?></h4>
                                        <p><?php echo $b["content"] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">$<?php echo $b["price"] ?></td>
                            <td data-th="Quantity">
                                <form action="cart_controller.php" method="get" >
                                    
                                    <input type="number" name="quantity" class="form-control text-center" value="<?php echo $b["quantity"] ?>">
                                    <input type="hidden" name="id" value="<?php echo $b["id"] ?>">
                                    <input type="hidden" value="update" name="action">
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash-o"></i></button> 
                                </form> 
                            </td>
                            <td data-th="Subtotal" class="text-center"><?php echo $b["price"] * $b["quantity"] ?></td>
                            <td class="actions">
                         
                        
                         
                       <a href="cart_controller.php?action=delete">  <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="fa fa-trash-o"></i></button></a>
                         </form>
                         
                               
                            </td>
                       
                    </tr>


                <?php endforeach; ?>
               

            </tbody>
            <tfoot>

                <tr>
                    <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total $<?php echo $total; ?></strong></td>
                    <td><a href="dat_hang.php" class="btn btn-success btn-block">Đặt hàng <i class="fa fa-angle-right"></i></a></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>