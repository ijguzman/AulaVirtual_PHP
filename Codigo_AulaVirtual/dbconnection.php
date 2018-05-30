<?php
  $server='localhost';
  $user='root';
  $password='Inrikingjc1107.';
  $db='AulaVirtual_Notificaciones';

  $mysqli = new mysqli($server, $user, $password, $db);
  $mysqli->set_charset("utf8");



 
    $select_rol="SELECT * FROM seg_rol";
    $select_usuario="SELECT * FROM seg_usuario";


?>
