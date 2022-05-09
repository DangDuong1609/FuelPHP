<?php
    $result = mysqli_query($link, 'select count(id) as total from product');
	// var_dump($result);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 4;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;
    $result_sp_pagination = mysqli_query($link, "SELECT * FROM product LIMIT $start, $limit");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="main mt-3">
        <div class="container">
            <?php
                if(!empty($_GET['dmid'])) {
                    $category = $_GET['dmid'];
                    $result = mysqli_query($link, "SELECT * FROM product WHERE id_danh_muc = '$category'");
                    $row_sp=mysqli_fetch_assoc($result);

                    if(!empty($row_sp) == null) {
            ?>
                        <div class="alert alert-primary" role="alert">
                            Hong Có Sản Phẩm! Okay
                        </div>
            <?php
                    }
                    else {
                        $result = mysqli_query($link, "SELECT count(id) AS total FROM product  WHERE id_danh_muc = '$category'");
                        $row = mysqli_fetch_assoc($result);
                        $total_records = $row['total'];
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                        // if(isset($_GET['page'])) {
                        //     $current_page = $_GET['page'];
                        // }
                        // else {
                        //     $current_page = 1;
                        // }

                        $limit = 4;
                        $total_page = ceil($total_records / $limit);
                        if ($current_page > $total_page){
                            $current_page = $total_page;
                        }
                        else if ($current_page < 1){
                            $current_page = 1;
                        }
                        $start = ($current_page - 1) * $limit;
                        $result_sp_where_pagination = mysqli_query($link, "SELECT * FROM product WHERE id_danh_muc = '$category' LIMIT $start, $limit");
                        echo "<div class='row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4'>";
                            while($row_sp=mysqli_fetch_assoc($result_sp_where_pagination)) {
                                if(!empty($row_sp) == null) {
                                    echo "
                                    <div class='alert alert-primary' role='alert'>
                                        Hong Có Sản Phẩm! Okay
                                    </div>
                                    ";
                                }else {
                                    echo "
                                        <div class='col align-items-center justify-content-around'>
                                            <div class='card border-light'>
                                                <a href='detail_san_pham.php?detailid=".$row_sp['id']."'>
                                                    <img src='./img/danhmuc/".$row_sp['img']."' class='card-img-top' alt='".$row_sp['name']."' height=400>
                                                </a>
                                                <div class='card-body text-center'>
                                                    <h5 class='card-title'>".$row_sp['name']."</h5>
                                                    <div class='price py-2'>
                                                        <span>".$row_sp['price']."VND</span>
                                                    </div>
                                                    <button type='button' class='btn btn-danger add-cart'>Đặt hàng</button>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                }
                            }
                        echo "</div>";

                        echo"
                        <br>
                        <div class='pagination justify-content-end' style='padding: 20px;'>";
                            if ($current_page > 1 && $total_page > 1){
                                echo "
                                <nav aria-label='Page navigation example'>
                                    <ul class='pagination justify-content-end'>
                                        <li class='page-item'>
                                        <a class='page-link' href='index.php?dmid=".$category."&page=".($current_page-1)."'>
                                            <span aria-hidden='true'>&laquo;</span>
                                        </a>
                                        </li>";
                            }
                            for ($i = 1; $i <= $total_page; $i++){
                                if ($i == $current_page){
                                    echo "
                                    <li class='page-item active' aria-current='page'><a class='page-link'>".$i."</a></li>";
                                }
                                else {
                                    echo "
                                    <li class='page-item'><a class='page-link' href='index.php?dmid=".$category."&page=".$i."'>".$i."</a></li>";
                                }
                            }
                            if ($current_page < $total_page && $total_page > 1){
                                echo "
                                        <li class='page-item'>
                                        <a class='page-link' href='index.php?dmid=".$category."&page=".($current_page+1)."'>
                                            <span aria-hidden='true'>&raquo;</span>
                                        </a>
                                        </li>
                                    </ul>
                                </nav>";
                            }
                        echo "</div>";
                    }
                }
                else {
                    echo "<div class='row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4'>";
                    while($row_sp=mysqli_fetch_assoc($result_sp_pagination)) {
                        echo "
                            <div class='col align-items-center'>
                                <div class='card border-light'>
                                    <a href='detail_san_pham.php?detailid=".$row_sp['id']."'>
                                        <img src='./img/danhmuc/".$row_sp['img']."' class='card-img-top' alt='".$row_sp['name']."' height=400>
                                    </a>
                                    <div class='card-body text-center'>
                                        <h5 class='card-title '>".$row_sp['name']."</h5>
                                        <div class='price py-2'>
                                            <span>".$row_sp['price']."VND</span>
                                        </div>
                                        <button type='button' class='btn btn-danger add-cart'>Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                            ";
                    }
                    echo "</div>";
                    
                    echo"
                    <br>
                    <div class='pagination justify-content-end' style='padding: 20px;'>";
                        if ($current_page > 1 && $total_page > 1){
                            echo "
                            <nav aria-label='Page navigation example'>
                                <ul class='pagination justify-content-end'>
                                    <li class='page-item'>
                                    <a class='page-link' href='index.php?page=".($current_page-1)."'>
                                        <span aria-hidden='true'>&laquo;</span>
                                    </a>
                                    </li>";
                        }
                        for ($i = 1; $i <= $total_page; $i++){
                            if ($i == $current_page){
                                echo "
                                <li class='page-item active' aria-current='page'><a class='page-link'>".$i."</a></li>";
                            }
                            else {
                                echo "
                                <li class='page-item'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";
                            }
                        }
                        if ($current_page < $total_page && $total_page > 1){
                            echo "
                                    <li class='page-item'>
                                    <a class='page-link' href='index.php?page=".($current_page+1)."'>
                                        <span aria-hidden='true'>&raquo;</span>
                                    </a>
                                    </li>
                                </ul>
                            </nav>";
                        }
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>