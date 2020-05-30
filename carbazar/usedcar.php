<?php  	include("master1.php");

?>
<?php
		include("connection.php");
		$res=mysql_query("select count(*)as cot from car_sell" );
		$row=mysql_fetch_array($res);
		$tot=$row['cot'];
		  
		?>
<title><?php echo  $tot." USED CARS FOR SALE"; ?> </title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />

<?php
	include("master2.php");
?>
	
<hr size="1" color="lightgrey">
<br>
<?php

	if(isset($_POST['submit_umod'])){
		$cmodel=$_POST['car_model1'];
		$cityid=$_POST['c_city1'];
		
		
		header("location:used_car_by_model.php?ucarm=$cmodel&ucity=$cityid");
		
	}		
	if(isset($_POST['submit_ubud'])){
		$ucb=$_POST['c_budget1'];
		$cityid2=$_POST['c_city2'];
	
		if(($ucb) && ($cityid2))
		header("location:used_car_by_budget.php?ubud=$ucb&ucity2=$cityid2");
		
	}
?>



<div class="wrap">
                	<h4 class="title">
					 <?php echo  $tot." USED CARS for sale"; ?>
					 </h4>
			
        <br>		
		
<div style="width:1210px;">
<table style="width:1210px">
   <tr>
   <td width="300px">
   <br>
   <br>	
   <br>	
		
		
	<div style=" border:2px solid; width: 300px;background:white;" align="center">
      <font size="4">
		Find Used cars by Model.
		</font>
		
		<br><br>
		
		<div id="brand">
		
		<form method="post">
		
		<select style="height:30px;width:230px;font-size:16px" name="car_model1" id="car_model1">
				<option value="0">--Select Model--</option>	
				<?php
			             	include("connection.php");
							$sql=mysql_query("select distinct model,car_name from car_sell cs,car_model cm where cs.model=cm.car_id");
							while($row=mysql_fetch_array($sql)){
							$mid=$row['model'];
							$car_name=$row['car_name'];
								?>
							<option value=<?php echo $mid;?>><?php echo $car_name;?></option>
						
				<?php
				 }
				?>
		</select>
		
		<br>
		<br>
		<select style="height:30px;width:230px;font-size:16px" name="c_city1">
				<option value="0">--Select City--</option>
				<?php
				include("connection.php");
							$sql=mysql_query("select * from city1 order by cityname");
							while($row=mysql_fetch_array($sql)){
							$ctid=$row['city_id'];
							$city_name=$row['cityname'];
								?>
							<option value=<?php echo $ctid;?>><?php echo $city_name;?></option>
						
				<?php
				 }
				?>
				
		</select>
		
		<br><br>
		
		<button class="grey" id="reg" name="submit_umod" style=" margin-left: 4.1cm;">Search</button>
		
		</form>
		</div>
		
		<br><br>
		<hr>
		
		<font size="4">
		Find Used cars by price.
		</font>
		<br><br>
		<form method="post">
			<div id="budget1" name="budget1">
				<select style="height:30px;width:230px;font-size:16px" name="c_budget1">
				<option value="0">--Select Budget--</option>
				<option value="1">Below 1 Lac</option>
				<option value="2">1 Lac - 5 Lac</option>
				<option value="3">5 Lac - 10 Lac</option>
				<option value="4">10 Lac - 20 Lac</option>
				<option value="5">20 Lac - 50 Lac</option>
				<option value="6">50 Lac - 1 Crore</option>
				<option value="7">Above 1 Crore</option>
		</select>
		<br><br>
		<select style="height:30px;width:230px;font-size:16px" name="c_city2">
				<option value="0">--Select City--</option>
				<?php
				include("connection.php");
							$sql=mysql_query("select * from city1 order by cityname");
							while($row=mysql_fetch_array($sql)){
							$ctid=$row['city_id'];
							$city_name=$row['cityname'];
								?>
							<option value=<?php echo $ctid;?>><?php echo $city_name;?></option>
						
				<?php
				 }
				?>
				
		</select>
		<br><br>
		<button class="grey" id="reg" name="submit_ubud" style=" margin-left: 4.1cm;">Search</button>
		</div>
		</form>
	
		
	
	
		<br><br><br>
	</div>
	</td>
	<td width="800px">
	<br>
		<div style="width:800px;margin-left:1.5cm;">
<?php		   
		   $num_rec=2;
