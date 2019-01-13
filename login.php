<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
include('conn.php');
session_start();

if($_GET['action'] == "logout"){
    unset($_SESSION['password']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    echo '<br> <br>';
    echo '<strong style="color: red" >Logout Successfully !!!</strong>';
    exit;
}

if($username && $password)
{
    $sql = "select * from members where username='$username' and password='$password'
    and email='$email' ";
    $user_query = mysql_query($sql,$conn) or die('mysql query error');
    $rows=mysql_num_rows($user_query);

    if($rows == 1)
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        echo '<strong style="color: red" > Welcome, ', $username, ',  Please Enter <a href="main.php">   HomePage</a></strong><br/>';
        exit;
    }

    else {
    echo 'Wrong username or password，after 3s Retry !';
    echo "<script> setTimeout(function(){window.location.href='login.html';},3000);</script>";
    }
}
else{
    echo "Form isn't complete, after 3s Retry !";
    echo "<script>setTimeout(function(){window.location.href='login.html';},3000);</script>";
}
?>
