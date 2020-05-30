<?php
	include("master1.php");
?>

<link href="css/c/emibtn.css" rel="stylesheet" type="text/css" media="all" />



<title>EMI Calculator</title>
<?php
	include("master2.php");
?>


<script language="JavaScript">
function get_round(X) { return Math.round(X*100)/100 }
function showpay() {
 if ((document.calc.loan.value == null || document.calc.loan.value.length == 0))
 {
 alert("Please enter loan amount")
 document.calc.loan.focus() ;
 return false ;
 }
 
 
 if (document.calc.months.value == null || document.calc.months.value.length == 0)
 {
 alert("Please enter loan tenure in month")
 document.calc.months.focus() ;
 return false ;
 }
 
 
 if ((document.calc.rate.value == null || document.calc.rate.value.length == 0))
 {
 alert("Please enter interest rate")
 document.calc.rate.focus() ;
 return false ;
 }
 


 if ((document.calc.loan.value == null || document.calc.loan.value.length == 0) ||
     (document.calc.months.value == null || document.calc.months.value.length == 0)
||
     (document.calc.rate.value == null || document.calc.rate.value.length == 0))
 { document.calc.pay.value = "Incomplete data";
document.calc.tot_amount.value = "Incomplete data";
document.calc.tot_interest.value = "Incomplete data";
document.calc.yearly_interest.value = "Incomplete data";
document.calc.interest_pa.value = "Incomplete data";
document.calc.interest_pm.value = "Incomplete data";
 }
 else
 {
 var princ = document.calc.loan.value;
 var term  = document.calc.months.value;
 var intr   = document.calc.rate.value / 1200;
 var yrs   = document.calc.months.value / 12;
 document.calc.pay.value = get_round(princ * intr / (1 - (Math.pow(1/(1 + intr), term))));
 document.calc.tot_amount.value = get_round(document.calc.pay.value * term);
 document.calc.tot_interest.value = get_round(document.calc.tot_amount.value - princ);
 document.calc.yearly_interest.value = get_round(document.calc.tot_interest.value / yrs);
 document.calc.interest_pa.value = get_round(document.calc.yearly_interest.value / princ * 100);
 document.calc.interest_pm.value = get_round((document.calc.yearly_interest.value / princ * 100)/12);
 }
 return false;
}
</script>
	

<hr color="lightgrey" size="1">
<br>

<div class="wrap">

<h4 class="title">    		  
Car Loan EMI Calculator
</h4>

<div class="main">

<center>
<br>
				<div style="width:850px;height:320px;background:#F8F8FF;">
				<br>
				<div class="login-title">
	           		<h4 class="title">Car Loan EMI Calculator</h4>
					<div id="loginbox" class="loginbox">
					<div style="margin-left:0.5cm">
					<font size="2cm">
					<p align="left">Calculate Car Loan EMI of HDFC Bank, Axis Bank, ICICI Bank, State Bank of India and Other Finance Companies in India.
					<p align="left">By using stated Car Loan EMI Calculator , you can know :-
					<p align="left">EMI , Interest Payable across loan tenor and Total Amount due to Bank
					</font>
					</div>
					<br>
					<form id="calc" name="calc" method="post"> 
						<table>
						<tr>
							<td><b style="font-weight:bold">Inputs</b></td>
							<td width="200px"></td>
							<td><b style="font-weight:bold">Effect of Extra Payments</b></td>
							<td></td>
						</tr>
						
						<tr>
							<td><br><font color="red">Loan Amount (in Rs.)</font></td>
							<td><br><input type="text" name="loan" style="height:20px;font-size:15px" size="15" maxlength="9"></td>
							<td><br><font color="red">Monthly EMI</font></td>
							<td><br><input type="text" name="pay" disabled style="background-color:white;height:20px;font-size:15px" size="15" ></td>
						</tr>
						
						<tr>
							<td><font color="red">Term of Loan (in Months)</font></td>
							<td><input type="text" name="months" style="height:20px;font-size:15px" size="15" maxlength="3" ></td>
							<td><font color="red">Total Amount with Interest</font></td>
							<td><input type="text" name="tot_amount" disabled style="background-color:white;height:20px;font-size:15px"  size="15" ></td>
						</tr>
						
						<tr>
							<td><font color="red">Interest Rate (in %)</font></td>
							<td><input type="text" name="rate" style="height:20px;font-size:15px" size="15" maxlength="5" ></td>
							<td><font color="red">Total Interest Payable</font></td>
							<td><input type="text" name="tot_interest" disabled style="background-color:white;height:20px;font-size:15px" size="15" ></td>
						</tr>
						
						<tr>
						<td></td>
						<td><br>
						<input name="Submit" type="button" value="Calculate EMI" onclick="return showpay();" class="btn" style="width:155px">
						</td>
						<td><br><input name="Submit"value="Reset" type="reset" class="btn"></td>
						</tr>
						
						
					</table>
					</form>

	
					</div>
			    </div>
				</div>
</center>
				
					
</div>

</div>
	<div class="clear"></div>		

<br>
<?php
	include("master3.php");
?>

