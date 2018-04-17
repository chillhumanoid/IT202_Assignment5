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
			$message = "";
			$sql = "UPDATE chat SET message = '$message' WHERE username='$username'";
			if(mysqli_query($db, $sql)){
				header('Location: https://web.njit.edu/~jgt8/Assignment5/chat.php');
				exit;
			}else{

			}
		}
	}
	if(isset($_POST['newAccount'])){
		$username = mysqli_real_escape_string($db,$_POST['username']);
    $pass = mysqli_real_escape_string($db,$_POST['pass']);

		$sql = "SELECT * FROM loginChat where username = '$username'";
		$result = mysqli_query($db,$sql);
		if($result->num_rows == 1){
			$error_msg = "Username already exists";
		}else if($result->num_rows == 0){
			$sql = "INSERT INTO chat (username, message) VALUES ('$username', '')";
			if (mysqli_query($db, $sql)){
				$sql = "INSERT INTO loginChat (username, password) VALUES ('$username','$pass')";
				if(mysqli_query($db, $sql)){
					header('Location: https://web.njit.edu/~jgt8/Assignment5/creationsuccess.php');
					exit;
				}else{

				}
			}else{

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
						<th colspan="3">Chill Chat Platform</th>
					</tr>
					<tr>
						<td colspan="3" class="labels">Username:   &nbsp;   <input type="text" name="username" id="custID" maxlength="14" required></td>
					</tr>
					<tr>
						<td colspan="3" class="labels">Password: &nbsp;     <input type="password" name="pass" id="custPass" maxlength="20" required></td>
					</tr>
					<tr>
						<td>
							<input type="submit" name = "newAccount" value="Create New Account"/>
						</td>
            <td>
              <input type="button" name = "forgotPass" value="Forgot Password?" onclick="window.location.href='https://web.njit.edu/~jgt8/Assignment5/changepass.php'"/>
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
