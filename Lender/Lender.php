<!DOCTYPE>
<html>
	<head>
		<title>Project</title>
	</head>
	<body>
		<p id="names"></p>
		<div id="mytitle">
			<h1><em>Lenders' Table</em></h1>
		</div>	
		<div class="menu2">
		    <a href="../Borrower/Borrower.php" >Borrower</a>
		    <a href="../Commitment/Commitment.php">Commitment</a>
		    <a href="../DeadLine/DeadLine.php">Deadline</a>
		    <a href="../Intermediary/Intermediary.php">Intermediary</a>
		    <a href="../Lender/Lender.php" class="current">Lender</a>
		    <a href="../Loan/Loan.php">Loan</a>
		    <a href="../LoanRequest/LoanRequest.php">Loan Requests</a>
		    <a href="../Repayment/Repayment.php">Repayment</a>
		    <a href="../Trust/Trust.php">Trust</a>
		    <a href="../index.php">Back To Menu</a>
		</div>	
		<link type="text/css" rel="stylesheet" href="index.css">
		<script type="text/javascript" language="javascript" >
		var selectedRow

function visited(tr) {
    var table = tr.parentNode.parentNode;
    var trs = table.getElementsByTagName('tr');
    
    for (var i = 0; i < trs.length; i++)
        {
        //trs[i].style.backgroundColor = null;
        trs[i].style.color = null;
        }
    
    
   
    //tr.style.backgroundColor = '#eeff33';
    tr.style.color = '#0000ff';

}


function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
		var LId = row.cells[1].innerHTML;
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
		    rowCount--;
                    i--;
		    //$.post("delete.php",{BId:row.cells[1].childNodes[0]});
		    window.location.href = "delete.php?LId=" + LId ; //send the keys to php
                    //table.deleteRow(i);
		    return;
                    
                }
	}
 		window.location.href = "delete.php?LId=" + -1 ; //if none found return
 
            
            }catch(e) {
		
                alert(e);
            }
        }


function updateRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 	    	var form = document.forms[1];
	    	var Name = form.elements[0].value;
		var Town = form.elements[1].value;
		var StreetName = form.elements[2].value;
		var StreetNumber = form.elements[3].value;
		var PostalCode = form.elements[4].value;
	//	if(!Name) Name=-1;
	//	if(!Town) Town=-1;
	//	if(!StreetName) StreetName=-1;
	//	if(!StreetNumber) StreetNumber=-1;
	//	if(!PostalCode) PostalCode=-1;
		

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
		var BId = row.cells[1].innerHTML;
		

                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
		    rowCount--;
                    i--;
		    
		    //$.post("delete.php",{BId:row.cells[1].childNodes[0]});
		    window.location.href = "update.php?BId=" + BId + "&Name=" + Name + "&Town=" + Town + "&StreetName=" + StreetName + "&StreetNumber=" + StreetNumber + "&PostalCode=" + PostalCode ; //send the keys to php
                    //table.deleteRow(i);
                   return;
                }
 	    }
		window.location.href = "update.php?BId=" + -1 ; //if none found return
 
            
            }catch(e) {
		
                alert(e);
            }
        }

	
