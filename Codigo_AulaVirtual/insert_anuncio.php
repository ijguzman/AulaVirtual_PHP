<?php
include 'dbconnection.php';
include 'redirect.php';
session_start();
$nombre_usuario=$_SESSION["nombre"];
$perfil_usuario=$_SESSION["perfil"];
$codigo_usuario=$_SESSION["codigo"];
if($_POST){
  
  $cod_anuncio=intval($_POST["cod_anuncio"]);
  $cod_curso=intval($_POST["cod_curso"]);
  $descripcion=$_POST["descripcion"];
  date_default_timezone_set('America/Guayaquil');
  $date = date('Y-m-d H:i:s', time());
    $sql = "INSERT INTO  auv_anuncio(COD_ANUNCIO,COD_CURSO,TEMA,DESCRIPCION,FECHA)
    VALUES (".$cod_anuncio.",'".$codigo_curso."','".$tema."','".$descripcion."','".$date."');";
    
  
    if ($mysqli->query($sql) === TRUE) {
        redirect("modificar_anuncio.php?anuncio=".$cod_anuncio);
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  
  

  $mysqli->close();
}

?>