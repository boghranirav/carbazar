<?php
$id=$_GET['uid'];
include("connection.php");
	mysql_query("delete from user_login where uid='$id'");
header("location:user_info.php");

?>