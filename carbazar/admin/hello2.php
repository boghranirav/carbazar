<?php
include("master1.php");
?>



                        <div class="box">
                            <header>
                                <h5>Simple Table</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-bordered sortableTable responsive-table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User Name</th>
                                            <th>First Name</th>
											<th>Last Name</th>
											<th>Email Id</th>
											<th>Edit</th>
											<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                 <?php
						mysql_connect("localhost","root","") or die("DB Not Connected");
    mysql_select_db("demo");
	
    $sql="SELECT * FROM login";
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
		
		
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['userid']; ?></td>   
											<td><?php echo $row['firstname']; ?></td>
											<td><?php echo $row['lastname']; ?></td>
											<td><?php echo $row['email_id']; ?></td>
											<td><a href="">Edit</a></td>
											<td><a href="">Delete</a></td>
                                        </tr>
                              
                                  
                                    </tbody>

		<?php
		}
    
					  ?>
                               


                                    </tbody>
                                </table>
                            </div>
                        </div>










                                   
                     
					                             
								

<?php
include("master2.php");
?>
