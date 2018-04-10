<?php
	include("include/config.php");
	session_start();
	if(isset($_POST['submit'])){
		$_SESSION['username'] = mysqli_real_escape_string($db,$_POST['username']);
		$_SESSION['pass'] = mysqli_real_escape_string($db,$_POST['pass']);
		$username = $_SESSION['username'];
		$pass = $_SESSION['pass'];
		$sql = "SELECT * FROM loginChat where username = '$username'";
		$result = mysqli_query($db, $sql);
		if($result->num_rows == 0){
			$error_msg = "User doesn't exist";
		}else{
			$sql = "UPDATE loginChat SET password = '$pass' WHERE username='$username'";
			if(mysqli_query($db,$sql)){
				header('Location: https://web.njit.edu/~jgt8/Assignment5/passsuccess.php');
				exit;
			}
		}
	}

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Change Password</title>
		<link rel="stylesheet" href="styles/styles.css">
	</head>

	<body>
		<div id = "main">
			<form action="" method="post">
				<table>
					<tr>
						<th colspan="3">Chill Chat Platform</th>
					</tr>
					<tr>
						<td colspan="3" class="labels">Username:&nbsp;<input type="text" name="username" id="custID" maxlength="14" required></td>
					</tr>
					<tr>
						<td colspan="3" class="labels">New Password:&nbsp;<input type="password" name="pass" id="custPass" maxlength="20" required></td>
					</tr>
					<tr>
						<td>
							<input type = "button" value="Cancel" onclick="window.location.href='https://web.njit.edu/~jgt8/Assignment5/login.php'"/>
						</td>
            <td>

						</td>
						<td>
							<input type="submit" class = "buttons" name = "submit" value="Change" />
						</td>
					</tr>
				</table>
			</form>
			<Center>
				<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error_msg; ?></div>
			</Center>
		</div>
	</body>
</html>
