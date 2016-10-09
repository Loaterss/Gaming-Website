<html>
<head>
<link type="text/css" rel="stylesheet" href="tic.css"/>
<style>
div div{
	text-align:center; background-color: white;
}
#col1 td{
	color:gold;
}
#col2 td{
	color:gray;
}
#col3 td{
	color:brown;
}
#header
{
	background-color: rgba(255, 0, 0, 0.0);
	font-size: 16px;
	padding: 10px 10px;
}
input{
	
  position:absolute; top:7%; left:82%;
  border-radius: 15px;
  background-color: hsl(0, 100%, 30%);
  color: #FFFFFF;
  font-size: 16px;
  padding: 12px 28px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  whitespace: normal;
}
</style>
</head>
<body>
<div id="header"> 
<ul>
<li><a href='backhome.php'>Home</a></li>
<li><a href="gamewindow.php">Games</a></li>
<li><a href="leader.php">LeaderBoard</a></li>
<li><a href="about.php">AboutUs</a></li>
<li><a href="contact.php">ContactUs</a></li>
<li><a href="logout.php">LogOut</a></li>
</ul>
</div>
<input type="button" value="RuleBook below" onclick="location.href='#rule'">
<div style = "position:absolute; top:25%; left:10%;" id="divleader">
<?php

$conn = mysqli_connect("localhost","root","");
if(!$conn)
{
	die('error in connection'.mysqli_connect_error());
}

mysqli_select_db($conn,"quora");
# This command was missing 

$sql= "select username,flappybird,guessing,checkgame,tictactoe,total from games order by total desc LIMIT 10";

$result = mysqli_query($conn,$sql);
# i swapped the parameters above

if (mysqli_num_rows($result) > 0): ?>

<div id="leader">
<table border=0 cellspacing=5 cellpadding=5>
<caption>LEADERBOARD</caption>

	<tr><th>Username<th>FlappyBird<th>Guessing<th>CheckGame<th>TicTacToe<th>Total</tr>
	<tr><?php $i=0; while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) :?>
	
	<?php 	if($i==0) echo "<tr id='col1'>";
			else if($i==1) echo "<tr id='col2'>";
			else if($i==2) echo "<tr id='col3'>";
			else echo"<tr>";
	?>
	
		<td><?php echo $row["username"]; ?></td>
		<td><?php echo $row["flappybird"]; ?><br><?php if($row["flappybird"]==0)echo"(0)"; else echo "(".((round($row["flappybird"]/500,0)+1)*10).")"; ?></td>
		<td><?php echo $row["guessing"]; ?><br><?php if($row["guessing"]==0)echo"(0)"; else echo "(".round(250/$row["guessing"],2).")"; ?></td>
		<td><?php echo $row["checkgame"]; ?><br><?php echo "(".((round($row["checkgame"]/5,0)+1)*$row["checkgame"]).")"; ?></td>
		<td><?php echo $row["tictactoe"];?><br><?php echo "(".$row["tictactoe"].")"; ?></td>
		<td><?php echo round($row["total"],2); $i++;?></td>
	</tr>
	<?php endwhile; ?>
</table></div>
<?php endif; ?>
</div>

<div id="rule" style='position:absolute;top:155%;left:10%;width:1015px'>
<h1>RULE BOOK: <br></h1>

<div >
<h4>CHECK_GAME:<br></h4>
<code>
1) 0-4    checks &nbsp;&nbsp;= checks*1 points.<br>
2) 5-9    checks &nbsp;&nbsp;= checks*2 points.<br>
3) 10-14 checks = checks*3 points.<br>
4) 15-19 checks = checks*4 points.<br>
5) 20-24 checks = checks*5 points.<br>
6) 25-29 checks = checks*6 points.<br>
7) 30-34 checks = checks*7 points.<br>
8) 35-39 checks = checks*8 points.<br><br>

Formula: (checks/5+1)*checks.<br><br>
</code>
</div>

<div >
<h4>FLAPPY_BOX: <br></h4>
<code>
1) 0&lt;score<500   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=  10 points. <br>
2) 500<=score<1000  &nbsp;=  20 points. <br>
3) 1000<=score<1500 =  30 points. <br>
4) 1500<=score<2000 = 40 points.  <br>
5) 2000<=score<2500 = 50 points.  <br>
6) 2500<=score<3000 = 60 points.  <br>
7) 3000<=score<3500 = 70 points.  <br><br>

Formula: (score/500+1)*10 <br><br>
</code>
</div>

<div >
<h4>GUESSING GAME: <br></h4>
<code>
1) score:1 guess &nbsp;= 250 points.<br>
2) score:2 guess &nbsp;= 125 points.<br>
3) score:3 guess = 62.5 points.<br>
&nbsp;4) score:4 guess = 31.25 points.<br><br>

Formula: (250/no.of.guesses)<br><br>
</code>
</div>

<div >
<h4>TIC-TAC-TOE: <br></h4>
<code>
1 won 	= +25 points.<br>
1 lost= -10 points.<br>
1 tie 	= +10 points.<br><br>

</code>
</div>

<br>
</div>
</body>
</html>