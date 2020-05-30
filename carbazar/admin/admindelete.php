<?php
session_start();
$id=$_GET['id1'];
include("connection.php");
	mysql_query("delete from login where id='$id'");
	session_unset();
session_destroy();
header("location:index.php");



?>