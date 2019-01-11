<?php
include('conn.php');
$username = $_POST['username'];
$password = $_POST['password'];

if($username && $password)
{
    $sql = "select * from members where username='$username' and password='$password'";
    $user_query = mysql_query($sql,$conn) or die('mysql query error');
    $rows=mysql_num_rows($user_query);

    if($rows == 1) //1==true
    {
        session_start();
        $_SESSION['username'] = $username;
        echo ' Welcome, ', $username, ',  Please Enter <a href="bookmark.html">   HomePage</a><br/>';
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
