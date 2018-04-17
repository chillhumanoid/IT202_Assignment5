<?php
  session_start();
  include("include/config.php");
  if(isset($_POST['user']) && isset($_POST['password'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM loginChat where username = '$user' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    if($result->num_rows == 1){
      echo 'YES';
    }else{
      echo 'NO';
    }
    exit();
  }
?>
