<?php
	include("master.php");
?>
<?php
include("faq_master.php");
?>


<h1>FeedBacks</h1>
<hr/>

                        <div class="box">
                            <header>
                                <h5>View User's Feed Back</h5>
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
											<th>Name</th>
                                            <th>Email-ID</th>
											<th>Comment</th>
											<th>Delete</th>
											
										</tr>
                                    </thead>
                                    <tbody>


                                 <?php
						include("connection.php");
	
    $sql="SELECT * FROM feedback";
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
		
		
                                   
							
                                        <tr class="odd gradeX">
											<td width="15%"><?php echo $row['c_name']; ?></td>
                                            <td width="20%"><?php echo $row['c_email']; ?></td>
                                            <td><?php echo $row['comment']; ?></td>   
											<?php 
											$fid=$row['f_id'];
											echo "<td width='10%'><a href='delete_feedback.php?fid=$fid'>Delete</a></td>";
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
include("master2.php");
?>