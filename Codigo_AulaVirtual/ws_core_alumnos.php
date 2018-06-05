<?php
error_reporting(0);
include "ws_core.php";
include "dbconnection.php";
if($_GET){
    $nrc_elegido=$_GET["nrc"];
    date_default_timezone_set('America/Guayaquil');
    $date = date('Y-m-d H:i:s', time());
  
    
    foreach($nrcs as $nrc){
        if($nrc_elegido===$nrc->nrcPK->codNrc){
            //QUERY CURSO
            $cod_docente=$nrc->codDocente->codigo;
            $cod_asignatura=$nrc->codAsignatura->codigo;
            $insert_docente="INSERT INTO auv_docente (COD_DOCENTE,NOMBRES,APELLIDOS,CEDULA,CORREO_ELECTRONICO)
            VALUES('".$nrc->codDocente->codigo."','".$nrc->codDocente->nombres."','".$nrc->codDocente->apellidos."','".$nrc->codDocente->identificacion."','".$nrc->codDocente->correoPersonal."');";
            $insert_asignatura="INSERT INTO auv_asignatura (COD_ASIGNATURA,DESCRIPCION) VALUES ('".$nrc->codAsignatura->codigo."','".$nrc->codAsignatura->nombre."')";
            $insert_curso="INSERT INTO auv_curso(COD_CURSO,COD_DOCENTE,COD_ASIGNATURA,COD_PERIODO,FECHA_ASIGNADA)
            VALUES('".$nrc_elegido."','".$cod_docente."','".$cod_asignatura."','ENE-JUN201','".$date."')";
            //QUERY USUARIO
            $usuario_docente=$nrc->codDocente->nombres.$nrc->codDocente->apellidos;
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
            VALUES ('02','".$max_int."','".$prefijo."_".$cod_docente."')";


            //EJECUCION QUERY
            if ($mysqli->query($insert_docente) === TRUE) {
                echo "docente ingresado correctamente <br>";
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
            } else {
                echo "Error: " . $insert_docente . "<br>" . $mysqli->error;
            }
            
            if ($mysqli->query($insert_asignatura) === TRUE) {
                echo "asignatura ingresado correctamente <br>";                
            }else{
                echo "Error: " . $insert_asignatura . "<br>" . $mysqli->error;
            }
            if ($mysqli->query($insert_curso) === TRUE) {
                echo "curso ingresado correctamente <br>";
            }else{
                echo "Error: " . $insert_curso . "<br>" . $mysqli->error;
            }
          
        }
    }
    $parametros['nrc']=$nrc_elegido;
    $lista_alumnos = $client->listadoEstudiantes($parametros);
    $alumnos=json_decode(object2array($lista_alumnos)["return"]);
    foreach($alumnos as $alumno){
        $insert_alumno="INSERT INTO auv_alumno (COD_ALUMNO,NOMBRES,APELLIDOS,CEDULA,CORREO_ELECTRONICO,CELULAR)
        VALUES('".$alumno->codigo."','".$alumno->nombres."','".$alumno->apellidos."','".$alumno->identificacion."','".$alumno->correoInstitucional."','".$alumno->correoPersonal."')";
        $usuario_alumno=$alumno->nombres.$alumno->apellidos;
        $select_max="SELECT MAX(COD_USUARIO) AS COD_MAX FROM seg_usuario ;";
        $resmax = $mysqli->query($select_max);
        while($row = $resmax->fetch_object()){
            $max=$row->COD_MAX;
        }
        $max_int= (intval($max)+1);
        $insert_usuario_alumno = "INSERT INTO seg_usuario (CLAVE, CORREO_ELECTRONICO, NOMBRE, ESTADO, FECHA_CREACION, INTENTOS_ERRONEOS,COD_USUARIO)
        VALUES (MD5('2018_".$usuario_alumno."_Alumno'), '".$alumno->correoInstitucional."', '".$usuario_alumno."', 'ACT', '".$date."', 0,'".$max_int."' )";        
        $prefijo="ALU";
        $insert_rol_persona_alumno = "INSERT INTO seg_rol_persona (COD_ROL,COD_USUARIO,COD_PERSONA)
        VALUES ('03','".$max_int."','".$prefijo."_".$alumno->codigo."')";
        if ($mysqli->query($insert_alumno) === TRUE) {
            echo "alumno ingresado correctamente <br>";
            if ($mysqli->query($insert_usuario_alumno) === TRUE) {
                echo "usuario alumno ingresado correctamente <br>";
                if ($mysqli->query($insert_rol_persona_alumno) === TRUE) {
                    echo "rol por alumno ingresado correctamente <br>";
                }else{
                    echo "Error: " . $insert_rol_persona_alumno . "<br>" . $mysqli->error;
                }
            }else{
                echo "Error: " . $insert_usuario_alumno . "<br>" . $mysqli->error;
            }
        }else{
            
            echo "Error: " . $insert_alumno . "<br>" . $mysqli->error;
        }
        $insert_alumno_curso="INSERT INTO auv_alumno_curso (COD_ALUMNO,COD_CURSO)
        VALUES('".$alumno->codigo."','".$nrc_elegido."')";
        if ($mysqli->query($insert_alumno_curso) === TRUE) {
            echo "alumno-curso ingresado correctamente";
        }else{
            echo "Error: " . $insert_alumno_curso . "<br>" . $mysqli->error;
        }

    }
    
}
?>