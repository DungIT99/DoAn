<?php
$conn = mysqli_connect("localhost", "root", "", "qlbh");
mysqli_set_charset($conn, "utf8");
$product = mysqli_query($conn, "SELECT * FROM product");


?>

<section class="product-tab">
    <div class="container">
        <h2 class="title"><span>New Products</span></h2>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs pro-tabs text-center animation" role="tablist">
            <li class="active"><a href="#man" role="tab" data-toggle="tab">Man</a></li>
            <li><a href="#woman" role="tab" data-toggle="tab">Woman</a></li>
            <li><a href="#accesories" role="tab" data-toggle="tab">Accesories</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="man">
                <div class="row">
                    <?php foreach ($product as $a) : ?>
                        <div class="col-xs-6 col-sm-3 animation">
                            <div class="product">
                                <div class="product-thumb-info">
                                    <div class="product-thumb-info-image">
                                        <span class="product-thumb-info-act">
                                            <a href="javascript:void(0);" data-toggle="modal" data-target=".quickview-wrapper" class="view-product">
                                                    <span><i class="fa fa-external-link"></i></span>
                                                </a>
                                            <a href="./cart_controller.php?id=<?php echo $a["id"] ?>" class="add-to-cart-product">
                                                <span><i class="fa fa-shopping-cart"></i></span>
                                            </a>
                                        </span>
                                        <img alt="" class="img-responsive" src="./admin/public/images/<?php echo $a["image"] ?>">
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right"><?php echo $a["price"] ?> USD</span>
                                        <h4><a href="shop-product-detail2.html"><?php echo $a["name"] ?></a></h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        
        </div>
    </section>