<?php


include "ws_educacioncontinua.php";
include "dbconnection.php";
if($_GET){
    $nrc_elegido=$_GET["nrc"];

    date_default_timezone_set('America/Guayaquil');
    $date = date('Y-m-d H:i:s', time());
  
    
    for($i=0;$i<$n_todos;$i++){
        if($nrc_elegido===$todos["return"][$i]["codigo"]["codClase"]){
            //QUERY CURSO
            $docente=$todos["return"][$i]["insPersona"];
            $asignatura=$todos["return"][$i]["insCurso"];
            $insert_docente="INSERT INTO auv_docente (COD_DOCENTE,NOMBRES,APELLIDOS,CEDULA,CORREO_ELECTRONICO)
            VALUES('".$docente["codigo"]."','".$docente["nombre"]."','".$docente["apellido"]."','".$docente["codigo"]."','');";
            $insert_asignatura="INSERT INTO auv_asignatura (COD_ASIGNATURA,DESCRIPCION) VALUES ('EDC_".$asignatura["codigo"]."','".$asignatura["descripcion"]."')";
            $insert_curso="INSERT INTO auv_curso(COD_CURSO,COD_DOCENTE,COD_ASIGNATURA,COD_PERIODO,FECHA_ASIGNADA)
            VALUES('".$nrc_elegido."','".$docente["codigo"]."','".$asignatura["codigo"]."','ENE-JUN201','".$date."')";
            //QUERY USUARIO
            $usuario_docente=$docente["nombre"].$docente["apellido"];
            $select_max="SELECT MAX(COD_USUARIO) AS COD_MAX FROM seg_usuario ;";
            $resmax = $mysqli->query($select_max);
            while($row = $resmax->fetch_object()){
                $max=$row->COD_MAX;
            }
            $max_int= (intval($max)+1);
            $insert_usuario_docente = "INSERT INTO seg_usuario (CLAVE, CORREO_ELECTRONICO, NOMBRE, ESTADO, FECHA_CREACION, INTENTOS_ERRONEOS,COD_USUARIO)
            VALUES (MD5('2018_".$usuario_docente."_Docente'), '".$nrc->codDocente->correoInstitucional."', '".$usuario_docente."', 'ACT', '".$date."', 0,'".$max_int."' )";
            $prefijo="DOC";
            $insert_rol_persona_docente = "INSERT INTO seg_rol_persona (COD_ROL,COD_USUARIO,COD_PERSONA)
            VALUES ('02','".$max_int."','".$prefijo."_".$docente["codigo"]."')";


            //EJECUCION QUERY
            if ($mysqli->query($insert_docente) === TRUE) {
                echo "docente ingresado correctamente <br>";
                if ($mysqli->query($insert_asignatura) === TRUE) {
                    echo "asignatura ingresado correctamente <br>";
                    if ($mysqli->query($insert_curso) === TRUE) {
                        echo "curso ingresado correctamente <br>";
                    }else{
                        echo "Error: " . $insert_curso . "<br>" . $mysqli->error;
                    }
                }else{
                    echo "Error: " . $insert_asignatura . "<br>" . $mysqli->error;
                }
            } else {
                echo "Error: " . $insert_docente . "<br>" . $mysqli->error;
            }
            if ($mysqli->query($insert_usuario_docente) === TRUE) {
                echo "usuario docente ingresado correctamente <br>";
                if ($mysqli->query($insert_rol_persona_docente) === TRUE) {
                    echo "rol por persona ingresado correctamente <br>";
                }else{
                    echo "Error: " . $insert_rol_persona_docente . "<br>" . $mysqli->error;
                }
            }else{
                echo "Error: " . $insert_usuario_docente . "<br>" . $mysqli->error;
            }

          
        }
    }
    // $servicio_alumnos="http://192.168.137.40:8084/educacion-continua-web/listaEstudiantesPorCodigoClaseWS?wsdl";
    // $client_alumnos = new SoapClient($servicio_alumnos);
    // $objeto_alumnos = $client_alumnos->matriculaPorCodifo($nrc_elegido);
    // $alumnos=object_to_array_recusive( $objeto_todos );
    // $n_alumnos=count($alumnos["return"]);
    // var_dump($alumnos);    
}



?>
