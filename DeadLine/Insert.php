<!DOCTYPE>
<html>
<head>
<title> Insertion </title>
</head>
<body>
	<?php

		$Id=$_POST["Id"];
		$DateOfAgreement=$_POST["DateOfAgreement"];
		$DeadLine=$_POST["Deadline"];		
		/*Connection*/
		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
       		if (!$connect) {
               			die(mysql_error());
      		}
      		$results = mysqli_query($connect,"INSERT INTO `project`.`DeadLine` (`Id`, `DateOfAgreement`, `DeadLine`) VALUES ('$Id','$DateOfAgreement','$DeadLine')");


		mysqli_close($connect);

		header('Location: DeadLine.php');
		

	?>	
	
</body>
</html>
