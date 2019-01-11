<?php
include('conn.php');
$username = $_POST['username'];
$password = $_POST['password'];

if (preg_match("/[a-zA-Z0-9_]{3,16}/",$username) &&
preg_match("/^[a-zA-Z\d_]{8,}$/", $password))
{
   $regsql = "insert into members (username,password)
   values('$username','$password')";
   $user_query = mysql_query($regsql,$conn) or die('mysql query error');
   echo " Congratulation, $username, Registered successfully ! <br>";
   echo 'Go to login page  <a href="login.html">  Login</a>';
   mysql_close($conn);
}

else
{
   if(empty($_POST["username"]))
   {
      $nameErr = "empty username";
      echo '<script>alert("Please input username！");</script>';
      exit;
   }
   else
   {
      $username = test_input($_POST["username"]);
      if (!preg_match("/[a-zA-Z0-9_]{3,16}/",$username))
      {
         $nameErr = "illegal name";
         echo '<script>alert("Only space and characters are allowed, length Must be greater than 3, less than 16 !");</script>';
         exit;
      }
   }

   if (empty($_POST["password"]))
   {
      $pwdErr = "empty password";
      echo '<script>alert("Password is required !");</script>';
      exit;
   }

   else if(!empty($_POST["password"]))
   {
      $password= test_input($_POST["password"]);
      if (!preg_match("/^[a-zA-Z\d_]{8,}$/", $password))
      {
         $pwdErr = "illegal password";
         echo '<script>alert(" illegal password Format !")</script>';
         exit;
      }
   }
}

function test_input($data)
 {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
