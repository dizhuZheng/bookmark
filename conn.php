<?php
$mysrv="localhost"; //数据库服务器名称
$myuser="root"; // 连接数据库用户名
$mypwd=""; // 连接数据库密码
$mydb='myDB';
$conn = mysql_connect($mysrv,$myuser,$mypwd)
or die("Can't connect database ".mysql_error());
mysql_select_db($mydb,$conn) or die("Database visit error !".mysql_error());
?>
