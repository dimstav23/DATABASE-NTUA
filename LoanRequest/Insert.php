<!DOCTYPE>
<html>
<head>
<title> Insertion </title>
</head>
<body>
	<?php

		$BId=$_POST["BId"];
		$DOR=$_POST["DateOfRequest"];
		$Amount=$_POST["Amount"];
		$DeadLine=$_POST["DeadLine"];
		$Description=$_POST["Description"];
		$PaybackPeriod=$_POST["PaybackPeriod"];
		$Percentage=$_POST["Percentage"];		
		/*Connection*/
		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
       		if (!$connect) {
               			die(mysql_error());
      		}
      		$results = mysqli_query($connect,"INSERT INTO `project`.`LoanRequest` (`BId`, `DateOfRequest`, `Amount`, `DeadLine`, `Description`, `PaybackPeriod`,`Percentage`) VALUES ('$BId', '$DOR', '$Amount', '$DeadLine', '$Description', '$PaybackPeriod','$Percentage')");


		mysqli_close($connect);

		header('Location: LoanRequest.php');
		

	?>	
	
</body>
</html>
