<?php

include 'dbconnection.php';
include 'redirect.php';


if($_POST){
  $id=$_POST["id"];
  $emailaddress=$_POST["emailaddress"];
  $ci=$_POST["ci"];
  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];

  $sql = "UPDATE USUARIO SET USU_EMAIL='".$emailaddress."', USU_NOMBRES='".$firstname."', USU_APELLIDOS='".$lastname."' WHERE USU_CODIGO='".$id."'";

  if ($mysqli->query($sql) === TRUE) {
      redirect('users.php');
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

  $mysqli->close();
}



?>
