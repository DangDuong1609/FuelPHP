<?php
require_once("db_module.php");
$link=null;
taoKetNoi($link);
    $id_dele_sp=$_GET['deleteid'];
    
    $result_dele_sp = chayTruyVanKhongTraVeDL($link,"DELETE FROM product WHERE id= '$id_dele_sp'");
    if($result_dele_sp){
        $em="Xóa thành công";
        header("Location: add.php?messsanpham=$em");
    }
    else{
        $em="Xóa Thất Bại";
        header("Location: add.php?messsanpham=$em");
    }
    giaiPhongBoNho($link,$result);
?>