include("connection.php");
if(isset($_GET['page'])){
	$page=$_GET["page"];
}
else
{
	$page=1;
}
			  
			  $start_from=($page-1)*$num_rec;
				 include("connection.php");
				 
				 $sql="select *from car_sell cs,car_make cm,car_version cv,city1 ct where  cs.brand=cm.brand_id  and cs.version=cv.v_id and cs.city=ct.city_id LIMIT $start_from,$num_rec";
				 
				 
				 $res=mysql_query($sql);
				 $result1=mysql_num_rows($res);
				 if($result1>0)
				 { 


				
				
				while($row=mysql_fetch_array($res))
				   {
					   $sid=$row['saler_id'];
					   $bname=$row['car_company'];
					  $cityname=$row['cityname'];
					   $vname=$row['version_name'];					   
					   $ftype=$row['fuel_type'];
					   $kmd=$row['km_driven'];
					   $price=$row['e_price'];
					   $mfyear=$row['mfg_year'];
					   $hidemo=$row['hide_mobile'];
					   $mo=$row['mobile'];
					   $email=$row['email_id'];
				
				 ?>
				  <div style="width:800px">	
				     <table><?php
 	     				      $sqlp="select * from sell_car_photo  where saler_id='$sid'";
     		    			 $resp=mysql_query($sqlp);
		     				  $rowp=mysql_fetch_array($resp);
						      $imgsrc="admin/upload_car/sell/".$rowp['photo_src'];
                                ?>
					    
						<tr>
						    <td colspan="5" align="center"><font size="5"><b style="font-weight:bold;"><?php echo $bname;?></b></font></td>
                         </tr>  						 
						<tr> 
						   <td rowspan="5"  width="180px"><br>
						        &nbsp;&nbsp;<img src="<?php echo $imgsrc;?>" height="140" width="150" style="border:2px solid black">
						    </td>
							
						    <td colspan="4" align="center"><br><font size="3"><b style="font-weight:bold;"><?php echo $vname;?></b></font></td>
							
						 </tr>
						 <tr>
						      <td width="100px">Fuel Type:</td>
							  <td width="100px"><?php echo $ftype;?></td>
							  <td width="200px">City:</td>
							   <td width="100px"><?php echo $cityname;?></td>

						 </tr>
						 <tr>
						      <td>KM Driven:</td>
						      <td><?php echo $kmd;?></td>
							  <td>Seller EmailId:</td>
							<td><?php echo $email;?></td>
							 
						 </tr>
						  <tr>
						      <td>Price:</td>
						      <td><?php echo $price;?></td>
							 <?php if($hidemo=="no"){?>
						      <td>Seller Mobile No.:</td>
						    	 <td><?php echo $mo;?></td> 
						
						  <?php } ?>

						 </tr>
						 <tr>
						    
							<td>MFG Year: </td>
							<td><?php echo $mfyear;?></td>
						 </tr>
						 <tr>
						 <td colspan="4">&nbsp;&nbsp;<?php echo  "<a href='usedcarpicture.php?spid=$sid'> View All Picture</a>";?></td>
						 </tr>
						</table> 
						<hr>
						
						 
					 
				  </div>	 
				 <?php 
				    }
				 
				 ?>
				
<style type="text/css">
.stylish-button {
    color:#333;
    background-color:#FA2;
    border-radius:5px;
    border:none;
    font-size:16px;
    font-weight:700;
    padding:4px 16px;
   
}
</style>				
				 	<form action="usedcar.php" method="post">
						<?php
						
				 
				 $sql="select *from car_sell cs,car_make cm,car_model cmo,car_version cv,city1 ct where  cs.brand=cm.brand_id and cs.model=cmo.car_id and cs.version=cv.v_id and cs.city=ct.city_id";
				 		$res=mysql_query($sql);
						$tot_rec=mysql_num_rows($res);
						$tot_page=ceil($tot_rec/$num_rec);
						?>
								<?php echo "<a href=usedcar.php?page=1' class='stylish-button'>First</a>&nbsp;";?>
								<?php
								$fi=0;
								if(isset($_GET['page'])){
											$fi=$_GET['page'];
											
										}
									for($i=1;$i<=$tot_page;$i++){
										
										if($fi!=$i){
												echo "<a href='usedcar.php?page=".$i."' class='stylish-button'>&nbsp;".  $i."&nbsp;</a>&nbsp;";
										}
										else
										{											
											echo "<a href='usedcar.php?page=".$i."'  class='stylish-button' style='background-color:grey'>".$i."</a>&nbsp;";
										}
									}
								?>
								<?php
									echo "<a href='usedcar.php?page=".$tot_page."'  class='stylish-button'>Last</a>";
								?>
								
							</form>
							<br>
				 <?php
				 }else 
				 {
					  echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>TOTAL $result1 USED CARS  FOUND </h3>";
				 }
				 ?>

		</div>	
</td>		
</tr>
</table>

		</div>		
		
		
    <div class="clear"></div>
   <div class="clear"></div>
</div>
	
	<br>	

 
<?php
	include("master3.php");
?>	