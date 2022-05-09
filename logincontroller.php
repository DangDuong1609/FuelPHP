<?php
require_once("db_module.php");
$link=null;
taoKetNoi($link);
    if(isset($_POST['submit'])){
        $usernameoremail = $_POST['usernameoremail'];
        $password = $_POST['password'];

        $reture_account = chayTruyVanTraVeDL($link, "SELECT * FROM account WHERE username = '$usernameoremail' OR email = '$usernameoremail' ");
        $row_account = mysqli_fetch_assoc($reture_account);
        $password_account = $row_account['password'];

        if((password_verify($password, $password_account))){
            header("Location: index.php");
        }
        else{
            $em="Username/Email or Password Sai";
            header("Location: login.php?loginfail=$em");
        }
    }
?>