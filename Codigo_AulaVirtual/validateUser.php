<?php
include 'dbconnection.php';
include 'redirect.php';
$flag=false;
if($_POST){
  $password=$_POST["password"];
  $emailaddress=$_POST["emailaddress"];
  $sql = 'SELECT * FROM seg_usuario WHERE CORREO_ELECTRONICO LIKE "'.$emailaddress.'" AND CLAVE like "'.md5($password).'"';
  $res = $mysqli->query($sql);
  while ($row = $res->fetch_object()) {
     $flag = true;
     
    
     if($row->ESTADO==="ACT")
      {
            
            if(is_null($row->$FECHA_ULTIMO_ACCESO)){
              $flag_redireccion=true;
            }else{
              $flag_redireccion=false;
            }
            date_default_timezone_set('America/Guayaquil');
            $date = date('Y-m-d H:i:s', time());
            
            $sql2 = "UPDATE seg_usuario SET FECHA_ULTIMO_ACCESO='".$date."' WHERE COD_USUARIO='".$row->COD_USUARIO."';";
            $res2 = $mysqli->query($sql2);
            $sql_rol_usuario="SELECT * FROM seg_rol_persona WHERE COD_USUARIO='".$row->COD_USUARIO."';";
            $res_rol_usuario = $mysqli->query($sql_rol_usuario);
            while ($row = $res_rol_usuario->fetch_object()) {
              $tipo_usuario=$row->COD_PERSONA;
            }
            $seleccion_usuario=explode("_",$tipo_usuario);
            if($seleccion_usuario[0]==="DOC"){
              $sql_sesion="SELECT * FROM auv_docente";
              $res_doc = $mysqli->query($sql_sesion);
              while ($row = $res_doc->fetch_object()) {
                if(intval($seleccion_usuario[1]==intval($row->COD_DOCENTE))){
                  $codigo_persona=$row->COD_DOCENTE;
                  $nombres=$row->NOMBRES." ".$row->APELLIDOS;
                  $perfil="DOCENTE";
                }
              }
            }else if($seleccion_usuario[0]==="ALU"){
              $sql_sesion="SELECT * FROM auv_alumno";
              $res_alu = $mysqli->query($sql_sesion);
              while ($row = $res_alu->fetch_object()) {
                if(intval($seleccion_usuario[1]==intval($row->COD_ALUMNO))){
                  $codigo_persona=$row->COD_ALUMNO;
                  $nombres=$row->NOMBRES." ".$row->APELLIDOS;
                  $perfil="ALUMNO";
                }
              }
            }
            session_start();
            $_SESSION["codigo"] = $codigo_persona;
            $_SESSION["nombre"] = $nombres;
            $_SESSION["perfil"] = $perfil;
            redirect("lista_cursos.php");
            
             
      }
}
  if ($flag == false) {
    session_start();
    $_SESSION["errorsession"] = "errorsession";
    
    $sql3 = 'SELECT COD_USUARIO FROM seg_usuario WHERE CORREO_ELECTRONICO LIKE "'.$emailaddress.'";';
    $res = $mysqli->query($sql3);
    while ($row = $res->fetch_object()) {
        $codigo_usuario=$row->COD_USUARIO;
    }
    $consulta="SELECT INTENTOS_ERRONEOS FROM seg_usuario WHERE COD_USUARIO='".$codigo_usuario."';";
    $res3=$mysqli->query($consulta);
    while ($row = $res3->fetch_object()) {
          $intentos=$row->INTENTOS_ERRONEOS;
    }
    $intentos_sumados=(intval($intentos)+1);
    $actualizacion="UPDATE seg_usuario SET INTENTOS_ERRONEOS=".$intentos_sumados." WHERE COD_USUARIO='".$codigo_usuario."';";
    if($mysqli->query($actualizacion)===TRUE){
      if($intentos_sumados>=4){
        $_SESSION["bloqueo"] = "varias_veces";
        $actualizacion_0="UPDATE seg_usuario SET INTENTOS_ERRONEOS=0,ESTADO='BLO' WHERE COD_USUARIO='".$codigo_usuario."';";
        if($mysqli->query($actualizacion_0)===TRUE){
        }
        else{

        }
      }else{
        $_SESSION["bloqueo"] = "no";
      }
    }
    redirect("login.php");
  }

  $mysqli->close();

}else{
  echo "no se ingreso";
}
?>
