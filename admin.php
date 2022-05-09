<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>ADMIN</title>
</head>

<body>
    <!-- CHỖ NÀY LÀ HEADER -->
    <?php
        require_once "db_module.php";
        include "header.php";
        $link = null;
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
                        <a class="nav-link active" aria-current="page" href="/"><i class="fas fa-home">Trang chủ</i></a>
                    </li>
                    <?php
                        include "menu.php";
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card text-center" style="margin-top: 25px;">
        <div class="row">
            <div class="col-sm-6" style="margin-top: 25px; margin-bottom: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản Lý Sản Phẩm</h5>
                        <a href="./add.php" class="btn btn-outline-primary">Quản Lý Sản Phẩm</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="margin-top: 25px; margin-bottom: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản Lý Danh Mục</h5>
                        <a href="./add_catelogy.php" class="btn btn-outline-secondary">Quản Lý Danh Mục</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card text-center" style="margin-top: 25px;">
        <div class="row">
            <div class="col-sm-6" style="margin-top: 25px; margin-bottom: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản Lý Account</h5>
                        <a href="./AddAccount.php" class="btn btn-outline-primary">Quản Lý Account</a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-6" style="margin-top: 25px; margin-bottom: 25px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản Lý Danh Mục</h5>
                        <a href="./add_catelogy.php" class="btn btn-outline-secondary">Quản Lý Danh Mục</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
<!-- CHỖ NÀY LÀ FOOTER -->
        <?php
            include("footer.php");
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="./javascript.js"></script>
</body>

</html>