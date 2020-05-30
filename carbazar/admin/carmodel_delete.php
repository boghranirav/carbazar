<?php
$id=$_GET['cid'];

include("connection.php");
       	mysql_query("delete from car_model where car_id='$id'");
header("location:car_model_view.php");

?>