<?php
require_once("db_module.php");
$link=null;
taoKetNoi($link);
    $id_dele_dm=$_GET['deletedmid'];

    // $result_dele_image_folder = chayTruyVanKhongTraVeDL($link,"SELECT * FROM tbl_danhmuc WHERE id= '$id_dele_dm'");
    // $row_folder_dele = mysqli_fetch_assoc($result_dele_image_folder);

    // $createDeletePath = '/img/danhmuc/'.$row_folder_dele['code'];

    // unlink($createDeletePath);
    // var_dump($createDeletePath);die();

    $result_dele_dm = chayTruyVanKhongTraVeDL($link,"DELETE FROM tbl_danhmuc WHERE id= '$id_dele_dm'");
    if($result_dele_dm) {
        $result_dele_sp = chayTruyVanKhongTraVeDL($link,"DELETE FROM tbl_sanpham WHERE id_dm= '$id_dele_dm'");
        $em="Xóa thành công";
        header("Location: add_catelogy.php?mess-dele-danh-muc=$em");
    }
    else{
        $em="Xóa Thất Bại";
        header("Location: add_catelogy.php?mess-dele-danh-muc=$em");
    }
    giaiPhongBoNho($link,$result);
?>