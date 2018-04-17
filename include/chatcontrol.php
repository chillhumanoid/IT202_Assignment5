<?php
  if(isset($_POST['logout'])){
    if(isset($_POST['username'])){
      $user = $_POST['username'];
      $message = "192389138fj39f3od9393jf939fj3j93f"; //assumed no one will find this or type this randomly
      $sql = "UPDATE chat SET message = '$message' WHERE username='$user'";
      if(mysqli_query($db, $sql)){
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
      }else{

      }
    }
  }
?>
