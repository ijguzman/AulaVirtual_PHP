<?php
include 'dbconnection.php';
include 'redirect.php';

if($_POST){
  $rol1 = $_POST["select_rol"];
  $password=$_POST["password"];
  $emailaddress=$_POST["emailaddress"];
  $firstname=$_POST["firstname"];
  date_default_timezone_set('America/Guayaquil');
  $date = date('Y-m-d H:i:s', time());
  
  $select_max="SELECT MAX(COD_USUARIO) AS COD_MAX FROM seg_usuario ;";
  $resmax = $mysqli->query($select_max);
  while($row = $resmax->fetch_object()){
      $max=$row->COD_MAX;
  }
  $max_int= (intval($max)+1);
  $sql = "INSERT INTO seg_usuario (CLAVE, CORREO_ELECTRONICO, NOMBRE, ESTADO, FECHA_CREACION, INTENTOS_ERRONEOS,COD_USUARIO)
  VALUES (MD5('".$password."'), '".$emailaddress."', '".$firstname."', 'ACT', '".$date."', 0,'".$max_int."' )";

  if ($mysqli->query($sql) === TRUE) {
      echo "usuario ingresado correctamente";
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }



  $select_rol="SELECT COD_ROL FROM seg_rol WHERE NOMBRE like '".$rol1."';";
  $resrol = $mysqli->query($select_rol);
  while($row = $resrol->fetch_object()){
      $rol=$row->COD_ROL;
      echo $rol;
  }

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
    $max_int_persona= (intval($max)+1);
    $sql = "INSERT INTO seg_rol_persona (COD_ROL,COD_USUARIO,COD_PERSONA)
    VALUES ('".$rol."','".$max_int."','".$prefijo."_".$max_int_persona."')";

    if ($mysqli->query($sql) === TRUE) {
        redirect('user.php');
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

  $mysqli->close();

}

?>
