<?php
header('Access-Control-Allow-Origin: *');

//set database access
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);


//select database
mysqli_select_db($conn, 'download');
$username = $_GET['txtUsername'];
$password = $_GET['txtPassword'];
//setting sql from table
$sql = "SELECT * FROM tbl_login WHERE username = '".$username."' AND password = '".$password."' ";

//getting data
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
	echo json_encode(1);
}
else{
	echo json_encode(2);
}

?>
