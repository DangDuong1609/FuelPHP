<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
    </svg>
</head>

<style>
    .form-label {
    margin-bottom: 0px !important;
    }
</style>

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
        <div class="alert alert-secondary" role="alert">
            <?php
            require_once("db_module.php");
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
            else if(isset($_GET['error'])) {
                echo $_GET['error'];
            }
            else {
                echo "Thêm Sản Phẩm";
            }
            ?>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com" name="ten">
                                <label for="floatingInputGrid">Tên hoa</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="iddm">
                                    <option selected>Chọn Danh mục</option>
                                    <?php
                                    $link = null;
                                    taoKetnoi($link);
                                    $result = chayTruyVanTraVeDL($link, "select * from danh_muc");
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $rows['id'] . "'>" . $rows['name'] . "</option>";
                                    };
                                    ?>
                                </select>
                                <label for="floatingSelectGrid">Danh mục</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com" name="giaban">
                                <label for="floatingInputGrid">Giá bán</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Thêm File Hình</label>
                                    <input class="form-control" type="file" id="formFile" name="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <textarea class="form-control" rows="1" style="height:15em;" id="floatingInputGrid" name="mota1"></textarea>
                                <label for="floatingInputGrid">Mô tả 1</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <textarea class="form-control" rows="1" style="height:15em;" id="floatingInputGrid" name="mota2"></textarea>
                                <label for="floatingInputGrid">Mô tả 2</label>
                            </div>
                        </div>
                    </div> -->
                    <br>
                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" rows="1" style="height:15em;" id="floatingInputGrid" name="mota"></textarea>
                                <label for="floatingInputGrid">Mô tả</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="submit">Thêm Sản Phẩm</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="alert alert-secondary" role="alert">
            <?php
                require_once("db_module.php");
                if (isset($_GET['messsanpham'])) {
                    echo $_GET['messsanpham'];
                } else {
                    echo "Danh Mục Sản Phẩm";
                }
            ?>
        </div>

        <?php
        $reture_sp_all = chayTruyVanTraVeDL($link, "select * from product");
        ?>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col-1">id</th>
                            <th scope="col-2">Hình</th>
                            <th scope="col-2">Tên Hình</th>
                            <th scope="col-2">Danh Mục</th>
                            <th scope="col-1">Giá</th>
                            <th scope="col-3">Mô Tả</th>
                            <th scope="col-1" class="text-center">Xóa/Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row_sp = mysqli_fetch_assoc($reture_sp_all)) {
                            $reture_dm_all = chayTruyVanTraVeDL($link, "select * from danh_muc where id = ".$row_sp['id_danh_muc']." ");
                            while ($row_dm = mysqli_fetch_assoc($reture_dm_all)) {
                                echo "
                                    <tr>
                                        <th scope='row'>".$row_sp['id']."</th>
                                        <td>
                                            <img src='./img/danhmuc/".$row_sp['img']."' class='img-fluid img-thumbnail' alt='".$row_sp['mo_ta']."' width='200'>
                                        </td>
                                        <td>".$row_sp['name']."</td>
                                        <td>
                                            ".$row_dm['name']."
                                        </td>
                                        <td>".$row_sp['price']."</td>
                                        <td>".$row_sp['mo_ta']."</td>
                                        <td class='text-center'>
                                            <a class='btn btn-primary' href='modal_edit.php?modalid=".$row_sp['id']."'>Cập Nhật</a> |
                                            <a class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#PopupDelete".$row_sp['id']."'>Xóa</a>
                                        </td>
                                    </tr>
                                ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php
                $reture_sp_modal = chayTruyVanTraVeDL($link, "select * from product");
                while ($row_sp_modal = mysqli_fetch_assoc($reture_sp_modal)) {
                    echo "
                    <div class='modal fade' id='PopupDelete".$row_sp_modal['id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-sm modal-dialog-centered'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>Thông Báo</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <div class='alert alert-primary d-flex align-items-center' role='alert'>
                                        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Info:'><use xlink:href='#info-fill'/></svg>
                                        <div>
                                            Bạn Có Muốn Xóa Không?
                                        </div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Thoát</button>
                                    <a class='btn btn-danger' href='delete.php?deleteid=".$row_sp_modal['id']."'>Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>
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