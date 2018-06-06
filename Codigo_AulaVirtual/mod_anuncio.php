<?php
include 'dbconnection.php';
include 'redirect.php';
session_start();
$nombre_usuario=$_SESSION["nombre"];
$perfil_usuario=$_SESSION["perfil"];
$codigo_usuario=$_SESSION["codigo"];
if($_POST){
  
  $cod_anuncio=intval($_POST["cod_anuncio"]);
  //$curso=intval($_POST["curso"]);
  $descripcion=$_POST["descripcion"];
  //$tema=$_POST["tema"];
  date_default_timezone_set('America/Guayaquil');
  $date = date('Y-m-d H:i:s', time());
    $sql ="UPDATE auv_anuncio SET  DESCRIPCION WHERE COD_ANUNCIO = '".$cod_anuncio."'
    VALUES ('".$descripcion."','".$date."');";
    
  
    if ($mysqli->query($sql) === TRUE) {
        redirect("modificar_anuncio.php?anuncio=".$cod_anuncio);
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  
  

  $mysqli->close();
}

?>