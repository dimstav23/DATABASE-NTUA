<!DOCTYPE>
<html>
<head>
<title> Insertion </title>
</head>
<body>
	<?php
		$BId=$_POST["BId"];
		$LId=$_POST["LId"];
		$dor=$_POST["dor"];
		$Amount=$_POST["Amount"];		
		/*Connection*/
		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
       		if (!$connect) {
               			die(mysql_error());
      		}
      		$results = mysqli_query($connect,"INSERT INTO `project`.`Commitment` (`BId`, `LId`, `DateOfRequest`, `Amount`) VALUES ('$BId','$LId', '$dor' , '$Amount')");


		mysqli_close($connect);

		header('Location: Commitment.php');
		

	?>	
	
</body>
</html>
