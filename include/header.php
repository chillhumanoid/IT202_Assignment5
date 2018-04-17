<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: https://web.njit.edu/~jgt8/Assignment5/login.php');
    exit;
  }
?>
