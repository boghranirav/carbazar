<?php
include("master.php");
?>
<title>
View Road Tax
</title>
<?php
include("master1.php");
?>




                    <h1> Road Tax View </h1>
					<hr/>
					
				
					<br><br>
										
					<div class="box">
					<header>
                                  <h5>RTO Information</h5>
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
											<th>Engine Type</th>
											<th>Road Tax</th>
                                            <th>Insurance</th>
                                          	<th>Edit</th>
											<th>Delete</th>
                                        </tr>
                    
                                    </thead>
                                    <tbody>
									                                 <?php

					$sql="SELECT * FROM on_road_price o,states s where s.id=o.state_id";		
			
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
		
		
                                   
							
                                        <tr class="odd gradeX">
                                            <td width="22%"><?php echo $row['state']; ?></td>
											<td width="10%"><?php echo $row['engine_type']; ?></td>
											
                                            <td width="10%"><?php echo $row['rto_tax']; ?></td>   
											<td  width="10%"><?php echo $row['insurance']; ?></td>   
											<?php
											$c=$row['road_id'];
										
											echo "<td width='10%'  align='center'><a href='on_road_edit.php?rid=$c'><img src='upload_car/images.jpg' alt='Edit' width='25px'></a></td>";
											echo "<td width='10%'  align='center'><a href='on_road_delete.php?rid=$c'><img src='upload_car/delete_edit.png' alt='Delete' width='25px'></a></td>";
											?>
                                        </tr>
							

		<?php
		}
		
        ?>             

                                    </tbody>
                                </table>
								</div>
								</div>
					
					
					

					
					
				<a href="on_road.php" class="btn btn-primary btn-lg btn-flat">Add New City Information</a>	
					
<?php
include("master2.php");
?>
