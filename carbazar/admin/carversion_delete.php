<?php
$id=$_GET['vid'];
include("connection.php");
       	mysql_query("delete from car_version where v_id='$id'");
header("location:version_view.php");

?>