<html>
<head>
	<title>Register</title>
    <link rel="stylesheet" href="./css/register.css">
</head>

<body style="background-image: url(./images/server-img.png); background-repeat: no-repeat; background-position:right; ">
<a href="index.php" style="font-size: 20px;">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
} else {
?>
	<p style="text-align: center;"><font size="+6">Register</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0" style="margin: 30px auto 0 auto ;">
			<tr> 
				<td width="10%">Full Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td style="padding-top: 50px;">Email</td>
				<td style="padding-top: 50px;"><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td style="padding-top: 50px;">Username</td>
				<td style="padding-top: 50px;"><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td style="padding-top: 50px;">Password</td>
				<td style="padding-top: 50px;"><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td style="padding-top: 50px;"><input type="submit" name="submit" value="Submit" id="submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>