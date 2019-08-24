<!DOCTYPE>
<html>
	<head>
		<title>Project</title>
	</head>
	<body>
		<p id="names"></p>
		<div id="mytitle">
			<h1><em>Query Results' Table</em></h1>
		</div>		
		<div class="menu2">
		    <a href="../Borrower/Borrower.php" >Borrower</a>
		    <a href="../Commitment/Commitment.php">Commitment</a>
		    <a href="../DeadLine/DeadLine.php">Deadline</a>
		    <a href="../Intermediary/Intermediary.php">Intermediary</a>
		    <a href="../Lender/Lender.php">Lender</a>
		    <a href="../Loan/Loan.php">Loan</a>
		    <a href="../LoanRequest/LoanRequest.php">Loan Requests</a>
		    <a href="../Repayment/Repayment.php">Repayment</a>
		    <a href="../Trust/Trust.php">Trust</a>
		    <a href="../index.php">Back To Menu</a>
		</div>
		<link type="text/css" rel="stylesheet" href="index.css">
		<center><h2>Show me the biggest amounts requested</h2></center>
		<table id="Borrower">
		<?php
            		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
            		if (!$connect) {
                			die(mysql_error());
            		}
            		$results = mysqli_query($connect,"SELECT Borrower.Name AS Bname , LoanRequest.DateOfRequest AS DOR
								FROM Borrower, LoanRequest
								WHERE Borrower.BId=LoanRequest.BId
								ORDER BY LoanRequest.Amount ASC");
		?>
		<tr id="firstrow"><th>Borrower's Name</th><th>Date of Loan Request</th></tr>	
		<?php
            		while($row = $results->fetch_assoc()) {
			$Borrow =$row['Bname'];
			$Tr = $row['DOR'];
		?>
			
		        <tr onClick="visited(this)" style="background-color:#000000">
		            <td style="background: hsl(50, 50%, 80%)" id="mykey"><?php echo $Borrow ?></td>
		            <td style="background: hsl(50, 50%, 80%)"><?php echo $Tr ?></td>
		            <td style="background: hsl(50, 50%, 80%)"><?php echo $L ?></td>
		        </tr>

            	<?php
            		}
			mysqli_close($connect);
            	?>
		</table>

		
		<div id="footer_menu">
			<p id="queries">My Queries</p>
			<ul class="dropup">	
				<a href="Query1.php"><li>Query1</li></a>
				<a href="Query2.php"><li>Query2</li></a>
				<a href="Query3.php"><li>Query3</li></a>
				<a href="Query4.php"><li>Query4</li></a>
				<a href="Query5.php"><li>Query5</li></a>
				<a href="Query6.php"><li>Query6</li></a>
				<a href="Query7.php"><li>Query7</li></a>
				<a href="Query8.php"><li>Query8</li></a>
				<a href="Query9.php"><li>Query9</li></a>
				<a href="Query10.php"><li>Query10</li></a>
			</ul>
		</div>
		
		<div id="view1">
			<a href="../ViewsTriggers/view1.php"><button type="button" id="view">Updatable View</button></a>
		</div>
		<div id="view2">
			<a href="../ViewsTriggers/view2.php"><button type="button" id="view">Non-Updatable View</button></a>
		</div>

		
		<div id="trigger1">
			<a href="../ViewsTriggers/trigger1.php"><button type="button" id="trigger">Trigger1</button></a>
		</div>
		<div id="trigger2">
			<a href="../ViewsTriggers/trigger2.php"><button type="button" id="trigger">Trigger2</button></a>
		</div>
	</body>
</html>
