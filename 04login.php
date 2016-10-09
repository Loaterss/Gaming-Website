<?php 
$conn = mysqli_connect("localhost","root","");
if(!$conn)
{
	die('error in connection'.mysqli_connect_error());
}
mysqli_select_db($conn,"quora");
$d1 = (string)$_POST["d1"];
$d2 = (string)$_POST["d2"];
session_start();

$_SESSION["email"] = $d1;
$flag=0;
$query = "select * from registered_users";
$result = mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if ($count != 0) {
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	if( strcmp($row['password'],($d2))==0 && strcmp($row['email'],($d1))==0 )
	{
		$_SESSION["user"] = $row['username'];
		header("Location: 05games.php");
		$flag=1;
		#session check 
		$_SESSION["login"]=true;
	}
}
}
if($flag==0)
{
echo "<script>alert('enter correct id/password');location.href='01home.php'</script>";
}
mysqli_close($conn);


?>
