<?php
function random_alphanumeric($length) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ12345689';
    $my_string = '';
    for ($i = 0; $i < $length; $i++) {
      $pos = mt_rand(0, strlen($chars) -1);
      $my_string .= substr($chars, $pos, 1);
    }
    return $my_string;
  }
require_once("db_module.php");

$link=null;
taoKetNoi($link);
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $usid = random_alphanumeric(40);
        // var_dump($usid);die();

        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $account_select = chayTruyVanTraVeDL($link,"select * from account");
        $row_account=mysqli_fetch_assoc($account_select);
        // var_dump($row_account['email']);die();
        $email_ys = $row_account['email'];
        $username_ys = $row_account['username'];
        $usid_ys = $row_account['usid'];
        $avatar = 'account/1.jpg';
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // $account_yes = chayTruyVanTraVeDL($link,"select * from account where email='$email_ys' orwhere username='$username_ys' orwhere usid='$usid_ys' ");
        // $row_account_yes = mysqli_fetch_assoc($account_yes);
        // var_dump($row_account_yes['email']);die();

        if ($username == $username_ys) {
            $em="username Bị Trùng";
            header("Location: AddAccount.php?msg=$em");
        }
        elseif ($email == $email_ys) {
            $em="email Bị Trùng";
            header("Location: AddAccount.php?msg=$em");
        }
        elseif ($usid == $usid_ys) {
            $usid = random_alphanumeric(40);
        }
        else {
			$result=chayTruyVanKhongTraVeDL($link,"insert into account value(null, '$usid', '$fullname', '$email', '$username', '$password_hash', '$avatar', '$created_at', '$updated_at')");
                $em="Create Account Successfully";
                header("Location: AddAccount.php?msg=$em");
        }
    }
    else
    header("Location: AddAccount.php");
?>