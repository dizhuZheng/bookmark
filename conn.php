<?php
    $srv="localhost";
    $user="root";

    $mydb='myDB';
    $conn = mysql_connect($srv,$user,"")
    or die("Can't connect database ".mysql_error());
    mysql_select_db($mydb,$conn) or die("Database visit error !".mysql_error());
?>
