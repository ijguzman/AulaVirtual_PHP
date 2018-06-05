<?php
include "array_object.php";
include "redirect.php";
// $servicio="http://192.168.1.142:8080/universidad-soap/universidadSoapWS?wsdl";
$servicio="http://192.168.137.7:8080/universidad-soap/universidadSoapWS?wsdl";
$client = new SoapClient($servicio);
$lista_periodos = $client->listarPeriodos();
$periodos=json_decode(object2array($lista_periodos)["return"]);

$periodo_elegido=$periodos[0]->codigo;
$parametros['periodo']=$periodo_elegido;
$client = new SoapClient($servicio,$parametros);
$lista_nrc = $client->listadonrcs($parametros);
//var_dump($lista_nrc);
$nrcs=json_decode(object2array($lista_nrc)["return"]);



?>