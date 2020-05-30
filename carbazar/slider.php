<?php
	include("master1.php");
?>
<title>title here</title>

<?php
	include("master2.php");
?>

<input type="range" min="0" max="1000000" value="0" step="5" onchange="showValue(this.value)" />
<span id="range">0</span>
<script type="text/javascript">
function showValue(newValue)
{
	document.getElementById("range").innerHTML=newValue;
}
</script>

<?php
	include("master3.php");
?>

