<?php
   require_once('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username, usid, full_name, email, img from account where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $username_session = $row['username'];
   $usid_session = $row['usid'];
   $full_name_session = $row['full_name'];
   $email_session = $row['email'];
   $img_session = $row['img'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>