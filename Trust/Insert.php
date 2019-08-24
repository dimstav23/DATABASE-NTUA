<!DOCTYPE>
<html>
<head>
<title> Insertion </title>
</head>
<body>
	<?php

		$BId=$_POST["BId"];
		$LId=$_POST["LId"];
		$Percentage=$_POST["Percentage"];
	
		/*Connection*/
		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
       		if (!$connect) {
               			die(mysql_error());
      		}
      		$results = mysqli_query($connect,"INSERT INTO `project`.`Trust` (`BId`, `LId`, `Percentage`) VALUES ('$BId', '$LId', '$Percentage')");


		mysqli_close($connect);

		header('Location: Trust.php');
		

	?>	
	
</body>
</html>
