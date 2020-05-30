<form action="tabs_panels.php" method="post" id="form1">
					
					
                                            <label class="control-label col-lg-4">Select Brand To Display</label>
					                        <div class="col-lg-4">
                                                <select name="brand" id="sport" class="validate[required] form-control" length="10" onChange="loadSite()";>
                                                    <option value="">Choose a Brand</option>
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
                    
					 
					 </form>
					
					<br><br>
										
					
					<div class="box">
					<header>
                                <h5>Brand Information</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>Car Id</th>
                                            <th>Brand Id</th>
                                            <th>Car Name</th>
											<th>Status</th>
                                          	<th>Edit</th>
											<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                 <?php
								 
								 include("connection.php");
								 if(isset($_POST['search']))
								 {
									 $brand=$_POST['brand'];
									 echo $brand;
									  $sql="SELECT * FROM car_model cmo, car_make cm  where cmo.brand_id='$brand' and cmo.brand_id=cm.brand_id";
								 }
								else
								{	
								$sql="SELECT * FROM car_model";
								}
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
		
		
                                   
							
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['car_id']; ?></td>
                                            <td><?php echo $row['brand_id']; ?></td>   
											<td><?php echo $row['car_name']; ?></td>   
											<td><?php echo $row['status']; ?></td> 
											<td><a href="">Edit</a></td>
											<td><a href="">Delete</a></td>
                                        </tr>
							

		<?php
		}
        ?>             
                                    </tbody>
                                </table>
						
						<form action="tabs_panels.php" method="post">
								<a href="tabs_panels.php?id=$" class="btn btn-default btn-lg btn-rect">Next</a>
								<a href="tabs_panels.php?id=$" class="btn btn-default btn-lg btn-rect">Prev</a>
						</form>