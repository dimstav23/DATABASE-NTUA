<!DOCTYPE>
<html>
<head>
<title> Insertion </title>
</head>
<body>
	<?php

		
		$BId=$_POST["BId"];
		$MId=$_POST["MId"];
		$DOA=$_POST["DateOfApproval"];
		$DOR=$_POST["DateOfRequest"];
		echo ($Name);		
		/*Connection*/
		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
       		if (!$connect) {
               			die(mysql_error());
      		}
      		$results = mysqli_query($connect,"INSERT INTO `project`.`Loan` (`Id`,`BId`, `MId`, `DateOfApproval`, `DateOfRequest`) VALUES (NULL, '$BId', '$MId', '$DOA', '$DOR')");


		mysqli_close($connect);

		header('Location: Loan.php');
		

	?>	
	
</body>
</html>
