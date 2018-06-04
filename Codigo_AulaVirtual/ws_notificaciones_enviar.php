<?php
    include "ws_notificaciones.php";
    include "dbconnection.php";
    if($_POST){
        $curso=$_POST["Nrc"];
        $alumnos=$_POST["Lista_alumnos"];
        $cod_plantillas=$_POST["plantillas"];
        $cod_medios=$_POST["medios"];
        $lista_alumnos=explode("¬",$alumnos);
        $sql_docente="SELECT COD_DOCENTE FROM auv_curso WHERE COD_CURSO='".$curso."';";
        $res_1 = $mysqli->query($sql_docente);
        while($row = $res_1->fetch_object()){
            $cod_docente=$row->COD_DOCENTE;
        }
        foreach($lista_alumnos as $cod_alumno){
            $result=$client->Notificacion($cod_alumno, $cod_docente, $curso, $cod_plantillas,$cod_medios);
            var_dump($result);
        }
    }

?>