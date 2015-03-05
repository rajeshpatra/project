<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="dist/css/kickstart.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/js/kickstart.js"></script>
	<title>Login</title>
</head>
<body>
<?php 
require_once "connection.php";
include "includes/navbar.php";
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$pass = md5($_POST['password']);

		$email_check = "SELECT id FROM data WHERE email='{$email}'";
		$result_email_check = mysql_query($email_check);

		if($result_email_check){
			if(mysql_num_rows($result_email_check) == 1){

				$query = "SELECT * FROM data WHERE email='{$email}' AND pass='{$pass}'";
				$result_query = mysql_query($query);

				if(!mysql_num_rows($result_query) == 1){
					echo "
						<script>
							k$.status({
								text: 'Invalid password. Try again.',
								type: 'status-red',
								delay: 3000
							});
						</script>
					";
				}else{
					$data = mysql_fetch_assoc($result_query);
					$_SESSION['username'] = $data['name'];
					$_SESSION['useremail'] = $data['email'];
					$_SESSION['usermobno'] = $data['mobno'];
					header("Location: home.php?login=1");
				}
			}else{
			echo "
				<script>
					k$.status({
						text: 'You are not registered with this email={$email}.',
						type: 'status-red',
						delay: 3000
					});
				</script>
			";
		}
		}
	}
	if(isset($_GET['forgot'])){
		if($_GET['forgot'] == 1){
			echo "
				<script>
					k$.status({
						text: 'Password changed successfully. Login here.',
						type: 'status-green',
						delay: 3000
					});
				</script>
			";
		}
	}
 ?>
<h2>Login</h2>
	<form method="post" action="login.php">
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
				<td><input class="button button-blue" name="login" type="submit" value="Login"></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="forgot.php">Forgot Password! Click here.</a></td>
			</tr>
		</table>
	</form>

</body>
</html>