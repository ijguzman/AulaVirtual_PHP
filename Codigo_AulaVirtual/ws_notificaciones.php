<?php
include "array_object.php";
include "redirect.php";
$servicio="http://localhost:8080/Notificacion-war/WebServiceNotificaciones?wsdl";
$client = new SoapClient($servicio);
$medios_disponibles = $client->MediosDisponibles();
$plantillas_disponibles = $client->PlantillasDisponibles();
$lista_plantillas_disponibles=object2array($plantillas_disponibles);
//var_dump($lista_plantillas_disponibles);
$array_plantillas_disponible=explode("|",$lista_plantillas_disponibles["return"]);
$n=count($array_plantillas_disponible);
for($i=0;$i<$n;$i++){
    $plantillas["id"][$i]=explode("-",$array_plantillas_disponible[$i])[0];
    $plantillas["nombre"][$i]=explode("-",$array_plantillas_disponible[$i])[1];
}
$lista_medios_disponibles=object2array($medios_disponibles);
//var_dump($lista_medios_disponibles);
$array_medios_disponible=explode("|",$lista_medios_disponibles["return"]);
$n1=count($array_medios_disponible);
for($i=0;$i<$n1;$i++){
    $medios["id"][$i]=explode("-",$array_medios_disponible[$i])[0];
    $medios["nombre"][$i]=explode("-",$array_medios_disponible[$i])[1];
}
?>