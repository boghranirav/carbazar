<?php
	include("master1.php");
?>
<link href="css/select.css" rel="stylesheet" type="text/css" media="all" />
<title>Road Side Assistance</title>
<?php
	include("master2.php");
?>


	<hr color="lightgrey" size="1">
	<br>
	
	
<div class="wrap">

<?php
			if(isset($_POST['submit'])){
				$b=$_POST['sel_brand'];
				if($b=='null'){
					header("location:road_side_assistance.php");
				}
				else
				{
				include("connection.php");
				$sql="select * from car_make where brand_id=$b";
				$res=mysql_query($sql);
				$row=mysql_fetch_array($res);
				echo  "<h4 class='title'>".$row['car_company']." Roadside Assistance Numbers</h4>";
				}
				} 
			else
			{
    	      echo "<h4 class='title'>Roadside Assistance Numbers Are Available For  &nbsp;";
			
				include("connection.php");
					$sql="select count(*)as tot from  road_side_assistance";
					$res=mysql_query($sql);
					$row=mysql_fetch_array($res);
					echo $row['tot'];
			
			  echo "&nbsp;  Brands in India</h4>";
			}
?>
			<br>
			
			<form action="" method="post">
			
			<table width="35%">
			<tr>
			<td width="40%">
			<br>
			
			<select class="select-btn" name="sel_brand">
				<option value="null">--Select Brand/ Show All --</option>
				<?php
					include("connection.php");
					$sql="select * from  road_side_assistance r,car_make c where c.brand_id=r.brand_id";
					$res=mysql_query($sql);
					
					while($row=mysql_fetch_array($res)){
				?>
						<option value="<?php echo $row['brand_id'];?>" <?php if(isset($_POST['submit'])){ if ($b==$row['brand_id']) echo "selected";} ?>><?php echo $row['car_company']; ?></option>;
				<?php
					}
				?>
			</select>
			</td>
			<td width="10%">
			<br>
			<button class="grey"  name="submit">Submit</button>
			</td>
			</tr>
			</table>
			</form>
			<br>
			  <div class="section group">
			  
    		<?php
				include("connection.php");
				if(isset($_POST['submit'])){
					$b=$_POST['sel_brand'];
					if($b=="null")
							$sql="select * from road_side_assistance c,car_make cm where cm.brand_id=c.brand_id";
					else
							$sql="select * from road_side_assistance c,car_make cm where cm.brand_id=c.brand_id and c.brand_id=$b";
				}
				else
				{
				$sql="select * from road_side_assistance c,car_make cm where cm.brand_id=c.brand_id";
				}
				$res=mysql_query($sql);
				while($row=mysql_fetch_array($res)){
					$car_com=$row['car_company'];
					$road_ass=$row['assist_number'];
					$img=$row['imgsrc'];
					/*
					echo "<tr align='center' valign='middle'>";
					echo "<td rowspan='2'><img src='admin/".$img."' height='80' width='80'></td>";				
					echo "<td>".$car_com."</td>";
					echo "</tr>";
					
					echo "<tr align='center' valign='center'>";
					echo "<td >".$road_ass."</td>";
					echo "</tr>";
					*/
						echo "<div class='top-box'>";
					echo "<div class='col_1_of_3 span_1_of_3'  style='height:230px;width:220px'>";
					
					echo "<div class='inner_content clearfix'>";
					echo "<div class='product_image'>";
					echo "<img src='admin/".$img."' width='140' height='120'/>";
					echo "</div>";
                    echo "<div class='price'>";
					echo "<div class='cart-left'>";
					echo "<p class='title'>".$car_com."</p>";
					echo "<div class='price1'>";
					echo "<span class='actual'>".$road_ass."</span>";
					echo "</div>";
					echo "</div>";
					
					echo "<div class='clear'></div>";
					echo "</div>";
                    echo "</div>";
					echo "</div>";
					echo "</div>";
						
	
				}
			?>
			</div>
	<div class="clear"></div>		
	<br><br>
</div>
<?php
	include("master3.php");
?>