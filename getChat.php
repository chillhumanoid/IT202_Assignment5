<?php
session_start();
include("include/config.php");
if(isset($_POST['user'])){
  $user = $_POST['user'];
  $sql = "SELECT message FROM chat where username = '$user'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);
  echo $row['message'];
}
?>
