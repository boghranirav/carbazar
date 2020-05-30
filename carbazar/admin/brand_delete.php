<?php
$id=$_GET['bid'];
echo $id;
include("connection.php");
	mysql_query("delete from car_make where brand_id='$id'");
header("location:brand_view.php");

?>