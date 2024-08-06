<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="./css/register.css">
</head>

<body style="background-image: url(./images/pay-img.jpg); background-repeat: no-repeat; background-position: right; ">
<a href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['name'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['user'] = $user;
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p style="text-align: center;"><font size="+6">Login</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0" style="margin: 30px auto 0 auto ;">
			<tr> 
				<td width="10%">Username</td>
				<td><input type="text" name="username"></td>
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