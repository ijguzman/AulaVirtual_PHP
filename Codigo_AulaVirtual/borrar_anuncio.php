<?php 
    include 'dbconnection.php';
    include 'redirect.php';
    
    $id=$_GET["id"];
    
    $sql = "DELETE FROM auv_anuncio WHERE COD_ANUNCIO=".$id."";
    if ($mysqli->query($sql) === TRUE) {
        redirect("visualizar_anuncio.php");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }


?>

