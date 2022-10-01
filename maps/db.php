<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mapmarker";

$conn=new mysqli($servername,$username,$password,$dbname) or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");

/*if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
}else{
	//echo "connected";
}*/

?>