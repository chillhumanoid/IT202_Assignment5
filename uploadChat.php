<?php
  session_start();
  include("include/config.php");
  if(isset($_POST['user']) && isset($_POST['message'])){
    $user = $_POST['user'];
    $message = mysqli_real_escape_string($db,$_POST['message']);
    $sql = "UPDATE chat SET message = '$message' WHERE username='$user'";
    if(mysqli_query($db, $sql)){

    }else{

    }
  }
?>
