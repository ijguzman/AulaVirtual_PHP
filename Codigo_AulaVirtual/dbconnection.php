<?php
  //Inti
  //$server='localhost';
  //$user='root';
  //$password='Inrikingjc1107.';
   $server='localhost';
   $user='root';
  // $password='root';
  $password='';
  //$db='reader';
  $db='aulavirtual_notificaciones';

  $mysqli = new mysqli($server, $user, $password, $db);
  //$mysqli->set_charset("utf8");
  $mysqli->set_charset("latin1_swedish_ci");

 

  $select_rol="SELECT * FROM seg_rol";
  $select_usuario="SELECT * FROM seg_usuario";
  $select_foro="SELECT * FROM auv_foro";
  $select_curso="SELECT COD_CURSO FROM auv_curso ORDER BY COD_CURSO";
?>
