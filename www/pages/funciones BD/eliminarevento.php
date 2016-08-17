<?php
$con=mysqli_connect('localhost','root','','boliches');
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_GET["Id"];
$stmt = $con->prepare("DELETE FROM evento WHERE Id='$id'");
$stmt->execute(); 
$stmt->close();
?>