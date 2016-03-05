<?php
header('Access-Control-Allow-Origin: *');
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);

mysqli_select_db($conn, "download");
$comment = $_POST['comment'];
$date = $_POST['date'];


$sql = "INSERT INTO tbl_comment (fld_id, fld_comment, fld_date) VALUES 
        (NULL,'".$comment."','".$date."')";
$result = mysqli_query($conn, $sql);


?>