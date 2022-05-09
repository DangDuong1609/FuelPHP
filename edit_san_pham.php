<?php
require_once("db_module.php");
$link=null;
taoKetNoi($link);
    if(isset($_POST['submit'])){
        $img_name = $_FILES['img']["name"];
        $img_size = $_FILES['img']["size"];
        $tmp_name = $_FILES['img']["tmp_name"];
        $error = $_FILES['img']["error"];
        $name=$_POST['ten'];
        $mota=$_POST['mo_ta'];
        $giaban=$_POST['giaban'];
        $iddm=$_POST['iddm'];
        $id_sp=$_GET['idsanpham'];
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        // var_dump($error);die();
        if($error===0){
            if($img_size > 2000000){
                $em="File quá lớn";
                header("Location: modal_edit.php?modalid=$id_sp&massedit=$em");
            }
            else{
                $reture_cata_all=chayTruyVanTraVeDL($link,"select * from danh_muc where id = '$iddm'");
                $row_cata=mysqli_fetch_assoc($reture_cata_all);

                $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc= strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png");
                if(in_array($img_ex_lc,$allowed_exs)){
                    // $new_img_name = $row_cata['code'].'/'.uniqid("IMG-",true).'.'.$img_ex_lc;

                    $name_image_save =uniqid("IMG-",true).'.'.$img_ex_lc;

                    $new_img_name = $row_cata['code_name'].'/'.$name_image_save;

                    $folder = "img/danhmuc/".$row_cata['code_name'];
                    // $fileName = preg_replace('#[^a-z.0-9]#i', '', $name_image_save);
                    $moveResult = move_uploaded_file($tmp_name, "$folder/$name_image_save");

                    $result=chayTruyVanKhongTraVeDL($link,"UPDATE product SET name='$name', img='$new_img_name', id_danh_muc='$iddm',price='$giaban',mo_ta='$mota', created_at='$created_at',updated_at='$updated_at'  WHERE id= '$id_sp'");

                    if($result){
                        $em="Edit thành công";
                        header("Location: add.php?messsanpham=$em");
                    }
                    else{
                        $em="Edit thất bại";
                        header("Location: modal_edit.php?modalid=$id_sp&massedit=$em");
                    }
                    giaiPhongBoNho($link,$result);
                }
                else{
                    $em="Bạn không thể upload loại file này";
                    header("Location: modal_edit.php?modalid=$id_sp&massedit=$em");
                }
            }
        }
        else{
            $reture_edit_id=chayTruyVanTraVeDL($link,"select * from product where id = '$id_sp'");
            $row_sp_edit=mysqli_fetch_assoc($reture_edit_id);

            $new_img_name = $row_sp_edit['img'];

            $result=chayTruyVanKhongTraVeDL($link,"UPDATE product SET name='$name', img='$new_img_name', id_danh_muc='$iddm',price='$giaban',mo_ta='$mota', created_at='$created_at',updated_at='$updated_at' WHERE id= '$id_sp'");

            if($result){
                $em="Edit thành công";
                header("Location: add.php?messsanpham=$em");
            }
            else{
                $em="Edit thất bại";
                header("Location: modal_edit.php?modalid=$id_sp&massedit=$em");
            }
            giaiPhongBoNho($link,$result);
        }
    }
    else
    header("Location: modal_edit.php");
?>