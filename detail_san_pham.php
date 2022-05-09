<?php
require_once "db_module.php";
$link = null;
taoKetNoi($link);
if (!empty($_GET['detailid'])) {
    $detail_id = $_GET['detailid'];
    $result_sp_detail = chayTruyVanTraVeDL($link, "SELECT * FROM product WHERE id= '$detail_id'");
    $row_sp_detail = mysqli_fetch_assoc($result_sp_detail);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row_sp_detail['name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <link href="./fontawesome-free-5.15.4-web/css/fontawesome.css" rel="stylesheet" />
    <link href="./fontawesome-free-5.15.4-web/css/brands.css" rel="stylesheet" />
    <link href="./fontawesome-free-5.15.4-web/css/solid.css" rel="stylesheet" />
</head>

<body>
    <!-- CHỖ NÀY LÀ HEADER -->
    <?php
        require_once("db_module.php");
        include("header.php");
        $link=null;
        taoKetNoi($link);
    ?>
    <!-- CHỖ NÀY LÀ THANH MENU -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home">Trang
                                chủ</i></a>
                    </li>
                    <?php
             include("menu.php");
          ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row g-0">

            <div class="col-md-4">
                <img src="img/danhmuc/<?php echo $row_sp_detail['img']; ?>" class="img-fluid card-img-top" alt="" width="500px" height="500px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="description">
                        <div class="row">
                            <div class="offer-box">
                                <h3 class="product-title card-title"><?php echo $row_sp_detail['name']; ?></h3>
                                <p class="product-description">
                                    🚚 Miễn phí giao hoa nhiều khu vực TPHCM: Quận 1, 3, 4, 5, 6, 7, 8, 10, 11, Tân
                                    Bình, Tân Phú, Bình Thạnh, Phú Nhuận<br>
                                    💌 Tặng ngay 1 banner hoặc 1 tấm thiếp cực xinh trị giá đến 50k<br>
                                    🎁 ĐƠN HÀNG ĐẦU TIÊN<br>
                                    🔥 Giảm ngay 50k cho đơn hàng > 600k <br>
                                    🔥 Giảm ngay 25k cho đơn hàng < 600k <br>
                                        ⏳ Giao hàng nhanh trong vòng 3 tiếng<br>
                                </p>
                            </div>
                            <div class="rating text-warning mt-3">

                            </div>

                            <div class="row text-center align-item-center">
                                <div class="col-3">
                                    <h3>Giá bán </h3>
                                    <p class="price"><?php echo $row_sp_detail['price']; ?> VND</p>
                                </div>
                                <div class="col-3">
                                    <h3>Số lượng</h3>
                                    <div class="product-quantity" style="display: inline-block;">
                                        <div class="d-flex">
                                            <button class="minus-item input-group-addon btn-minus-plus btn-danger"
                                                data-name="2"></button>
                                            <input type="number" value="1" min="1" max="10" name="number_before">
                                            <button class="plus-item btn-minus-plus btn-danger input-group-addon"
                                                data-name="1"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <br>
                                    <button type='button' class='add-to-cart btn btn-danger align-item-center add-cart'>THÊM VÀO GIỎ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="intro">
                    <h3>Mô tả</h3>
                    <?php echo $row_sp_detail['mo_ta']; ?>
                </div>
                <div class="text-center">
                    <img src="img/danhmuc/<?php echo $row_sp_detail['img']; ?>" class="rounded" alt="...">
                </div>
            </div>
            <div class="box-heading">
                <h4>CÓ THỂ BẠN SẼ THÍCH</h4>
            </div>
            <hr>
            <!--product-->
            <?php
                $result_sp_limmit = chayTruyVanTraVeDL($link, "SELECT * FROM product LIMIT 4");
            ?>

            <?php
                while($row_sp_limmit=mysqli_fetch_assoc($result_sp_limmit)) {
                    echo "
                    <div class='gallery'>
                        <img src='img/danhmuc/".$row_sp_limmit['img']."' alt='".$row_sp_limmit['name']."' width='400' height='267'>
                        <div class='desc'>
                            <div class='right'>
                                <div class='name'><a href=''>".$row_sp_limmit['name']."</a></div>
                                <div class='price'>".$row_sp_limmit['price']."VND</div>
                                <div class='buynow-button btn btn-danger'>
                                    <a href='detail_san_pham.php?detailid=".$row_sp_limmit['id']."'>Đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>
    <?php
        include_once("modal_cart.php");
    ?>
    <!-- CHỖ NÀY LÀ FOOTER -->
    <?php
        include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="./javascript.js"></script>
</body>
<script src="cart.js"></script>
</html>