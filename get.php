<?php
header('Access-Control-Allow-Origin: *');

//set database access
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);


//select database
mysqli_select_db($conn, 'download');

//setting sql from table
$sql = "SELECT * FROM tbl_comment ORDER BY fld_id DESC";

//getting data
$result = mysqli_query($conn, $sql);

//get data in every row in database
	if(mysqli_num_rows($result) > 0){
		while($rows = mysqli_fetch_assoc($result)){
			echo "<div class='panel panel-primary'><div class ='panel-heading' style='padding:20px 20px 20px 20px'><small class='pull-right'>".$rows['fld_date']."</small></div><div class='panel-body'>".$rows['fld_comment']."</div></div>";
		}
	}
		
	else {
		echo "No record found!";
	}
?>
