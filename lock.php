<?php
include('config.php');
session_start();

$user_check= "";
if (isset($_SESSION['login_user'])) {
    $user_check=$_SESSION['login_user'];
}

$ses_sql=mysqli_query($db,"select * from administrateur where email='$user_check' ");

$admin=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$admin['email'];

if(!isset($login_session)) {
    header("Location: login.php");
}
?>