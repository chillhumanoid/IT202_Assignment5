<?php
  session_start();
  include("include/config.php");
  if(isset($_POST['user'])){
    $user = $_POST['user'];
    $sql = "SELECT * FROM loginChat where username = '$user'";
    $result = mysqli_query($db, $sql);
    if($result->num_rows == 1){
      echo 'YES';
    }else{
      echo 'NO';
    }
    exit();
  }
?>
