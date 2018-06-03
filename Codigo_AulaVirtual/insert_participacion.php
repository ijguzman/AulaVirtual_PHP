<?php
include 'dbconnection.php';
include 'redirect.php';
session_start();
$nombre_usuario=$_SESSION["nombre"];
$perfil_usuario=$_SESSION["perfil"];
$codigo_usuario=$_SESSION["codigo"];
if($_POST){
  $texto=$_POST["texto"];
  $cod_curso=$_POST["cod_curso"];
  $cod_foro=intval($_POST["cod_foro"]);
  date_default_timezone_set('America/Guayaquil');
  $date = date('Y-m-d H:i:s', time());
    $sql = "INSERT INTO  auv_foro_alumno(COD_FORO,COD_ALUMNO,COD_CURSO,TEXTO,FECHA)
    VALUES (".$cod_foro.",'".$codigo_usuario."','".$cod_curso."','".$texto."','".$date."');";
    
  
    if ($mysqli->query($sql) === TRUE) {
        redirect("participar_foro.php?foro=".$cod_foro);
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  
  

  $mysqli->close();
}

?>