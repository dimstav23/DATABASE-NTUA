<!DOCTYPE>
<html>
<head>
<title> Delete </title>
</head>
<body>
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
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
		    rowCount--;
                    i--;
		    //$.post("delete.php",{BId:row.cells[1].childNodes[0]});
		    window.location.href = "delete.php?BId=" + BId ; //send the keys to php
                    //table.deleteRow(i);
                    return;
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
	<?php
		/*Connection*/
		
		$connect = mysqli_connect("localhost","root", "m4t0p9h9","project");
       		if (!$connect) {
               			die(mysql_error());
      		}
		
		$myid = $_GET['BId'];
		$Name = $_GET['Name'];
		$Town = $_GET['Town'];
		$StreetName = $_GET['StreetName'];
		$StreetNumber = $_GET['StreetNumber'];
		$PostalCode = $_GET['PostalCode'];
		
		if ($myid == -1){
			mysqli_close($connect);
			
			header('Location: Borrower.php');
		}
			
		echo ($myid);
		echo ($Name);
		echo ($Town);
		echo ($StreetName);
		echo ($StreetNumber);
		echo ($PostalCode);		
		
		if ($Name!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`Borrower` SET `Name` = '$Name' WHERE `Borrower`.`BId` = '$myid' ");
		}

		if ($Town!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`Borrower` SET `Town` = '$Town' WHERE `Borrower`.`BId` = '$myid' ");
		}

		if ($StreetName!=null){
			$results = mysqli_query($connect,"UPDATE `project`.`Borrower` SET `StreetName` = '$StreetName' WHERE `Borrower`.`BId` = '$myid' ");
		}

		if ($StreetNumber!=0){
			$results = mysqli_query($connect,"UPDATE `project`.`Borrower` SET `StreetNumber` = '$StreetNumber' WHERE `Borrower`.`BId` = '$myid' ");
		}

		if ($PostalCode!=0){
			$results = mysqli_query($connect,"UPDATE `project`.`Borrower` SET `PostalCode` = '$PostalCode' WHERE `Borrower`.`BId` = '$myid' ");
		}


		/*$results = mysqli_query($connect,"UPDATE `project`.`Borrower` SET `BId` = '$myid',`Name` = '$Name',`Town` = '$Town',`StreetName` = '$StreetName',`StreetNumber` = '$StreetNumber',`PostalCode` = '$PostalCode' WHERE `Borrower`.`BId` = '$myid' ");*/
	
		mysqli_close($connect);

		header('Location: Borrower.php');
	?>	
	
</body>
</html>
