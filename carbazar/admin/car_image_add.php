<?php
include("form_master.php");
?>
<title>
Add Version Details
</title>
<?php
include("form_master1.php");
?>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				//alert("hello);
				$("#model").hide();
			
				$("#overview").hide();
				
				
				$("#b_id").change(function(){
					//alert("a");
					var id = $(this).val();	
					//alert(id);
					if(id == "0")
					{	
						$("#model").hide();
						
						$("#overview").hide();
						
					}
					else
					{
						//alert(id);
						$.ajax({
							url:"version_sql_2.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#m_id").html(result);
								$("#model").show();
								$("#overview").show();
							}
						});
					}
				
				});
				
					
				
			
			});	
	</script>
	                  <h1 class="page-header"> Add Photos For Car </h1>
						
						<form action="car_engine_transmission.php" method="post">
						
						<table width="60%">
						<tr>
					<td>					
                                            <label class="control-label col-lg-10">Select Brand To Add photos</label>
					</td>
					<td>
					                        <div class="col-lg-12">
                                                <select name="b_id" id="b_id" class="validate[required] form-control" length="10">
                                                    <option value="0">Choose a Brand</option>
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
											<label class="control-label col-lg-10">Select Model To Add Photos</label>
						</td>
						<td>
					                        <div class="col-lg-12">
                                                <select name="m_id" id="m_id" class="validate[required] form-control" >
                                                    <option value="0">Choose a Model</option>
                                                    <?php
													include("connection.php");
													$sql=mysql_query("select * from car_model");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['car_id'];
														$car_com=$row['car_name'];
													echo "<option value=$bid>".$car_com."</option>";
													}
													?>
                                                </select>
                                            </div>
						</td>
					</tr>
					
						</table>
						
						<div class="box" id="overview">
                            <header>
                                <h5>Select Photos And Add</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        
										
										
										
										
                                    <tr>
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Add Photos">
									</center>
									</td>
									</tr>
                                    
                                </table>
                            </div>
                        </div>
						
						</form>

<?php
include("form_master2.php");
?>