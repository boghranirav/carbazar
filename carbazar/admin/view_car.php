<?php
include("master.php");
?>
<title>
View Car Details
</title>
<?php
include("master1.php");
?>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				//alert("hello);
				$("#overview").hide();
				$("#overview1").hide();
				$("#overview2").hide();
				$("#overview3").hide();
				$("#overview4").hide();
				$("#overview5").hide();
				$("#overview6").hide();
				$("#overview7").hide();
				$("#overview8").hide();
				$("#overview9").hide();
				$("#overview10").hide();
				$("#overview11").hide();
				$("#overview12").hide();
				$("#overview13").hide();
				$("#overview14").hide();
				$("#overview15").hide();
				
				$("#b_id").change(function(){
					//alert("a");
					var id = $(this).val();	
					//alert(id);
					if(id == "0")
					{	
						
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
						$("#overview11").hide();
						$("#overview12").hide();
						$("#overview13").hide();
						$("#overview14").hide();
						$("#overview15").hide();
					}
					
					else
					{
						//alert(id);
						$.ajax({
							url:"view_car_sql.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#m_id").html(result);
								
							}
						});
					}
				
				});
				
					$("#m_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
						$("#overview11").hide();
						$("#overview12").hide();
						$("#overview13").hide();
						$("#overview14").hide();
						$("#overview15").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql.php",
							type:"post",
							data:{m_id:id1},
							success:function(result1){
							//	alert(result1);
								$("#v_id").html(result1);
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
						$("#overview11").hide();
						$("#overview12").hide();
						$("#overview13").hide();
						$("#overview14").hide();
						$("#overview15").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
							//	alert(result1);
								$("#comf_view").html(result1);
							//	$("#trans_view").html(result1);
								$("#overview").show();
													
							
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
						$("#overview11").hide();
						$("#overview12").hide();
						$("#overview13").hide();
						$("#overview14").hide();
						$("#overview15").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql1.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#trans_view").html(result1);
								$("#overview1").show();
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview4").hide();
						$("#overview5").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql2.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#suspension").html(result1);
								$("#overview2").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview9").hide();
						
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql3.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#steering").html(result1);
								$("#overview3").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview9").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql4.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#brake").html(result1);
								$("#overview4").show();
								
							}
						});
					}
				
				});
				
					$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview9").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql5.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#performance").html(result1);
								$("#overview5").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview9").hide();
						$("#overview10").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql6.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#fuel").html(result1);
								$("#overview6").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview9").hide();
						$("#overview10").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql7.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#tyre").html(result1);
								$("#overview7").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql8.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#other").html(result1);
								$("#overview8").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql9.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#general").html(result1);
								$("#overview9").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql10.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#comfort").html(result1);
								$("#overview10").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
						$("#overview11").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql11.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#interior").html(result1);
								$("#overview11").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
						$("#overview11").hide();
						$("#overview12").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql12.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#exterior").html(result1);
								$("#overview12").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
						$("#overview11").hide();
						$("#overview12").hide();
						$("#overview13").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql13.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#entertainment").html(result1);
								$("#overview13").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
						$("#overview11").hide();
						$("#overview12").hide();
						$("#overview13").hide();
						$("#overview14").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql14.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#exterior_d").html(result1);
								$("#overview14").show();
								
							}
						});
					}
				
				});
				
				$("#v_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						$("#overview").hide();
						$("#overview1").hide();
						$("#overview2").hide();
						$("#overview3").hide();
						$("#overview4").hide();
						$("#overview5").hide();
						$("#overview6").hide();
						$("#overview7").hide();
						$("#overview8").hide();
						$("#overview9").hide();
						$("#overview10").hide();
						$("#overview11").hide();
						$("#overview12").hide();
						$("#overview13").hide();
						$("#overview14").hide();
						$("#overview15").hide();
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_car_sql15.php",
							type:"post",
							data:{v_id:id1},
							success:function(result1){
						
								$("#safety").html(result1);
								$("#overview15").show();
								
							}
						});
					}
				
				});
			
			});	
	</script>
	
	
	

                        <h1 class="page-header"> View Car Details</h1>
						
						<form action="car_engine_transmission.php" method="post">
						
						<table width="50%">
						<tr>
					<td width="30%">					
                                            <label class="control-label col-lg-10">Select Brand To Display</label>
					</td>
					<td width="40%">
					                        <div class="col-lg-12">
                                                <select name="b_id" id="b_id" class="validate[required] form-control" length="10">
                                                    <option value="0">--Select a Brand--</option>
                                                    <?php
													include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['brand_id'];
														$car_com=$row['car_company'];
													echo "<option value=$bid>".$car_com."</option>";
													}
													?>
                                                </select>
                                            </div>
					</td>
					</tr>						
					<tr id="model">
						<td>
											<label class="control-label col-lg-10">Select Model To Display</label>
						</td>
						<td>
					                        <div class="col-lg-12">
                                                <select name="m_id" id="m_id" class="validate[required] form-control" >
                                                    <option value="0">--Select a Model--</option>
                                                   
                                                </select>
                                            </div>
						</td>
					</tr>
					<tr id="version">
						<td>
											<label class="control-label col-lg-10">Select Car Version</label>
						</td>
						<td>
					                        <div class="col-lg-12">
                                                <select name="v_id" id="v_id" class="validate[required] form-control" >
                                                    <option value="0">--Select a Version--</option>
                                                   
                                                </select>
                                            </div>
						</td>
					</tr>
						</table>
						
					
					<div class="box" id="overview">
                            <header>
                                <h5> Engine</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                              <div class="panel-body">
								<div class="table-responsive">
                                <table id="comf_view" class="table table-striped table-bordered table-hover">
                                    <tr>
									
									</tr>
                                </table>
								</div>
							</div>
                            </div>
					</div>
					
					<div class="box" id="overview1">
						<header>
                                <h5> Transmission </h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable1" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable1" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="trans_view" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview2">
						<header>
                                <h5> Suspension System </h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable2" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable2" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="suspension" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview3">
						<header>
                                <h5> Steering System </h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable3" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable3" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="steering" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview4">
						<header>
                                <h5> Brake System </h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable4" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable4" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="brake" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview5">
						<header>
                                <h5> Performance </h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable5" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable5" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="performance" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview6">
						<header>
                                <h5> Fuel System </h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable6" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable6" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="fuel" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview7">
						<header>
                                <h5> Tyres </h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable7" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable7" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tyre" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview8">
						<header>
                                <h5> Other Specification</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable8" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable8" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="other" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview9">
						<header>
                                <h5> General Car Details</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable9" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable9" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="general" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview10">
						<header>
                                <h5> Comfort And Convenience</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable10" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable10" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="comfort" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview11">
						<header>
                                <h5> Interior</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable11" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable11" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="interior" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview12">
						<header>
							<h5>Exterior</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable12" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable12" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="exterior" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview13">
						<header>
							<h5>Entertainment</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable13" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable13" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="entertainment" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview14">
						<header>
							<h5>Exterior Dimensions</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable14" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable14" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="exterior_d" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						<div class="box" id="overview15">
						<header>
							<h5>Safety Information</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable15" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable15" class="body collapse in">
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table id="safety" class="table table-striped table-bordered table-hover">
                                <tr>
								</tr>
                                </table>
                            </div>
                        </div>
                            </div>
						</div>
						
						</form>

<?php
include("master2.php");
?>