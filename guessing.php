<head>
<link rel="stylesheet" type="text/css" href="file2.css"/>
<script   src="https://code.jquery.com/jquery-3.1.0.min.js" ></script>
<SCRIPT LANGUAGE="JavaScript">
function myfunc()
{
	window.location.reload();
}
<!-- Begin
var js_mult1=3141
var js_mult2=5821
var js_m1=100000000
var js_m2=10000
var js_iseed=0
var js_iseed1=0
var js_iseed2=0
function random() {
if (js_iseed == 0) {
now = new Date()
js_iseed = now.getHours() + now.getMinutes() * 60 + now.getSeconds() * 3600
}
js_iseed1 = js_iseed / js_m2
js_iseed2 = js_iseed % js_m2
var tmp = (((js_iseed2 * js_mult1 + js_iseed1 * js_mult2) % js_m2) *
js_m2 + (js_iseed2 * js_mult2)) % js_m1
js_iseed = (tmp + 1) % js_m1
return (Math.floor((js_iseed/js_m1) * 100))
}
var nGuesses = 0

function GuessNum() {
var response
var num = parseInt(document.getElementById("guess").value)
document.getElementById("guess").value = num
nGuesses++
response = ""
if (num < myNumber)    response = response + "Higher!"
if (num > myNumber)    response = response + "Lower!"
if (num == myNumber) {
respone = "Correct!";
alert ("Right!! Click on Restart to Play Again...!!!"+nGuesses);
$.ajax({
		type:"GET",
		url:"http://localhost:8080/PROJECT/try.php?ans="+nGuesses+'&gameid=' + 3,
		success: function(data){
			//alert(1);
		}
		});
}
document.getElementById("result").value=response
document.getElementById("guesses").value=nGuesses
document.getElementById("guess").focus()
document.getElementById("guess").select()
return true
}
function GiveUp() {
var response
nGuesses = 0
alert("The number was " + myNumber +"...  Click on Restart to Play Again ... !!!");
}
// End -->
</SCRIPT>
</head>
<body>
<!-- STEP TWO: Add the onLoad event handler to the BODY tag  -->

<BODY onLoad="document.getElementById('guess').focus();document.getElementById('guess').select()">
<CENTER>
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
<div id="divgame">
<h2>
The object of this game is to guess the same number that the computer has guessed.<br> The number will range from 1 to 100.</h2>
<SCRIPT>
myNumber = random();
nGuesses = 0
</SCRIPT>
<FORM onSubmit="GuessNum(); return false">
<div id="special">Your Guess: &nbsp &nbsp &nbsp &nbsp <INPUT TYPE="text" id="guess" NAME="guess" SIZE=5 id="text"> &nbsp &nbsp &nbsp &nbsp
<INPUT TYPE="button" VALUE="     Guess...   " onClick="GuessNum();" id="button"> &nbsp &nbsp &nbsp &nbsp
<INPUT TYPE="button" VALUE="  GiveUp  " onClick="GiveUp();" id="button"> &nbsp &nbsp &nbsp &nbsp
</FORM>
<br><br>
<hr width=70%>
<br>
<FORM>
<CENTER>
No. of Guesses: <INPUT TYPE="text" id="guesses" NAME="guesses" SIZE=3 onFocus="this.blur()"> &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp
HINT: <INPUT TYPE="text" id="result" NAME="result" SIZE=10 onFocus="this.blur()"> &nbsp &nbsp &nbsp &nbsp
</CENTER>
<br>
<hr width=30%>
<br>
<INPUT TYPE="button" VALUE="Restart the Game" onClick="myfunc();" id="button">
</div>
</FORM>
</div>
<div id="divleader">
<?php

$conn = mysqli_connect("localhost","root","");
if(!$conn)
{
	die('error in connection'.mysqli_connect_error());
}

mysqli_select_db($conn,"quora");
# This command was missing 

$sql= "select username,guessing from games where guessing>0 order by guessing LIMIT 10";

$result = mysqli_query($conn,$sql);
# i swapped the parameters above

if (mysqli_num_rows($result) > 0): ?>
<table border=0 cellspacing=5 cellpadding=5>
<caption>LEADERBOARD</caption>

	<tr><th>Username<th>Score</tr>
	<tr><?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) :?>
	<tr>
		<td><?php echo $row["username"]; ?></td>
		<td><?php echo $row["guessing"];?></td>
	</tr>
	<?php endwhile; ?>
</table>
<?php endif; ?>
</div>
</body>
