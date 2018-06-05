<?php
include 'dbconnection.php';
include 'redirect.php';

if($_POST){
  $curso = $_POST["select_curso"];
  $tema = $_POST["tema"];
  $descripcion = $_POST["descripcion"];
  $fechainicio=$_POST["fechainicio"];
  $fechafin=$_POST["fechafin"];
  $nrc=$_POST["nrc"];
  $curso=$_POST["curso"];
  
  $select_max="SELECT MAX(cod_tarea) AS COD_MAX FROM auv_tarea ;";
  $resmax = $mysqli->query($select_max);
  while($row = $resmax->fetch_object()){
      $max=$row->COD_MAX;
  }
  $max_int= (intval($max)+1);
  $sql = "INSERT INTO auv_tarea VALUES ('".$max_int."','".$curso."','".$tema."','".$descripcion."','".$fechainicio."','".$fechafin."')";

  if ($mysqli->query($sql) === TRUE) {
      echo "Tarea ingresada correctamente";
      redirect ('tarea.php?Curso='.$curso.'&Nrc='.$nrc);
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  $mysqli->close();
  
}
?>