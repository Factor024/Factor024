<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style="background-image: url(./images/about-img.png); background-repeat: no-repeat; background-position: center; ">
	<div id="header" style="font-size: 30px; text-align:center; margin:50px 0 0 0">
		Welcome to Go-Host
       
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		<p style="font-size: 25px;">Welcome <?php echo $_SESSION['user'] ?> ! <a href='logout.php'>Logout</a><br/>  <a href="index.html">Continue to view our website</a> </p>
		<br/>
		<a href='view.php'>View and Add Products</a>
		<br/><br/>
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	?>
	<div id="footer" style="float: inline-end;font-size:20px; ">
		Created by <a href="#" title="Factor">Factor @ Niit</a>
	</div>
</body>
</html>