<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="dist/css/kickstart.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/js/kickstart.js"></script>
	<script type="text/javascript" src="validator.js"></script>
	<!-- // <script type="text/javascript" src="valid.js"></script>   --> <!-- # required validation jquery file -->
</head>
<body>
<?php 
require_once "connection.php";
include "includes/navbar.php";
	if(isset($_POST['signup'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$sex = $_POST['sex'];
		$mobno = $_POST['mobno'];
		$pass = $_POST['password'];
		$pass1 = $_POST['confpassword'];

		$email_check = "SELECT id FROM data WHERE email='{$email}'";
		$result_email_check = mysql_query($email_check);

		if($result_email_check){
			if(mysql_num_rows($result_email_check) == 1){
				echo "
					<script>
						k$.status({
							text: 'Already registered with this Email: email={$email}',
							type: 'status-red',
							delay: 3000
						});
					</script>
				";
			}else{
				if($pass == $pass1){
					$pass = md5($pass1);
					$query = "INSERT INTO data(name, email, mobno, pass,sex) VALUES ('{$name}', '{$email}', '{$mobno}', '{$pass}', '{$sex}')";
					$result_query = mysql_query($query);
					if(!$result_query){
						die ("data not inserted." . mysql_error());
					}else{
						$signup = "SELECT * FROM data WHERE email='{$email}'";
						$result_signup = mysql_query($signup);
						if($result_signup){
							$data = mysql_fetch_assoc($result_signup);
							$_SESSION['userid'] = $data['id'];
							$_SESSION['username'] = $data['name'];
							$_SESSION['useremail'] = $data['email'];
							$_SESSION['usermobno'] = $data['mobno'];
							header("Location: home.php?registered=1");
						}
					}
				}else{
					echo "
						<script>
							k$.status ({
								text: 'Passwords don\'t match.',
								type: 'status-red',
								delay: 3000
							});
						</script>
					";
				}
			}
		}
	}
?>
	<h2>Signup</h2>
	<form name="f_signup" method="post" action="signup.php" onsubmit="return validateForm()">
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
				<td><label>I am</label></td>
				<td>
					<select name="sex">
						<option value="0" selected="selected">Select</option>
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>
				</td>
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
				<td><input class="button button-green" name="signup" type="submit" value="Signup"</td>
			</tr>
		</table>
	</form>
</body>
</html>