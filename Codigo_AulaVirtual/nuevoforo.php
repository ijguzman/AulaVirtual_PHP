<?php
include 'dbconnection.php';
include 'redirect.php';

if($_POST){
  $curso = $_POST["curso"];
  $tema = $_POST["tema"];
  $descripcion = $_POST["descripcion"];
  $fechainicio=$_POST["fechainicio"];
  $fechafin=$_POST["fechafin"];

  $select_max="SELECT MAX(cod_foro) AS COD_MAX FROM auv_foro ;";
  $resmax = $mysqli->query($select_max);
  while($row = $resmax->fetch_object()){
      $max=$row->COD_MAX;
  }
  $max_int= (intval($max)+1);
  $sql = "INSERT INTO auv_foro VALUES ('".$max_int."','".$curso."','".$tema."','".$descripcion."','".$fechainicio."','".$fechafin."')";

  if ($mysqli->query($sql) === TRUE) {
    redirect("foro.php");
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  $mysqli->close();
  
}
?>