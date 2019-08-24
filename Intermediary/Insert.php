<!DOCTYPE>
<html>
<head>
<title> Insertion </title>
</head>
<body>
	<?php

		$Name=$_POST["Name"];
		$Town=$_POST["Town"];
		$StreetName=$_POST["StreetName"];
		$StreetNumber=$_POST["StreetNumber"];
		$PostalCode=$_POST["PostalCode"];
				
		/*Connection*/
		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
       		if (!$connect) {
               			die(mysql_error());
      		}
      		$results = mysqli_query($connect,"INSERT INTO `project`.`Intermediary` (`MId`, `Name`, `Town`, `StreetName`, `StreetNumber`, `PostalCode`) VALUES (NULL, '$Name', '$Town', '$StreetName', '$StreetNumber', '$PostalCode')");


		mysqli_close($connect);

		header('Location: Intermediary.php');
		

	?>	
	
</body>
</html>
