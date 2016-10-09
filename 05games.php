<!DOCTYPE HTML>
<?php
session_start();
if(!$_SESSION['login'])
{
	header("location:01home.php");
   die;
}
?>
<html>
<head>
<title>games</title>
<link type="text/css" rel="stylesheet" href="01css.css"/>
</head>
<body>

<div id="header"> 
<ul>
<li><img src="images/logo.png"/></li>
<li><a href="05games.php">Games</a></li>
<li><a href="leader.php">LeaderBoard</a></li>
<li><a href="about.php">AboutUs</a></li>
<li><a href="contact.php">ContactUs</a></li>
<li><a href="logout.php">LogOut</a></li>
</ul>
</div>

<?php
$conn = mysqli_connect("localhost","root","");
if(!$conn)
{
	die('error in connection'.mysqli_connect_error());
}
mysqli_select_db($conn,"quora");
#session_start();
$var = $_SESSION["email"];
$query = "select * from registered_users ";
$result = mysqli_query($conn,$query);
#mysql_query($query,$conn);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	if(strcmp($row['email'],($var))==0)
	{
	$pic = $row['photo'];
	$name = $row['name'];
	$age = $row['country'];
	}
}
$_SESSION["pic"] = $pic;
$_SESSION["name"] = $name;
$_SESSION["country"] = $age;
?>

<div id="header3">
<table  border=0 style="float:left;" cellspacing="3" cellpadding="2.5">
<tr><tr><tr><tr><tr><tr><tr><tr>
<tr><td><img src="images\<?php echo $_SESSION["pic"]?>" height="192" width="192" align="center"></img></td>
<tr><td style="color:black;font-size:27px;"><b><?php echo $_SESSION["name"]?></b></tr>
<tr><td style="color:lightgrey;font-size:20px;"><b>(<?php echo $_SESSION["user"]?>)</b></tr>
<tr><td style="color:lightgrey;font-size:20px;"><b><?php echo $_SESSION["country"]?></b></tr>
</div>
</table>

<div id="header4" >
<table  border=0 style="float:left;" cellspacing="15" cellpadding="5" >
<tr><td>Check Game<td>Flappy Box<td>Guess Game<td>Tic-tac-Toe
<tr><td><a href="check.php" class="game" title="CHECK GAME"><img src="images/check3.png" border="2" ></a><td><a href="JSGAME.php" class="game" title="FLAPPY-BOX"><img src="images/accelerate.png" border="2" ></a><td><a href="guessing.php"class="game" title="GUESSING GAME"><img src="images/guess.png"  border="2"></a><td><a href="tictac.php"class="game" title="TIC TAC TOE"><img src="images/crosskata.png" border="2"></a>
</table>
</div>


</body>
</html>