<?php 
include("dbconnection.php");
include("foro.php");
$id = $_GET["COD_FORO"];
$sql = "DELETE FROM auv_foro WHERE COD_FORO=".$id."";
header("location:foro.php");
return $mysqli->query($sql);

?>