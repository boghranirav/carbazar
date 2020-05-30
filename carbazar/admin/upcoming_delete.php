<?php
$id=$_GET['vid'];
include("connection.php");
$id=$_GET['vid'];
$sql=mysql_query("delete from upcoming where u_id='$id'");

header("location:upcoming_view.php");
?>