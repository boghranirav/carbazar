<?php
	include("master1.php");
?>

<link href="css/faq/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/faq/css/style.css" rel="stylesheet" type="text/css">

<link class="alt" href="css/faq/colors/color1.css" rel="stylesheet" type="text/css">


<title>FAQ's</title>
<?php
	include("master2.php");
?>


<hr color="lightgrey" size="1">
<br>

<div class="wrap">

<h4 class="title">    		  
Frequently Asked Questions

</h4>

</div>
	<div class="clear"></div>	



<div id="content" class="content full">
        	<div class="container">
          		<div class="page">
        			<div class="row">
              			
                     	<div class="col-md-6 col-sm-6">
                			
                          <!-- Start Accordion -->
                          <div class="accordion" id="accordionArea" style="width:800px">
                        <?php
							include("connection.php");
							$sql="select * from faqs where visible='no'";
							$res=mysql_query($sql);
							$i=0;
							while($row=mysql_fetch_array($res)){
								$q=$row['question'];
								$a=$row['answer'];
								$i=$i+1;
								
						?>
						   
                            <div class="accordion-group panel">
                              <div class="accordion-heading accordionize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionArea" href="#<?php echo $i;?>">
							  <font size="4pt"><b style="font-weight: bold;"><?php echo "Q.".$i.": ".$q;?></b></font>
							  <i class="fa fa-angle-down"></i> </a> </div>
                              <div id="<?php echo $i;?>" class="accordion-body collapse">
                                <div class="accordion-inner"> 
								<font size="4pt"><?php echo "Ans : ".$a;?></font>
							</div>
                              </div>
                            </div>
						<?php
							}
                        ?>
                          </div>
                          <!-- End Accordion -->
                     	</div>
          			</div>
                  
        		</div>
      		</div>
    	</div>

  <br>
  <br>



<script src="css/faq/js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 
<script src="css/faq/js/bootstrap.js"></script>
<?php
	include("master3.php");
?>

