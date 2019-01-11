<?php
include('conn.php');
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select * from members where username = '$username' and password =
MD5('$password')";

$user_query = mysql_query($sql,$conn) or die('mysql query error');
$rows=mysql_num_rows($user_query);

if($rows == 1)
{
    session_start();
    $_SESSION['username'] = $username;
    echo ' Welcome, ', $username, ',  Please Enter <a href="bookmark.html">   HomePage</a><br/>';
exit;
}

else {
echo 'Wrong username or password，click here <a href="login.html">login</a> Retry ！<br />';
}
?>
