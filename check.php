<head>
<?php
	session_start();
?>
<link rel="stylesheet" type="text/css" href="file1.css"/>
<script   src="https://code.jquery.com/jquery-3.1.0.min.js" ></script>
<SCRIPT LANGUAGE="JavaScript">
function myfunc()
{
	var f = document.getElementById("text1");
	f.value = 0;
	window.location.reload();
}
<!-- Begin
var total = 0
var play = false
function display(element) {
	var now = new Date()
	if (!play) {
	play = true
	startTime = now.getTime()
	}
	if (now.getTime() - startTime > 10000) {
	element.checked = !element.checked
	alert("Time Over !!! ... Click on restart to Play again.. !!!")

	var ans=document.getElementById("text1").value
	$.ajax({
		type:"GET",
		url:"http://localhost:8080/PROJECT/try.php?ans="+ans+'&gameid=' + 2,
		success: function(data){
			//alert(1);
		}
		});
return
}
 if (element.checked)
total++
else
total--
element.form.num.value = total
}
function restart(form) {
total = 0
play = false
for (var i = 1; i <= 100; ++i) {
 form.elements[i].checked = false
   }
}
</SCRIPT>
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
<div id="divgame">
<CENTER><h1>Test your skill.  How many boxes can
you check in 20 seconds?</h1></CENTER>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
document.write("<FORM><CENTER>")
document.write('<h3><INPUT TYPE="text" id="text1" VALUE="0" NAME="num" ');
document.write('SIZE=10 onFocus="this.blur()" id="text"></h3><BR>')
document.write("<HR SIZE=5 WIDTH=40%><br>")
for (var i = 0; i < 10; ++i) {
for (var j = 0; j < 10; ++j) {
document.write('<INPUT TYPE="checkbox" onClick="display(this)" >')}
document.write("<BR>")}
document.write("<br><HR size=5 WIDTH=40%>")
document.write('<INPUT TYPE="button" VALUE="Restart the Game" ');
document.write('onClick="myfunc();" id="button"> ')
document.write("</CENTER></FORM>")
// End -->
</SCRIPT>

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

$sql= "select username,checkgame from games order by checkgame desc LIMIT 10";

$result = mysqli_query($conn,$sql);
# i swapped the parameters above

if (mysqli_num_rows($result) > 0): ?>
<table border=0 cellspacing=5 cellpadding=5>
<caption>LEADERBOARD</caption>

	<tr><th>Username<th>Score</tr>
	<tr><?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) :?>
	<tr>
		<td><?php echo $row["username"]; ?></td>
		<td><?php echo $row["checkgame"];?></td>
	</tr>
	<?php endwhile; ?>
</table>
<?php endif; ?>
</div>
</body>