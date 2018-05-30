<?php
include 'dbconnection.php';
include 'redirect.php';

if($_POST){
  $rol=$_POST["rol1"];
  $usuario=$_POST["usuario"];
  if($rol==="02"){
      $prefijo="DOC";
      $consulta_max="SELECT MAX(COD_DOCENTE) AS COD_MAX FROM auv_docente";
  }else if($rol==="03"){
      $prefijo="ALU";
      $consulta_max="SELECT MAX(COD_ALUMNO) AS COD_MAX FROM auv_alumno";
  }
  $resmax = $mysqli->query($consulta_max);
  while($row = $resmax->fetch_object()){
      $max=$row->COD_MAX;
  }
  $max_int= (intval($max)+1);
  $sql = "INSERT INTO seg_rol_persona (COD_ROL,COD_USUARIO,COD_PERSONA)
  VALUES ('".$rol."','".$usuario."','".$prefijo.$max_int."')";

  if ($mysqli->query($sql) === TRUE) {
      redirect('user.php');
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

  $mysqli->close();
}

?>