<?php
require_once("db_module.php");
$link=null;
taoKetNoi($link);
if (!empty($_GET['modalid'])) {
    $edit_sp = $_GET['modalid'];
    $result_sp_edit = chayTruyVanTraVeDL($link, "select * from product where id = ".$_GET['modalid']."");
    $row_sp_edit = mysqli_fetch_assoc($result_sp_edit);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <div class="alert alert-secondary" role="alert">
            <?php
            require_once("db_module.php");
            if (isset($_GET['massedit'])) {
                echo $_GET['massedit'];
            } else {
                echo "Edit Sản Phẩm";
            }
            ?>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="edit_san_pham.php?idsanpham=<?php echo $row_sp_edit['id']?>" method="post" enctype="multipart/form-data">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid"
                                    placeholder="" value="<?php echo $row_sp_edit['name'];?>" name="ten">
                                <label for="floatingInputGrid">Tên Hình</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid"
                                    aria-label="Floating label select example" name="iddm">
                                        <?php
                                            $link = null;
                                            taoKetnoi($link);
                                            $result_dm_edit = chayTruyVanTraVeDL($link, "select * from danh_muc where id = ".$row_sp_edit['id_danh_muc']."");
                                            while ($rows_edit = mysqli_fetch_assoc($result_dm_edit)) {
                                                echo "
                                                <option selected value='".$rows_edit['id']."'>".$rows_edit['name']."</option>
                                                ";
                                            }
                                                $result = chayTruyVanTraVeDL($link, "select * from danh_muc");
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                    echo "
                                                    <option value='".$rows['id']."'>".$rows['name']."</option>
                                                    ";
                                            }
                                        ?>
                                </select>
                                <label for="floatingSelectGrid">Danh Mục</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $row_sp_edit['price'];?>" name="giaban">
                            <label for="floatingInputGrid">Gía Bán</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingInputGrid" name="mo_ta"><?php echo $row_sp_edit['mo_ta']?></textarea>
                                <label for="floatingInputGrid">Mô tả</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                            <img src='./img/danhmuc/<?php echo $row_sp_edit['img'];?>' class='img-fluid img-thumbnail' alt=''>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                            <input class="form-control" type="file" id="formFile" name="img">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="submit">Cập Nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>