<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <link href="./fontawesome-free-5.15.4-web/css/fontawesome.css" rel="stylesheet" />
    <link href="./fontawesome-free-5.15.4-web/css/brands.css" rel="stylesheet" />
    <link href="./fontawesome-free-5.15.4-web/css/solid.css" rel="stylesheet" />
    <title>Document</title>
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
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home">Trang chủ</i></a>
                    </li>
                    <?php
                        include("menu.php");
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- MỌI NGƯỜI CODE PHẦN CHÍNH VÀO CHỖ NÀY NHA -->
    <div class="main">
        <?php
            include_once ("san_pham.php");

            include_once("modal_cart.php");
        ?>
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