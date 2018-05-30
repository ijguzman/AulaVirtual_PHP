<?php

include 'dbconnection.php';
include 'redirect.php';


if($_POST){
  $id=$_POST["id"];
  $password=$_POST["password"];

  $sql = "UPDATE USUARIO SET USU_PASSWORD=MD5('".$password."') WHERE USU_CODIGO='".$id."'";

  if ($mysqli->query($sql) === TRUE) {
      redirect('users.php');
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

  $mysqli->close();
}



?>
