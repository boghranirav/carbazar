<?php
	include("master1.php");
?>


<title>Car Bazar</title>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
		$(document).ready(function(){
				//alert("hello");
				
				$("#car_brand").change(function(){
					//alert("a");
					var id = $(this).val();	
					//alert(id);
					if(id == "0")
					{	
					
					}
					else
					{
						//alert(id);
						$.ajax({
							url:"search_ajex.php",
							type:"post",
							data:{c_id:id},
							success:function(result){
								//alert(result);
								$("#car_model").html(result);
								
							}
						});
					}
				
				});
			});
</script>


<?php
	include("master2.php");
?>



<hr color="lightgrey" size="1">
<br>

<?php
	
	if(isset($_POST['submit_mod'])){
		$carb=$_POST['car_brand'];
		$carm=$_POST['car_model'];
		if($carb !=0 && $carm!=0) {
		header("location:new_car_by_brand.php?carb=$carb&carm=$carm");
		}
	}

	if(isset($_POST['submit_bud'])){
		$cb=$_POST['c_budget'];
		if($cb>=1){
		header("location:new_car_by_budget.php?bud=$cb");
		}
	}
	
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



<div id="fwslider">
        <div class="slider_container">
            <div class="slide"> 
                <!-- Slide image -->
                    <img src="images/10338459_10152303772783355_5136225767825071506_o.jpg" alt="" height="600" width="1680">
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        
		
		<div style=" border:2px solid; width: 300px; margin: auto;background:white;" align="center">
		
		
		<font size="4">
		Find new cars by brand.
		</font>
		
		<br><br>
		<div id="brand">
		
		<form method="post">
		<select style="height:30px;width:230px;font-size:16px" name="car_brand" id="car_brand">
				<option value="0">--Select Brand--</option>
				<?php
							include("connection.php");
							$sql=mysql_query("select * from car_make order by car_company");
							while($row=mysql_fetch_array($sql)){
							$bid=$row['brand_id'];
							$car_com=$row['car_company'];
							echo "<option value=$bid>".$car_com."</option>";
							}
				?>
				
		</select>
		<br>
		<br>
		
		<select style="height:30px;width:230px;font-size:16px" name="car_model" id="car_model">
				<option value="0">--Select Model--</option>	
		</select>
		
		<br><br>
		
		<button class="grey" id="reg" name="submit_mod" style=" margin-left: 4.1cm;">Search</button>
		
		</form>
		</div>
		
		<br><br>
		<hr>
		
		<font size="4">
		Find new cars by price.
		</font>
		<br><br>
		<form method="post">
			<div id="budget" name="budget">
				<select style="height:30px;width:230px;font-size:16px" name="c_budget">
				<option value="0">--Select Budget--</option>
				<option value="1">1 Lac - 5 Lac</option>
				<option value="2">5 Lac - 10 Lac</option>
				<option value="3">10 Lac - 20 Lac</option>
				<option value="4">20 Lac - 50 Lac</option>
				<option value="5">50 Lac - 1 Crore</option>
				<option value="6">Above 1 Crore</option>
		</select>
		<br><br>
		<button class="grey" id="reg" name="submit_bud" style=" margin-left: 4.1cm;">Search</button>
		</div>
		</form>
		<br><br><br>
	</div>
						
                    </div>
                </div>
                 <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
                <img src="images/1341913.jpg" alt="" height="600" width="1680"/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
					
					
					
					<div style=" border:2px solid; width: 300px; margin: auto;background:white" align="center">
		
		
		<font size="4">
		Find Used cars by brand.
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
					
					
					
                    </div>
                </div>
            </div>
            <!--/slide -->
		
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>
    <!--/slider -->
	<br>
	
	<div class="main">
	<div class="wrap">
		
		 
		  	<h2 class="head">Brands In India</h2>
			
			<div class="section group">
			  
    		<?php
				include("connection.php");
				$sql="select * from  car_make";
				$res=mysql_query($sql);
				while($row=mysql_fetch_array($res)){
					$bid=$row['brand_id'];
					$bname=$row['car_company'];
					$imgsrc=$row['imgsrc'];
					
						echo "<div class='top-box'>";
					echo "<div class='col_1_of_3 span_1_of_3' style='height:210px;width:210px'>";
					echo "<a href='all_car_by_brand.php?bid=$bid'>";
					echo "<div class='inner_content clearfix'>";
					echo "<div class='product_image'>";
					echo "<img src='admin/".$imgsrc."' width='150px' height='135px'/>";
					echo "</div>";
                    echo "<div class='price'>";
					echo "<div class='cart-left'>";
					echo "<p class='title'>".$bname."</p>";
					
					echo "</div>";
					
					echo "<div class='clear'></div>";
					echo "</div>";
                    echo "</div>";
					echo "</a>";
					echo "</div>";
					echo "</div>";
						
	
				}
			?>
			</div>
			
			
			
			
	   <div class="clear"></div>
	</div>
	</div>
	</div>
	
	<br>


	
	
	



<?php
	include("master3.php");
?>
