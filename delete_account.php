<?php
require_once("db_module.php");
$link=null;
taoKetNoi($link);
    $id_dele_account=$_GET['deleteid'];
    
    $result_dele_account = chayTruyVanKhongTraVeDL($link,"DELETE FROM account WHERE id= '$id_dele_account'");
    if($result_dele_account){
        $em="Xóa thành công";
        header("Location: AddAccount.php?messsanpham=$em");
    }
    else{
        $em="Xóa Thất Bại";
        header("Location: AddAccount.php?messfail=$em");
    }
    giaiPhongBoNho($link,$result);
?>