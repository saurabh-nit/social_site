<?php
	session_start();
   $pemail=$_SESSION['lemail'];
	$conn= new mysqli("localhost","root","","mysocialsite") or die ("An error has occurred. Please try agin later.");
   $q="UPDATE users SET Online=0 WHERE Emailid='$pemail'";
   $conn->query($q); 
  session_destroy();
  header("location: ../index.php");
?>