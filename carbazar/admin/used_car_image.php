<?php
	include("master.php");
	$id=$_GET['sid'];
	include("connection.php");
	$sql="select * from  sell_car_photo s,car_version cv where saler_id='$id' and s.version_id=cv.v_id";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	$ver=$row['version_name'];
	
?>

<title>Used Car Images</title>
<?php
	include("user_master1.php");
?>


<h1> <?php echo $ver;?> Images</h1>
<hr/>
 
 <div style="width:900px;">
 <?php 
 include("connection.php");
	$sql="select * from sell_car_photo where saler_id='$id'";
	$res=mysql_query($sql);
	
	while($row=mysql_fetch_array($res)){
		$imgsrc=$row['photo_src'];
		echo "<a href='upload_car/sell/".$imgsrc."' title='".$ver."'><img src='upload_car/sell/".$imgsrc."' width='200px' height='200px' style='border:2px solid black'></a>&nbsp;&nbsp;";
	}

 
 ?>
                            
</div>

 
<?php
	include("user_master2.php");
?>