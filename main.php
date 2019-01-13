<?php

include('conn.php');
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];

if(!isset($username) && !isset($password) && !isset($email))
{
    header("Location:login.html");
    exit();
}

$sql = "select * from members where username='$username' and password='$password' and email='$email' ";
$user_query = mysql_query($sql,$conn) or die('mysql query error');
$rows=mysql_num_rows($user_query);

if($rows){
    echo '<strong>User Info </strong><br/>';
    echo 'User Name：',$username,'<br/>';
    echo 'Email Address: ',$email,'<br/>';
    echo '<a href="login.php?action=logout">Logout</a><br/>';
}
?>
