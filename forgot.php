<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="dist/css/kickstart.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/js/kickstart.js"></script>
	<title>Password Recovery</title>
</head>
<body>
<?php
 require_once "connection.php";
 include "includes/navbar.php";
 if(isset($_POST['forgot'])){
	 	$email = $_POST['email'];
	 	$pass = $_POST['password'];
	 	$pass1 = $_POST['confpassword'];

	 	$email_check = "SELECT id FROM data WHERE email='{$email}'";
	 	$result_email_check = mysql_query($email_check);
	 	if($result_email_check){
	 		if(mysql_num_rows($result_email_check) == 1){
	 			if($pass1 == $pass){
	 				$pass = md5($pass1);
	 				$query = "UPDATE data SET pass='{$pass}' WHERE email='{$email}'";
	 				$result_query = mysql_query($query);
	 				if(!$result_query){
	 					// die ("error in resetting password." . mysql_error());
	 				}else {
	 					header("Location: login.php?forgot=1");
	 				}
	 			}else{
	 				echo "
	 					<script>
	 						k$.status({
	 							text: 'Passwords don\'t match.',
	 							type: 'status-red',
	 							delay: 3000
	 						});
						</script>
	 				";
	 			}
	 		}else{
	 		echo "
	 			<script>
	 				k$.status({
	 					text: 'Invalid email.',
	 					type: 'status-red',
	 					delay: 3000
	 				});
				</script>
	 		";
	 	}
	 	}
 	}
?>
<h2>Forgot Password</h2>
	<form name="f_forgot" method="post" action="forgot.php">
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
				<td><label>Confirm Password</label></td>
				<td><input name="confpassword" type="password" placeholder="*****"></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="button button-red" name="forgot" type="submit" value="Reset Password"></td>
			</tr>
		</table>
	</form>

</body>
</html>