</script>
		<table id="Lender">
		<?php
            		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
            		if (!$connect) {
                			die(mysql_error());
            		}
            		$results = mysqli_query($connect,"SELECT * FROM Lender");
		?>
		<tr id="firstrow"><th></th><th>LId</th><th>Name</th><th>Town</th><th>Street Name</th><th>Street Number</th><th>Postal Code</th></tr>			
		<?php
            		while($row = mysqli_fetch_array($results)) {
		?>
			
		        <tr onClick="visited(this)" style="background-color:#000000">
			    <td><input type="radio" name="check[]" class="mybox" style="background-color:#000000"/></td>
		            <td style="background: hsl(50, 50%, 80%)"><?php echo $row['LId']?></td>
		            <td style="background: hsl(50, 50%, 80%)"><?php echo $row['Name']?></td>
		            <td style="background: hsl(50, 50%, 80%)"><?php echo $row['Town']?></td>
		            <td style="background: hsl(50, 50%, 80%)"><?php echo $row['StreetName']?></td>
		            <td style="background: hsl(50, 50%, 80%)"><?php echo $row['StreetNumber']?></td>
		            <td style="background: hsl(50, 50%, 80%)"><?php echo $row['PostalCode']?></td>
		        </tr>

            	<?php
            		}
			mysqli_close($connect);
            	?>
		</table>
		<div id="mybuttons">
			<ul>
				<li><a href="#popup3"> <button type="button" id="update">Update</button></a></li>
		 		<li><a href="#popup1"> <button type="button" id="insert">Insert</button></a></li>
		 		<li><a href="#popup2"> <button type="button" id="delete">Delete</button></a></li>
			</ul>
		</div>
		
		<div id="footer_menu">
			<p id="queries">My Queries</p>
			<ul class="dropup">	
				<a href="../Queries/Query1.php"><li>Query1</li></a>
				<a href="../Queries/Query2.php"><li>Query2</li></a>
				<a href="../Queries/Query3.php"><li>Query3</li></a>
				<a href="../Queries/Query4.php"><li>Query4</li></a>
				<a href="../Queries/Query5.php"><li>Query5</li></a>
				<a href="../Queries/Query6.php"><li>Query6</li></a>
				<a href="../Queries/Query7.php"><li>Query7</li></a>
				<a href="../Queries/Query8.php"><li>Query8</li></a>
				<a href="../Queries/Query9.php"><li>Query9</li></a>
				<a href="../Queries/Query10.php"><li>Query10</li></a>
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

		<div id="popup1" class="overlay">
			<div class="popup">
				<h2>Fill up with caution!</h2>
				<a class="close" href=""><button type="button" id="delete">X</button></a>
				<!--<a class="submit" href="Insert.php"><button type="sumbit" id="submit" >Submit</button></a>-->
				<div class="content">
					 <form action="Insert.php" method="post">
						Name:<br>
						<input type="text" name="Name"><br>
						Town:<br>
						<input type="text" name="Town"><br>
						Street Name:<br>
						<input type="text" name="StreetName"><br>
						Street Number:<br>
						<input type="number" name="StreetNumber"><br>
						Postal Code:<br>
						<input type="int" name="PostalCode"><br>
						<!--<input type="submit" name="submit" class="submit" id="submit" value="Submit">-->
						<a href="Insert.php"> <button type="submit" class="submit" id="submit">Submit</button></a>
					</form> 
				</div>
			</div>
		</div>

		<div id="popup2" class="overlay">
			<div class="popup">
				<h2>Are you sure you want to delete this option?</h2>
				<div class="content">
						<button type="button" id="submit" onClick="deleteRow('Lender')">Yes</button>
						<a href="Lender.php"><button type="button"  id="delete" >No</button></a>
				</div>
			</div>
		</div>

		<div id="popup3" class="overlay">
			<div class="popup">
				<h2>Please fill the following form and press submit to update the chosen row!</h2>
				<a class="close" href=""><button type="button" id="delete">X</button></a>
				<!--<a class="submit" href="Insert.php"><button type="sumbit" id="submit" >Submit</button></a>-->
				<div class="content">
					 <form  id="myform" method="post">
						Name:<br>
						<input type="text" name="Name"><br>
						Town:<br>
						<input type="text" name="Town"><br>
						Street Name:<br>
						<input type="text" name="StreetName"><br>
						Street Number:<br>
						<input type="number" name="StreetNumber"><br>
						Postal Code:<br>
						<input type="int" name="PostalCode"><br>
						<!--<input type="submit" name="submit" class="submit" id="submit" value="Submit">-->
						<button type="button" class="submit" id="submit" onClick="updateRow('Lender') ">Submit</button>
					</form> 
				</div>
			</div>
		</div>
		
	</body>
</html>
