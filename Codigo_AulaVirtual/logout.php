<?php
  include 'redirect.php';
  session_destroy();
  session_unset();
  redirect("login.php"); 
?>
