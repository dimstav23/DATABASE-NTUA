<!DOCTYPE>
<html>
<head>
<title> Delete </title>
</head>
<body>
	<script type="text/javascript" language="javascript">
	var selectedRow

function visited(tr) {
    var table = tr.parentNode.parentNode;
    var trs = table.getElementsByTagName('tr');
    
    for (var i = 0; i < trs.length; i++)
        {
        //trs[i].style.backgroundColor = null;
        trs[i].style.color = null;
        }
    
    
    selected = tr;
    
    	
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
		var BId = row.cells[1].innerHTML;
		var DOR = row.cells[2].innerHTML;
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
		    rowCount--;
                    i--;
		    //$.post("delete.php",{BId:row.cells[1].childNodes[0]});
		    window.location.href = "delete.php?BId=" + BId + "&DOR=" + DOR; //send the keys to php
                    //table.deleteRow(i);
                    
                }
	}
 		window.location.href = "delete.php?BId=" + -1 ; //if none found return
 
            
            }catch(e) {
		
                alert(e);
            }
        }

function updateRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 	    	var form = document.forms[1];
	    	var Amount = form.elements[0].value;
		var Deadline = form.elements[1].value;
		var Description = form.elements[2].value;
		var PaybackPeriod = form.elements[3].value;
		var Percentage = form.elements[4].value;
	
		

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
		var BId = row.cells[1].innerHTML;
		var DateOfRequest = row.cells[2].innerHTML;

                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
		    rowCount--;
                    i--;
		    
		    //$.post("delete.php",{BId:row.cells[1].childNodes[0]});
		    window.location.href = "update.php?BId=" + BId + "&DateOfRequest=" + DateOfRequest + "&Amount=" + Amount + "&Deadline=" + Deadline + "&Description=" + Description + "&PaybackPeriod=" + PaybackPeriod + "&Percentage=" + Percentage ; //send the keys to php
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
	<?php
		/*Connection*/
		
		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
       		if (!$connect) {
               			die(mysql_error());
      		}
		
		$myid = $_GET['BId'];
		$DateOfRequest = $_GET['DateOfRequest'];
		$Amount = $_GET['Amount'];
		$Deadline = $_GET['Deadline'];
		$Description = $_GET['Description'];
		$PaybackPeriod = $_GET['PaybackPeriod'];
		$Percentage = $_GET['Percentage'];
		
		if ($myid == -1){
			mysqli_close($connect);
			
			header('Location: LoanRequest.php');
		}
					
		
		if ($Amount!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`LoanRequest` SET `Amount` = '$Amount' WHERE `LoanRequest`.`BId` = '$myid' AND `LoanRequest`.`DateOfRequest` = '$DateOfRequest' ");
		}

		if ($Deadline!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`LoanRequest` SET `DeadLine` = '$Deadline' WHERE `LoanRequest`.`BId` = '$myid' AND `LoanRequest`.`DateOfRequest` = '$DateOfRequest' ");
		}

		if ($Description!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`LoanRequest` SET `Description` = '$Description' WHERE `LoanRequest`.`BId` = '$myid' AND `LoanRequest`.`DateOfRequest` = '$DateOfRequest'  ");
		}

		if ($PaybackPeriod!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`LoanRequest` SET `PaybackPeriod` = '$PaybackPeriod' WHERE `LoanRequest`.`BId` = '$myid' AND `LoanRequest`.`DateOfRequest` = '$DateOfRequest' ");
		}

		if ($Percentage!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`LoanRequest` SET `Percentage` = '$Percentage' WHERE `LoanRequest`.`BId` = '$myid' AND `LoanRequest`.`DateOfRequest` = '$DateOfRequest' ");
		}
		
		
		/*$results = mysqli_query($connect,"UPDATE `DB_Project`.`LoanRequest` SET `BId` = '$myid',`Name` = '$Name',`Town` = '$Town',`StreetName` = '$StreetName',`StreetNumber` = '$StreetNumber',`PostalCode` = '$PostalCode' WHERE `LoanRequest`.`BId` = '$myid' ");*/
	
		mysqli_close($connect);

		header('Location: LoanRequest.php');
	?>	
	
</body>
</html>
