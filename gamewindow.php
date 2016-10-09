<?php 
session_start();
 if(!isset($_SESSION['user'])) 
	 echo "<script>alert('Sorry! You need to be logged in to play games!');window.history.go(-1);</script>";
 else
	 echo "<script>location.href='05games.php'</script>";
 ?>