<?php
include 'dbconnection.php';
include 'redirect.php';

if($_GET){
  $ci=$_GET["ci"];

  $sql = "DELETE FROM USUARIO WHERE USU_CEDULA=".$ci;

  if ($mysqli->query($sql) === TRUE) {
      redirect('users.php');
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

  $mysqli->close();
}


?>
