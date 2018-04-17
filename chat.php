<?php
  session_start();
  include("include/config.php");
  include("include/header.php");
  include("include/chatcontroller.php");
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
						<td colspan="3" class="labels">Username:   &nbsp;   <input type="text" name="username" id="custID" maxlength="14" value="<?php echo $_SESSION['username'];?>"></td>
					</tr>
					<tr>
						<td colspan="3" class="labels">Password: &nbsp;     <input type="password" name="pass" id="custPass" maxlength="20" value="<?php echo $_SESSION['pass'];?>"></td>
					</tr>
          <tr>
						<td>
							<input type="submit" name = "logout" value="logout"/>
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
