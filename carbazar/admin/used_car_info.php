<?php
	include("master.php");
?>
<title>Used Car Info</title>
<?php
	include("user_master1.php");
?>


<h1>Used Car Information</h1>
<hr/>
 
 <div class="box">
                            <header>
                                <h5>Admin Information</h5>
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
                                            <th>Email Id</th>
											<th>Phone No</th>	
											<th>City</th>
											<th>Version</th>
											<th>Km's Driven</th>
											<th>Price</th>
											<th>View Images</th>
											<th>Delete</th>
										</tr>
                                    </thead>
                                    <tbody>
                                 <?php
						include("connection.php");
	
    $sql="SELECT * FROM car_sell cs,city1 ci,car_version cv where cs.city=ci.city_id and cs.version=cv.v_id";
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		?>
                                        <tr class="odd gradeX">
                                            <td width="20%"><?php echo $row['email_id']; ?></td>   
											<td width="9%"><?php echo $row['mobile']; ?></td>
											<td width="11%"><?php echo $row['cityname']; ?></td>
											<td width="25%"><?php echo $row['version_name']; ?></td>
											<td width="10%"><?php echo $row['km_driven']; ?></td>
											<td width="8%"><?php echo $row['e_price']; ?></td>
											<?php $id=$row['saler_id']; ?>
											<?php
											echo "<td><a href='used_car_image.php?sid=$id'>View Images</a></td>";
											echo "<td><a href='used_car_delete.php?sid=$id'>Delete</a></td>";
											?>
											
                                        </tr>
							

		<?php
		}
        ?>             
                                    </tbody>
                                </table>
                            </div>
                        </div>


 
<?php
	include("user_master2.php");
?>