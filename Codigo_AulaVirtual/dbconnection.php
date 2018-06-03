<?php
  $server='localhost';
  $user='root';
  $password='';
  $db='reader';

  $mysqli = new mysqli($server, $user, $password, $db);
  $mysqli->set_charset("utf8");

  function borrarForo($id){
    $sql = "DELETE FROM auv_foro WHERE COD_FORO=".$id."";
    return $mysqli($sql);

    
  }

  $select_rol="SELECT * FROM seg_rol";
  $select_usuario="SELECT * FROM seg_usuario";
  $select_foro="SELECT * FROM auv_foro";
  $select_curso="SELECT COD_CURSO FROM auv_curso ORDER BY COD_CURSO";
?>
