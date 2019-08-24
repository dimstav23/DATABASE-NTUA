<!DOCTYPE>
<html>
<head>
<title> Insertion </title>
</head>
<body>
	<?php

		$Id=$_POST["Id"];
		$DOP=$_POST["DOP"];
		$Amount=$_POST["Amount"];
		/*Connection*/
		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
       		if (!$connect) {
               			die(mysql_error());
      		}
      		$results = mysqli_query($connect,"INSERT INTO `project`.`Repayment` (`Id`, `DateOfPayment`, `Amount`) VALUES ('$Id', '$DOP', '$Amount')");


		mysqli_close($connect);

		header('Location: Repayment.php');
		

	?>	
	
</body>
</html>
