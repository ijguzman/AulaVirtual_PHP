<?php
include 'dbconnection.php';
include 'redirect.php';

if($_POST){
  $alumnos=$_POST["Lista_alumnos"];
  $curso=$_POST["nrc"];
  
  $lista_alumnos=explode("¬",$alumnos);
  foreach($lista_alumnos as $cod_alumno){
    $sql = "INSERT INTO auv_alumno_curso (COD_CURSO,COD_ALUMNO)
    VALUES ('".$curso."','".$cod_alumno."')";
  
    if ($mysqli->query($sql) === TRUE) {
        redirect("curso_alumno.php");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  }
  

  $mysqli->close();
}

?>