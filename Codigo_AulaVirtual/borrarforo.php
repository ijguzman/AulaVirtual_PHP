<?php 
    include 'dbconnection.php';
    include 'redirect.php';
    
    $id=$_GET["id"];
    
    $sql = "DELETE FROM auv_foro WHERE COD_FORO=".$id."";
    if ($mysqli->query($sql) === TRUE) {
        redirect("foro.php");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }


?>

