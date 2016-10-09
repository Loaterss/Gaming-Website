<!DOCTYPE HTML>
<html>
<body>
<?php
$conn = mysqli_connect("localhost","root","");
if(!$conn)
{
	die('error in connection'.mysqli_connect_error());
}
mysqli_select_db($conn,"quora");
$t4 = $_POST['t4'];
$t9 = $_POST['t9'];
$query = "select email from registered_users where email = '$t4'";
$query2 = "select username from registered_users where username = '$t9'";
$result = mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
$result = mysqli_query($conn,$query2);
$count2=mysqli_num_rows($result);
if ($count == 0 && $count2 == 0) {
$t1 = $_POST['t1'];
$t2 = $_POST['t2'];
$t3 = $_POST['t3'];
$t5 = $_POST['t5'];
$t6 = $_POST['t6'];
$t7 = $_POST['t7'];
$t8 = $_POST['t8'];

$query = "INSERT INTO registered_users values ('$t1','$t9','$t2','$t3','$t4','$t5','$t6','$t7','$t8')";
mysqli_query($conn,$query);
$query = "INSERT INTO games (username)values ('$t9')";
mysqli_query($conn,$query);

mysqli_close($conn);


header("Location: 02login.php");
}
else
{
if($count!=0)
$message = "Email already used!";
else if($count2!=0)
$message = "User-Name already used!";
else
$message = "Email/User-Name already used!";
echo "<script>alert('$message');location.href = '01home.php#focus';</script>";
}
?>
</body>
</html>