<?php
require_once("db_module.php");
$link=null;
taoKetNoi($link);
if (!empty($_GET['modalaccountuuid'])) {
    $edit_account = $_GET['modalaccountuuid'];
    $result_account_edit = chayTruyVanTraVeDL($link, "select * from account where usid = '$edit_account'");
    $row_account_edit = mysqli_fetch_assoc($result_account_edit);

    // var_dump($row_account_edit);die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
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
                echo "Edit Account";
            }
            ?>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="edit_user_account.php?editaccountuuid=<?php echo $row_account_edit['usid']?>" method="post" enctype="multipart/form-data">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid"
                                    placeholder="" value="<?php echo $row_account_edit['full_name'];?>" name="fullname">
                                <label for="floatingInputGrid">Full Name</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $row_account_edit['email'];?>" name="email">
                            <label for="floatingInputGrid">Email</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" placeholder="" value="<?php echo $row_account_edit['username'];?>" name="username">
                            <label for="floatingInputGrid">UserName</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Password Cu" value=""
                                name="passwordcu">
                            <label for="floatingInputGrid">Password Cũ</label>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" placeholder="Password New" value="" name="passwordnew">
                            <label for="floatingInputGrid">Password New</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" placeholder="Password Success New" value="" name="passwordsuccessnew">
                            <label for="floatingInputGrid">Password Success New</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <img src='./img/<?php echo $row_account_edit['img'];?>' class='img-fluid img-thumbnail' alt='' width=200 height=200>
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