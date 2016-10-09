<?php 
session_start(); 
if(!isset($_SESSION['user'])) 
	echo "<script>alert('You are not logged in');window.history.go(-1);</script>";
session_destroy();
echo "<script>location.href='01home.php'</script>";
?>
