
<!DOCTYPE html>
<html>
<head>
	<title>Nomor1</title>
</head>
<body>
	<form method="post">
		<input type="text" name="inputan">
		<button type="button" name="jalankan"></button>
	</form>
</body>
</html>
<?php 
if (isset($_POST['jalankan'])) {
	$input=$_POST['inputan'];
		for($i=0;$i<$input;$i++) 
		{
			for($j=1;$j<=$input-$i;$j++) 
			{ 
		      echo "&nbsp";
			}
			for ($k=1;$k<2*$i;$k++) { 
				echo "*";
			}
		  echo "<br>";
		}

}
	
 ?>