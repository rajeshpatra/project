<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="dist/css/kickstart.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/js/kickstart.js"></script>
	<title>Login</title>
</head>
<body>
<h2>Login</h2>
<?php require_once "includes/navbar.php"; ?>
	<form>
		<table>
			<tr>
				<td><label>Email</label></td>
				<td><input name="email" type="text" placeholder="user@email.com"></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input name="password" type="password" placeholder="*****"></td>
			</tr>
			<tr>
				<td></td>
				<td><input name="login" type="submit" value="Login"></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="forgot.php">Forgot Password! Click here.</a></td>
			</tr>
		</table>
	</form>

</body>
</html>