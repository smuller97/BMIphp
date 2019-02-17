<?php
function indexberegning($hojde,$vagt)
{
	$hojde= $hojde /100;
	$hojde = $hojde * $hojde;
	$BMI = $vagt / $hojde;
	$BMI = round($BMI,2);
	return $BMI;
}
function sundhed($BMI)
{
	$result = '';
	if($BMI < 15){$result = 'Meget alvorlig undervægtig';}
	if(15 <= $BMI && $BMI < 16){$result = 'Alvorlig undervægtig';}
	if(16 <= $BMI && $BMI < 18.5){$result = 'Undervægtig';}
	if(18.5 <= $BMI && $BMI < 25){$result = 'Normal (sund vægt)';}
	if(25 <= $BMI && $BMI < 30 ){$result = 'Overvægtig';}
	if(30 <= $BMI && $BMI < 35 ){$result = 'Overvægtig klasse 1 (moderat overvægtig)';}
	if(35 <= $BMI && $BMI < 40 ){$result = 'Overvægtig klasse 2 (Alvorlig overvægtig)';}
	if($BMI >= 40){$result = 'Overvægtig klasse 3 (Meget alvorlig overvægtig)';}	
	return $result;
}
?>
<html>
<head>
	<title>BMI beregner</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<script>
	$(document).ready(function(){
	  $(".BMI").submit(function (e){
		if ($("#hojde").val() == ""){
		  $("#hojde").css('box-shadow', '0px 0px 2px red');
		  alert('Indtast din højde, tak');
		  e.preventDefault(); 
		}
		if ($("#vagt").val() == ""){
		  $("#vagt").css('box-shadow', '0px 0px 2px red');
		  alert('Indtast vægt, tak');
		  e.preventDefault(); 
		}
	  });
	});
	</script>
	<p align="center"><span style="font-size:30px">BEREGN DIT BMI HER</span></p>
	<div align="left" style="padding-left:25%;">
	<form method="post" class="BMI">
		<table border="0">
			<tr>
				<td><label for="hojde">Din højde I cm:</label></td>
				<td><input type="text" name="hojde" id="hojde" value=""></td>
			</tr>
			<tr>
				<td><label for="vagt">Din vægt i kg: </label></td>
				<td><input type="text" name="vagt" id="vagt" value=""></td>		
			</tr>
			<tr>
				<td></td>
				<td align="right"><input type="submit" value="BEREGN BMI"></td>
			</tr>
		</table>
	</form>
	</div>
	<?php
		if (isset($_POST['hojde'])){
			$hojde = $_POST['hojde'];
			$vagt = $_POST['vagt'];
			$BMI = indexberegning($hojde,$vagt);
			$sund = sundhed($BMI);
			echo "<div align='left' style='padding-left:25%; padding-bottom:30px;'>";
			echo "Din BMI er: ".$BMI;
			echo "<br>";
			echo "Din krop er: ".$sund;
			echo "</div>";
		}
	?>
</body>
</html>

