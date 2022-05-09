<?php
require_once("db_module.php");
$link=null;
taoKetNoi($link);
    if(isset($_POST['submit'])){
        $img_name = $_FILES['img']["name"];
        $img_size = $_FILES['img']["size"];
        $tmp_name = $_FILES['img']["tmp_name"];
        $error = $_FILES['img']["error"];
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $passwordncu=$_POST['passwordcu'];
        $passwordnew=$_POST['passwordnew'];
        $passwordsuccessnew=$_POST['passwordsuccessnew'];
        // $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        $account_uuid = $_GET['editaccountuuid'];

        // var_dump($passwordncu_error);die();
        if($error===0){
            if($img_size > 2000000){
                $em="File quá lớn";
                header("Location: edit_account.php?modalaccountuuid=$account_uuid&massedit=$em");
            }
            else{
                $reture_account_usid=chayTruyVanTraVeDL($link,"select * from account where usid = '$account_uuid'");
                $row_account_usid=mysqli_fetch_assoc($reture_account_usid);

                $reture_account_all=chayTruyVanTraVeDL($link,"select * from account");
                $row_account_all=mysqli_fetch_assoc($reture_account_all);

                $password = $row_account_usid['password'];
                $username_all = $row_account_all['username'];

                    // var_dump($passwordncu);die();
                    if($passwordncu === "" || $passwordnew === "") {
                        $password_hash = $password;
                    }
                    elseif (password_verify($passwordncu, $password)) {
                        if ($passwordnew === $passwordsuccessnew) {
                            $password_hash = password_hash($passwordnew, PASSWORD_BCRYPT);
                        }
                        else {
                            $em="Password Success New Không Khớp";
                            header("Location: edit_account.php?modalaccountuuid=$account_uuid&massedit=$em");die();
                        }
                    }
                    else {
                        $em="Password Cũ Sai";
                        header("Location: edit_account.php?modalaccountuuid=$account_uuid&massedit=$em");die();
                    }
                    if ($username == $username_all) {
                        $em="Username Trùng";
                        header("Location: edit_account.php?modalaccountuuid=$account_uuid&massedit=$em");die();
                    }

                $created_at = $row_account_usid['created_at'];

                $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                    // var_dump($img_ex);die();
                $img_ex_lc= strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png");
                if(in_array($img_ex_lc,$allowed_exs)){
                    $name_image_save ='account/'.uniqid("IMG-",true).'.'.$img_ex_lc;
                    $folder = "img/";
                    $moveResult = move_uploaded_file($tmp_name, "$folder/$name_image_save");

                    $result=chayTruyVanKhongTraVeDL($link,"UPDATE account SET full_name='$fullname', email='$email',username='$username', password='$password_hash',img='$name_image_save', created_at='$created_at',updated_at='$updated_at'  WHERE usid= '$account_uuid'");

                    if($result){
                        $em="Edit thành công";
                        header("Location: AddAccount.php?messsanpham=$em");
                    }
                    else{
                        $em="Edit thất bại";
                        header("Location: edit_account.php?modalaccountuuid=$account_uuid&massedit=$em");
                    }
                    giaiPhongBoNho($link,$result);
                }
                else{
                    $em="Bạn không thể upload loại file này";
                    header("Location: edit_account.php?modalaccountuuid=$account_uuid&massedit=$em");
                }
            }
        }
        else{
            $reture_account_usid=chayTruyVanTraVeDL($link,"select * from account where usid = '$account_uuid'");
            $row_account_usid=mysqli_fetch_assoc($reture_account_usid);

            $reture_account_all=chayTruyVanTraVeDL($link,"select * from account");
            $row_account_all=mysqli_fetch_assoc($reture_account_all);

            $password = $row_account_usid['password'];
            $username_all = $row_account_all['username'];

                // var_dump($passwordncu);die();
                if($passwordncu === "" || $passwordnew === "") {
                    $password_hash = $password;
                }
                elseif (password_verify($passwordncu, $password)) {
                    if ($passwordnew === $passwordsuccessnew) {
                        $password_hash = password_hash($passwordnew, PASSWORD_BCRYPT);
                    }
                    else {
                        $em="Password Success New Không Khớp";
                        header("Location: edit_account.php?modalaccountuuid=$account_uuid&massedit=$em");die();
                    }
                }
                else {
                    $em="Password Cũ Sai";
                    header("Location: edit_account.php?modalaccountuuid=$account_uuid&massedit=$em");die();
                }
                if ($username == $username_all) {
                    $em="Username Trùng";
                    header("Location: edit_account.php?modalaccountuuid=$account_uuid&massedit=$em");die();
                }
            
            $created_at = $row_account_usid['created_at'];

            $new_img_name = $row_account_usid['img'];

            $result=chayTruyVanKhongTraVeDL($link,"UPDATE account SET full_name='$fullname', email='$email',username='$username', password='$password_hash', img='$new_img_name', created_at='$created_at',updated_at='$updated_at'  WHERE usid= '$account_uuid'");

            if($result){
                $em="Edit thành công";
                header("Location: AddAccount.php?messsanpham=$em");
            }
            else{
                $em="Edit thất bại";
                header("Location: edit_account.php?modalaccountuuid=$account_uuid&massedit=$em");
            }
            giaiPhongBoNho($link,$result);
        }
    }
    else
    header("Location: AddAccount.php");
?>