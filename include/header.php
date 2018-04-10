<?php
  session_start();
  if(!isset($_SESSION[id])){
    header('Location: https://web.njit.edu/~jgt8/Assignment5/login.php');
    exit;
  }
?>
