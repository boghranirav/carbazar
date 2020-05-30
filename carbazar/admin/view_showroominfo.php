<?php
include("master.php");
?>
<title>
Dealer Information
</title>
<?php
include("master1.php");
?>



                    <h1> Car Dealers Information </h1>
					<hr/>
					
					
										
					
					<div class="box">
					<header>
                                <h5>Dealers Information</h5>
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
											
                                            <th>State</th>
                                            <th>City</th>
                                          	<th>Brand</th>
											<th>Dealer Name</th>
											<th>Address</th>
											<th>Contact</th>
											<th>Email</th>
											<th>Edit</th>
											<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

include("connection.php");
								$sql="SELECT * FROM car_dealers cd,states s,city1 c,car_make b where cd.state_id=s.id and cd.city_id=c.city_id and cd.brand_id=b.brand_id";
 
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
		
		
                                   
							
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['state']; ?></td>
                                            <td><?php echo $row['cityname']; ?></td>   
											<td><?php echo $row['car_company']; ?></td>   
											<td><?php echo $row['dealer_name']; ?></td>   
											<td><?php echo $row['address']; ?></td>   
											<td><?php echo $row['phone_no']; ?></td>   
											<td><?php echo $row['email']; ?></td>   
											
											<?php
											$c=$row['d_id'];
											echo "<td align='center'><a href='showroom_edit.php?id=$c'><img src='upload_car/images.jpg' alt='Edit' width='25px'></a></td>";
											echo "<td align='center'><a href='showroom_delete.php?id=$c'><img src='upload_car/delete_edit.png' alt='Delete' width='25px'></a></td>";
											?>
                                        </tr>
							

		<?php
		}
		
        ?>             
                                    </tbody>
                                </table>
								</div>
								</div>
								
						
						
						
								
					
					
				<a href="showroominfo.php" class="btn btn-primary btn-lg btn-flat">Add New Dealer</a>
			
					
<?php
include("master2.php");
?>
