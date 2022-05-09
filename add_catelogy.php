<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Catelogy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
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
        <div class="alert alert-secondary" role="alert">
            <?php
                require_once "db_module.php";
                if (isset($_GET['mess-dele-danh-muc'])) {
                    echo $_GET['mess-dele-danh-muc'];
                }
                else if(isset($_GET['mess-update-danh-muc'])) {
                    echo $_GET['mess-update-danh-muc'];
                }
                else if(isset($_GET['messgdanhmuc'])) {
                    echo $_GET['messgdanhmuc'];
                }
                else {
                    echo 'Danh Mục';
                }
            ?>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form action="upload_catelogy.php" method="post" enctype="multipart/form-data">
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInputGrid" placeholder=""
                                            name="ten_catelogy">
                                        <label for="floatingInputGrid">Tên Danh Mục</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInputGrid" placeholder=""
                                            name="code_catelogy">
                                        <label for="floatingInputGrid">Code Danh Mục</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="d-grid gap-2 d-md-block">
                                <input class="btn btn-outline-primary" type="submit" value="Tạo Danh Mục" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <?php
                        $link = null;
                        taoKetnoi($link);
                        $reture_dm_all = chayTruyVanTraVeDL($link, "select * from danh_muc");
                    ?>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Tên Danh Mục</th>
                                    <th scope="col">Code Danh Mục</th>
                                    <th scope="col" class="text-center">Xóa/Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($row_dm = mysqli_fetch_assoc($reture_dm_all)) {
                                        echo "
                                            <tr>
                                                <th scope='row'>".$row_dm['id']."</th>
                                                <td>".$row_dm['name']."</td>
                                                <td>".$row_dm['code_name']."</td>
                                                <td class='text-center'>
                                                    <a class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#PupupEditDM".$row_dm['id']."'>Cập Nhật</a> |
                                                    <a class='btn btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#PupupDeleteDM".$row_dm['id']."'>Xóa</a>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>                  
                <!-- EDIT MODAL -->
                <?php
                    $reture_dm_modal_edit = chayTruyVanTraVeDL($link, "select * from danh_muc");
                    while ($row_dm_modal_edit = mysqli_fetch_assoc($reture_dm_modal_edit)) {
                        echo "
                        <div class='modal fade' id='PupupEditDM".$row_dm_modal_edit['id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>Thông Báo</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                    <div class='card'>
                                        <div class='card-body'>
                                                <form action='edit_danh_muc.php?editiddanhmuc=".$row_dm_modal_edit['id']."' method='post' enctype='multipart/form-data'>
                                                    <div class='row g-2'>
                                                        <div class='col-md'>
                                                            <div class='form-floating'>
                                                                <input type='text' class='form-control' id='floatingInputGrid' placeholder=''
                                                                    name='name_catelogy' value='".$row_dm_modal_edit['name']."'>
                                                                <label for='floatingInputGrid'>Tên</label>
                                                            </div>
                                                        </div>
                                                        <div class='col-md'>
                                                            <div class='form-floating'>
                                                                <input type='text' class='form-control' id='floatingInputGrid' placeholder=''
                                                                    name='code_catelogy' value='".$row_dm_modal_edit['code_name']."'>
                                                                <label for='floatingInputGrid'>Code</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Thoát</button>
                                                        <button type='submit' class='btn btn-danger' data-bs-dismiss='modal' name='submit'>Cập Nhật</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                ?>
                <!-- DELETE MODAL -->
                <?php
                    $reture_dm_modal_delete = chayTruyVanTraVeDL($link, "select * from danh_muc");
                        while ($row_dm_modal_delete = mysqli_fetch_assoc($reture_dm_modal_delete)) {
                            echo "
                            <div class='modal fade' id='PupupDeleteDM".$row_dm_modal_delete['id']."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                                            <a class='btn btn-danger' href='delete_dm.php?deletedmid=".$row_dm_modal_delete['id']."'>Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                ?>
            </div>
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