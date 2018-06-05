<?php
include "array_object.php";
include "redirect.php";

$servicio="http://192.168.137.40:8084/educacion-continua-web/datosDocentePorCodigoClaseWS?wsdl";
$client = new SoapClient($servicio);
$objeto_todos = $client->obtenerTodos();
$todos=object_to_array_recusive( $objeto_todos );
$n_todos=count($todos["return"]);

?>