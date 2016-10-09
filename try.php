<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *"); 
session_start();
$k = $_GET['ans'];
$id = $_GET['gameid'];
$user = $_SESSION["user"];

echo "<script>alert('aa gaya');</script>";

$p = $_GET['lost'];
$q = $_GET['tie'];
$grand = (25*$k) + (10*$q) - (10*$p);

$conn = mysqli_connect("localhost","root","");
if(!$conn)
{
	die('error in connection'.mysqli_connect_error());
}
mysqli_select_db($conn,"quora");
if($id==1)
	$query = "update games set flappybird = '$k' where username='$user' and '$k'>flappybird";
else if($id==2)
	$query = "update games set checkgame = '$k' where username='$user' and '$k'>checkgame";
else if($id==3)
	$query = "update games set guessing = '$k' where username='$user' and ('$k'<guessing OR guessing=0)";
else if($id==4)
	$query = "update games set tictactoe = '$grand' where username='$user' and '$grand'>tictactoe";
else
	$query = "update games set game5 = '$k' where username='$user' and '$k'>game5";
mysqli_query($conn,$query);
$query2 = "update games set total = (tictactoe) where username='$user'" ;
$query3 = "update games set total = total + round((250/guessing),2) where username='$user' and guessing>0" ;
$query4 = "update games set total = total + ((round(checkgame/5,0)+1)*checkgame) where username='$user'" ;
$query5 = "update games set total = total + ((round(flappybird/500,0)+1)*10) where username='$user' and flappybird>0" ;

mysqli_query($conn,$query2);
mysqli_query($conn,$query3);
mysqli_query($conn,$query4);
mysqli_query($conn,$query5);
mysqli_close($conn);

?>