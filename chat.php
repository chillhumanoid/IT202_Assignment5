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
						<td colspan="3" class="labels">Username:   &nbsp;   <input type="text" name="username" id="username" maxlength="14" value="<?php echo $_SESSION['username'];?> " onkeyup="checklogin();"></td>
					</tr>
					<tr>
						<td colspan="3" class="labels">Password: &nbsp;     <input type="password" name="pass" id="pass" maxlength="20" value="<?php echo $_SESSION['pass'];?>" onkeyup="checklogin();"></td>
					</tr>
          <tr id="chatbox">
              <td>Chat: <input type="text" name="chat" id="chat"/></td>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      function checklogin(){
        var username = document.getElementById( "username" ).value;
        var pass = document.getElementById( "pass" ).value;
        var chatbox = $('#chatbox');
        $.ajax({
          type: "POST",
          url: "checklogin.php",
          data: {user:username, password:pass},
          success: function(msg){
              if(msg == "YES"){
                $("#chatbox").html('<td>Chat: <input type="text" name="chat" id="chat"/></td>')
              }else if (msg == "NO") {
                $("#chatbox").html('<td>please enter a valid login</td>')
              }
           }
        })
      }
    </script>
    <noscript>
      <h3>this site requires javascript</h3>
    </noscript>
	</body>
</html>
