<?php
include 'dbconnection.php';
include 'redirect.php';

if($_POST){
  $tarea = $_POST["tarea"];
  $alumno = $_POST["alumno"];
  $curso = $_POST["curso"];
  $texto = $_POST["textdomain(text_domain)"];
  $archivo = $_POST["archivo"];
  $calificacion = 0;
  date_default_timezone_set('America/Guayaquil');
  $date = date('Y-m-d H:i:s', time());
  $fechaEnvio = $_POST["fechaEnvio"];
  $observacion = $_POST[" "];
  
  $select_max="SELECT MAX(cod_tarea) AS COD_MAX FROM auv_tarea ;";
  $resmax = $mysqli->query($select_max);
  while($row = $resmax->fetch_object()){
      $max=$row->COD_MAX;
  }
  $max_int= (intval($max)+1);
  $sql = "INSERT INTO auv_entrega_tarea VALUES ('".$max_int."','".$alumno."','".$curso."','".$texto."','".$date."','".$archivo."','".$calificacion."','".$observacion."')";

  if ($mysqli->query($sql) === TRUE) {
      echo "Tarea ingresada correctamente";
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  $mysqli->close();
  
}
?>