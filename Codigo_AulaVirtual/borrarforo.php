<?php 
include("dbconnection.php");
include("foro.php");
$id = $_POST['COD_FORO'];
delete($id);
header("location:foro.php");
?>