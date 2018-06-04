<?php
include "array_object.php";
$servicio="http://localhost:8080/Notificacion-war/WebServiceNotificaciones?wsdl";
$client = new SoapClient($servicio);
$medios_disponibles = $client->MediosDisponibles();
$plantillas_disponibles = $client->PlantillasDisponibles();
//var_dump($medios_disponibles);
echo "\n";
//$lista_plantillas_disponibles=explode("|",$plantillas_disponibles);
$lista_plantillas_disponibles=object2array($plantillas_disponibles);
//var_dump($plantillas_disponibles);
echo "\n";
echo $lista_plantillas_disponibles['return']."<br>";
$array_plantillas_disponible=explode("|",$lista_plantillas_disponibles['return']);
$n=count($array_plantillas_disponible);

?>