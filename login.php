<?php
	include("include/config.php");
	session_start();
	if(isset($_POST['submit'])){
		$_SESSION['username'] = mysqli_real_escape_string($db,$_POST['username']);
		$_SESSION['pass'] = mysqli_real_escape_string($db,$_POST['pass']);
		$username = $_SESSION['username'];
		$pass = $_SESSION['pass'];
		$sql = "SELECT * FROM loginChat where username = '$username' AND password = '$pass'";
		$result = mysqli_query($db, $sql);
		if($result->num_rows == 0){
			$error_msg = "invalid customer ID or Password";
		}else{
			header('Location: https://web.njit.edu/~jgt8/Assignment5/filler.html');
			exit;
		}
	}
	if(isset($_POST['newAccount'])){
		$username = mysqli_real_escape_string($db,$_POST['username']);
    $pass = mysqli_real_escape_string($db,$_POST['pass']);

		$sql = "SELECT * FROM loginChat where custID = '$id'";
		$result = mysqli_query($db,$sql);
		if($result->num_rows == 1){
			$error_msg = "Username already exists";
		}else if($result->num_rows == 0){
			$sql = "INSERT INTO loginChat (username, password) VALUES ('$username', '$pass')";
			if (mysqli_query($db, $sql)){
				header('Location: https://web.njit.edu/~jgt8/Assignment5/creationsuccess.php');
				exit;
			}else{
				$error_msg = "";
			}
		}
	}

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Chat Login</title>
		<link rel="stylesheet" href="styles/styles.css">
	</head>

	<body>
		<div id = "main">
			<form action="" method="post">
				<table>
					<tr>
						<th colspan="4">Chill Chat Platform</th>
					</tr>
					<tr>
						<td class = "labels">Username:</td>
						<td colspan="2"><input type="text" name="username" id="custID" maxlength="14" required></td>
					</tr>
					<tr>
						<td class="labels">Password:</td>
						<td colspan="2"><input type="password" name="pass" id="custPass" maxlength="20" required></td>
					</tr>
					<tr>
						<td>
							<input type="submit" name = "newAccount" value="Create New Account"/>
						</td>
						<td>
							<input type="submit" class = "buttons" name = "submit" value="Login" />
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
