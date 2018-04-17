<?php
  include("include/config.php");
  if(isset($_POST['username']) && isset($_POST['pass'])){
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM loginChat where username = '$username' AND password = '$pass'";
    $result = mysqli_query($sql);
    if(mysqli_num_rows($result)){
      echo 'YES';
    }else{
      echo 'NO';
    }
  }
?>
