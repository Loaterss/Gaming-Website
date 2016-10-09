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
<div id="divgame">
<CENTER><h1>Test your skill.  How many boxes can
you check in 10 seconds?</h1></CENTER>
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

$conn = mysql_connect("localhost","root","");
if(!$conn)
{
	die('error in connection'.mysql_error());
}

mysql_select_db("quora",$conn);
# This command was missing 

$sql= "select username,checkgame from games order by checkgame ";

$result = mysql_query($sql,$conn);
# i swapped the parameters above

if (mysql_num_rows($result) > 0): ?>
<table border=2 cellspacing=5 cellpadding=5>
<caption>LEADERBOARD</caption>

	<tr><th>Username<th>Score</tr>
	<tr><?php while($row = mysql_fetch_array($result)) :?>
	<tr>
		<td><?php echo $row["username"]; ?></td>
		<td><?php echo $row["checkgame"];?></td>
	</tr>
	<?php endwhile; ?>
</table>
<?php endif; ?>
</div>
</body>