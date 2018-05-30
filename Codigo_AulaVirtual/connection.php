<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', 'Inrikingjc1107.')
    or die('No se pudo conectar: ' . mysql_error());
//echo 'Conectado correctamente';
mysql_select_db('AulaVirtual_Notificaciones') or die('No se pudo seleccionar la base de datos');
$evaxusu = 'SELECT U.USU_CODIGO,USU_CEDULA,USU_APELLIDOS,USU_NOMBRES,EVA_NOMBRE,EXU_RESULTADO,EXU_FECHA
FROM EVALUACION E,EVAXUSU EU, USUARIO U
WHERE E.EVA_CODIGO=EU.EVA_CODIGO AND U.USU_CODIGO=EU.USU_CODIGO';
$result_evaxusu = mysql_query($evaxusu) or die('Consulta fallida: ' . mysql_error());

?>
