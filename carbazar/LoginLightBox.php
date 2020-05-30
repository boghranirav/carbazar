<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Login LighBox Effect Example from Developer code</title>
    <style type="text/css">
    
        .label
        {
            font-family: Verdana;
            font-size: medium;
            font-weight: bold;
            color: #000000;
        }
        .click
        {
            font-family: Verdana;
            font-size: medium;
            font-weight: bold;
            color: #000000;
            
        }
    
        .Title
        {
            font-family: Verdana;
            font-size: large;
            font-weight: bold;
            color: #FF9900;
        }
    
        #Button1
        {
            width: 64px;
             font-family: Verdana;
            font-size: medium;
            font-weight: bold;
            background-color:Teal;
            color:#FFF;
        }
      .black_overlay{
			display: none;
			position: absolute;
			top: 0%;
			left: 0%;
			width: 100%;
			height: 100%;
			background-color: black;
			z-index:1001;
			-moz-opacity: 0.8;
			opacity:.80;
			filter: alpha(opacity=80);
		}
		.white_content {
			display: none;
			position: absolute;
			top: 20%;
			left:27%;
			width: 320px;
			height: 150px;
			padding: 16px;
			box-shadow:inset 0 0 4px 4px #999;
			background-color: white;
			z-index:1002;
			overflow: auto;
			border-radius:10px;
			margin-left:8%;
		}
		
    </style>
    <script type="text/javascript" language="javascript">
    function createlightbox()
    {
        document.getElementById('light').style.display='block';
        document.getElementById('fade').style.display='block'
    }
    function closelightbox()
    {
        document.getElementById('light').style.display='none';
        document.getElementById('fade').style.display='none'
    }
    </script>
</head>
<body>
<table width="100%">

<tr><td>
<p class="click"><input type="button" name="login" onclick = "createlightbox()" value="Click Here Login Form" /></p>

<div id="light" class="white_content"> 
<!--<a href = "javascript:void(0)" onclick = "closelightbox()" style="float:right">-->
	<form action="#">
    <table align="center" cellpadding="5" cellspacing="5" >
    <tr>
    <td colspan="2" class="Title" align="center">Select City To Find On Road Price</td>
    </tr>
        <tr>
            <td class="label">              
                Select City :</td>
            <td align="center">
				<select style="height:30px">	
					<option>--Select City--</option>
					<?php
						include("connection.php");
						$sql="select * from city1 order by cityname";
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res)){
							echo "<option>".$row['cityname']."<option>";
						}
					?>
					
				</select>
			</td>
        </tr>
       
        <tr  >
            <td colspan="2" align="center">              
               
            
              <input id="Button1" type="button" value="Submit" />
			  </td></tr></table>
			  </form>
           </div></td></tr>
     
    </table>   

 <div id="fade" class="black_overlay"></div>
</body>
</html>




