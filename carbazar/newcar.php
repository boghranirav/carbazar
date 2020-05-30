<?php  
	include("master1.php");

?>
<title>New Cars </title>

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
	
<hr size="1" color="lightgrey">
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
?>



<div class="wrap">
                	<h4 class="title">
					Search New Cars
					</h4>
			
        <br>
<div style=" border:2px solid; width: 300px; margin: auto;background:white" align="center">
		
		
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
				
				
    <div class="clear"></div>
   <div class="clear"></div>
</div>
	
		<br>
		<br>

 
<?php
	include("master3.php");
?>	