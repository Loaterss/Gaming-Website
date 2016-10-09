<!DOCTYPE HTML>
<html>

<head>
<title>HOME PAGE</title>
<link type="text/css" rel="stylesheet" href="01css.css"/>
</head>

<body bgcolor="orange" font-family="Geneva, sans-serif">
<div id="header"> 
<ul>
<li><img src="images/logo.png"/></li>
<li><a onclick="alert('Sorry! You need to be logged in to play games!')">Games</a></li>
<li><a href="leader.php">LeaderBoard</a></li>
<li><a href="about.php">AboutUs</a></li>
<li><a href="contact.php">ContactUs</a></li>
</ul>
</div>
<img src="images/portal.jpg" style="position:absolute; top:22%; left:1.8%; ">
<div id="header2">
<form action="04login.php" method="post"><pre>
<span style="float:right">
<input type="email" size="16" maxlength=40 name="d1" placeholder="Enter your E-mail" required id="text"><input type="password" name="d2" placeholder="Enter your password" required maxlength=40 size="16" id="text">
</span>
<br>
<a href="#here"><input type="button" class="btn1" value="Register" size="16" style="float:right"></a><input type="submit" style="float:right" class="btn2" value="Login" size="16">
</pre>
</form>
</div>
<center>
<div id = "outerbox">
<div id = "sliderbox">
<img src="images/52.jpg"/>
<img src="images/53.jpg"/>
<img src="images/54.png"/>
<img src="images/55.jpg"/>
</div>
</div>
</center>

<div id="header2" class="here">
<form id="here" action = "03register.php" method = "post" onclick="submit">
<table align = "center" cellpadding = "5" cellspacing = "15">
<caption> <mark><h2>Registration Form</h2> </mark></caption>
<tr><td>Name</td> <td><input type="text" name="t1" placeholder="Enter your full name" size="18" id="text2" required></td> </tr>
<tr><td>Username</td> <td><input type="text" name="t9" placeholder="Enter your user name" id="text2" size="18" required></td> </tr>
<tr><td>Age</td> <td><input type="number" name="t2" min=5 max=120 placeholder="Age" id="text2" size="18" required></td> </tr>
<tr><td>Date of Birth</td> <td><input type="date" name="t3" required size="18" id="text2"></td> </tr>
<tr><td>Email</td> <td><input type="email" name="t4" placeholder="Enter your E-mail" size="18" id="text2" required ></td> </tr>
<tr><td>Password</td> <td><input type="password" minlength="6" name="t5" placeholder="Enter your password" id="text2" size="18" required ></td> </tr>
<tr><td>Contact No.</td> <td><input type="number" minlength="10" name="t6" min="7000000000" max="9999999999" id="text2" size="18" placeholder="Mobile" required ></td> </tr>
<tr><td>Country</td> <td><input type="text" name="t7" placeholder="Enter your country" id="text2" size="18" required ></td> </tr>
<tr><td>Photograph</td> <td><input type=file name="t8" size="18" required></td></tr>
<tr><td colspan=2 align="center"><button class="button1"><span>SUBMIT</span></button></td></tr>

</table>
</form>
</div>
</body>

</html>