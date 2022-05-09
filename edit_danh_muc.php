<?php
require_once("db_module.php");
$link=null;
taoKetNoi($link);
    if(isset($_POST['submit'])){
        $name_cate = $_POST['name_catelogy'];
        $code_cate = $_POST['code_catelogy'];
        $id_update_dm = $_GET['editiddanhmuc'];
        // $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $reture_dm_all = chayTruyVanTraVeDL($link, "SELECT * FROM danh_muc WHERE id = '$id_update_dm'");
        $row_dm = mysqli_fetch_assoc($reture_dm_all);

        $created_at = $row_dm['created_at'];

        if($code_cate == $row_dm['code_name']) {
            $code_cate = $row_dm['code_name'];
        }
        else {
            $mypath= "img/danhmuc/".$_POST['code_catelogy'];
            $create_folder = mkdir($mypath,0777,TRUE);
        }

        // Update Database
        $result_update_dm=chayTruyVanKhongTraVeDL($link,"UPDATE danh_muc SET name='$name_cate', code_name='$code_cate', created_at='$created_at', updated_at='$updated_at' WHERE id= '$id_update_dm'");

        if($result_update_dm){
            $em="Cập Nhật thành công";
            header("Location: add_catelogy.php?mess-update-danh-muc=$em");
        }
        else{
            $em="Cập Nhật Thất Bại";
            header("Location: add_catelogy.php?mess-update-danh-muc=$em");
        }

        giaiPhongBoNho($link,$result);
    }
?>