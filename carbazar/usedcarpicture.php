<?
  if((!isset($_GET['spid']))){
		header("location:used_car_by_model.php");
	}
	include("master1.php");
?>
<title>All Picture</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />

<?php
	include("master2.php");
?>
<?php
$sid=$_GET['spid'];

?>
	
<hr size="1" color="lightgrey">
<br>




<div class="wrap">
                  <?php 
				  include("connection.php");
				  $res1=mysql_query("select version,version_name from car_sell cs,car_version cv where saler_id='$sid' and cs.version=cv.v_id");
				  $row1=mysql_fetch_array($res1);
                    $vname=$row1['version_name'];
                   ?>
                	<h4 class="title">
					 All Picture of <?php echo $vname;?>	         </h4>
			
        <br>
		<div style="width:800px;">
		<?php
         include("connection.php");
		 
		$sql="select * from sell_car_photo where saler_id='$sid'";
		$res=mysql_query($sql);
		
		while($row=mysql_fetch_array($res))
		{
			$imgsrc="admin/upload_car/sell/".$row['photo_src'];
		?>
		
		    <a href="<?php echo $imgsrc;?>"><img src="<?php echo $imgsrc;?>" height="180" width="180" style="border:2px solid black"></a>
			
		 
        <?php
		}
		?>
		</div>
       		
				
				
			
        		
			

				
			
		
				
				
   <div class="clear"></div>

  <div class="clear"></div>
</div>
	
		<br><br>

 
<?php
	include("master3.php");
?>