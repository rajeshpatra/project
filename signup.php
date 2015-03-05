<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="dist/css/kickstart.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/js/kickstart.js"></script>
</head>
<body>
<?php require_once "includes/navbar.php"; ?>
	<h2>Signup</h2>
	<form method="post" action="signup.php">
		<table>
			<tr>
				<td><label>Name</label></td>
				<td><input name="name" type="text" placeholder="Your Name"></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><input name="email" type="text" placeholder="user@email.com"></td>
			</tr>
			<tr>
				<td><label>Mobile No</label></td>
				<td><input name="mobno" type="text" placeholder="0987654321"></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input name="password" type="password" placeholder="*****"></td>
			</tr>
			<tr>
				<td><label>Confirm Password</label></td>
				<td><input name="confpassword" type="password" placeholder="*****"></td>
			</tr>
			<tr>
				<td></td>
				<td><input name="signup" type="submit" value="Signup"</td>
			</tr>
		</table>
	</form>
</body>
</html>