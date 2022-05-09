<?php
require_once("db_module.php");
$link=null;
taoKetNoi($link);
    if(isset($_POST['submit'])){
        $name=$_POST['ten_catelogy'];
        $code=$_POST['code_catelogy'];
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        
        $mypath= "img/danhmuc/".$_POST['code_catelogy'];
        $create_folder = mkdir($mypath,0777,TRUE);

        // Insert into Database
        $result=chayTruyVanKhongTraVeDL($link,"insert into danh_muc value(null,'$name','$code', '$created_at', '$updated_at')");
        if($result){
            $em="Thêm thành công";
            header("Location: add_catelogy.php?messgdanhmuc=$em");
        }
        else{
            $em="Thêm thất bại";
            header("Location: add_catelogy.php?messgdanhmuc=$em");
        }
        giaiPhongBoNho($link,$result);
    }else
        header("Location: add_catelogy.php");
?>