<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="dist/css/kickstart.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/js/kickstart.js"></script>
</head>
<body>
<?php 
require_once "includes/navbar.php";
require "connection.php";
	if(isset($_POST['signin'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobno = $_POST['mobno'];
		$pass1 = $_POST['password'];
		$pass = md5($_POST['confpass']);

		$email_check = "SELECT id FROM data WHERE email='{$email}'";
		$result_email_check = mysql_query($email_check);
		if($result_email_check){
			if(mysql_num_rows($result_email_check) == 1){
				if($pass1 == $pass){
					$query = "INSERT INTO data(name, email, mobno, pass) VALUES ('{$name}', '{$email}', '{$mobno}', '{$pass}'";
					$result_query = mysql_query($query);
					if(!$result_query){
						die "data not inserted." . mysql_query();
					}else{
						$data = mysql_fetch_assoc($result_query);
						$_SESSION['username'] = $data['name'];
						$_SESSION['useremail'] = $data['email'];
						$_SESSION['usermobno'] = $data['mobno'];
						header("Location: home.php?registered=1");
					}
				}echo "password don't match." mysql_error();
			}
		}else{
			echo "you are not registered." . mysql_error(); 
		}
	}

?>
	
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