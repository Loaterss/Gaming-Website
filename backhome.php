<?php
session_start();
if(isset($_SESSION['user']))
	echo "<script>alert('You need to log out first! to reach homepage');window.history.go(-1);</script>";
else
	echo "<script>location.href='01home.php'</script>";
?>