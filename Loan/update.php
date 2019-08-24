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
		var Id = row.cells[1].innerHTML;
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
		    rowCount--;
                    i--;
		    //$.post("delete.php",{BId:row.cells[1].childNodes[0]});
		    window.location.href = "delete.php?Id=" + Id ; //send the keys to php
                    //table.deleteRow(i);
                    
                }
	}
 		window.location.href = "delete.php?Id=" + -1 ; //if none found return
 
            
            }catch(e) {
		
                alert(e);
            }
        }


function updateRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 	    	var form = document.forms[1];
	    	var BId = form.elements[0].value;
		var MId = form.elements[1].value;
		var DateOfApproval = form.elements[2].value;
		var DateOfRequest = form.elements[3].value;

	//	if(!Name) Name=-1;
	//	if(!Town) Town=-1;
	//	if(!StreetName) StreetName=-1;
	//	if(!StreetNumber) StreetNumber=-1;
	//	if(!PostalCode) PostalCode=-1;
		

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
		var Id = row.cells[1].innerHTML;
		

                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
		    rowCount--;
                    i--;
		    
		    //$.post("delete.php",{BId:row.cells[1].childNodes[0]});
		    window.location.href = "update.php?Id=" + Id + "&BId=" + BId + "&MId=" + MId + "&DateOfApproval=" + DateOfApproval + "&DateOfRequest=" + DateOfRequest; //send the keys to php
                    //table.deleteRow(i);
                   return;
                }
 	    }
		window.location.href = "update.php?Id=" + -1 ; //if none found return
 
            
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
		
		$myid = $_GET['Id'];
		$BId = $_GET['BId'];
		$MId = $_GET['MId'];
		$DateOfApproval = $_GET['DateOfApproval'];
		$DateOfRequest = $_GET['DateOfRequest'];
	
		
		if ($myid == -1){
			mysqli_close($connect);
			
			header('Location: Loan.php');
		}
			
		if ($BId!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`Loan` SET `BId` = '$BId' WHERE `Loan`.`Id` = '$myid' ");
		}

		if ($MId!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`Loan` SET `MId` = '$MId' WHERE `Loan`.`Id` = '$myid' ");
		}

		if ($DateOfApproval!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`Loan` SET `DateOfApproval` = '$DateOfApproval' WHERE `Loan`.`Id` = '$myid' ");
		}

		if ($DateOfRequest!=0){
			$results = mysqli_query($connect,"UPDATE `project`.`Loan` SET `DateOfRequest` = '$DateOfRequest' WHERE `Loan`.`Id` = '$myid' ");
		}

		


		/*$results = mysqli_query($connect,"UPDATE `DB_Project`.`Loan` SET `BId` = '$myid',`Name` = '$Name',`Town` = '$Town',`StreetName` = '$StreetName',`StreetNumber` = '$StreetNumber',`PostalCode` = '$PostalCode' WHERE `Loan`.`BId` = '$myid' ");*/
	
		mysqli_close($connect);

		header('Location: Loan.php');
	?>	
	
</body>
</html>
