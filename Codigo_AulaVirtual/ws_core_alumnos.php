<?php


include "ws_core.php";
include "dbconnection.php";
if($_GET){
    $nrc_elegido=$_GET["nrc"];
    // $parametros=array(); //parametros de la llamada

    // $lista_estudiantes = $client->listadoEstudiantes($nrc_elegido,$periodo_elegido);
    // var_dump($lista_estudiantes);
    // $nrcs=json_decode(object2array($lista_estudiantes)["return"]);
    // echo $nrcs;

    // date_default_timezone_set('America/Guayaquil');
    // $date = date('Y-m-d H:i:s', time());
  
    
    // foreach($nrcs as $nrc){
    //     if($nrc_elegido===$nrc->nrcPK->codNrc){
    //         //QUERY CURSO
    //         $cod_docente=$nrc->codDocente->codigo;
    //         $cod_asignatura=$nrc->codAsignatura->codigo;
    //         $insert_docente="INSERT INTO auv_docente (COD_DOCENTE,NOMBRES,APELLIDOS,CEDULA,CORREO_ELECTRONICO)
    //         VALUES('".$nrc->codDocente->codigo."','".$nrc->codDocente->nombres."','".$nrc->codDocente->apellidos."','".$nrc->codDocente->identificacion."','".$nrc->codDocente->correoPersonal."');";
    //         $insert_asignatura="INSERT INTO auv_asignatura (COD_ASIGNATURA,DESCRIPCION) VALUES ('".$nrc->codAsignatura->codigo."','".$nrc->codAsignatura->nombre."')";
    //         $insert_curso="INSERT INTO auv_curso(COD_CURSO,COD_DOCENTE,COD_ASIGNATURA,COD_PERIODO,FECHA_ASIGNADA)
    //         VALUES('".$nrc_elegido."','".$cod_docente."','".$cod_asignatura."','ENE-JUN201','".$date."')";
    //         //QUERY USUARIO
    //         $usuario_docente=$nrc->codDocente->nombres.$nrc->codDocente->apellidos;
    //         $select_max="SELECT MAX(COD_USUARIO) AS COD_MAX FROM seg_usuario ;";
    //         $resmax = $mysqli->query($select_max);
    //         while($row = $resmax->fetch_object()){
    //             $max=$row->COD_MAX;
    //         }
    //         $max_int= (intval($max)+1);
    //         $insert_usuario_docente = "INSERT INTO seg_usuario (CLAVE, CORREO_ELECTRONICO, NOMBRE, ESTADO, FECHA_CREACION, INTENTOS_ERRONEOS,COD_USUARIO)
    //         VALUES (MD5('2018_".$usuario_docente."_Docente'), '".$nrc->codDocente->correoInstitucional."', '".$usuario_docente."', 'ACT', '".$date."', 0,'".$max_int."' )";
    //         $prefijo="DOC";
    //         $insert_rol_persona_docente = "INSERT INTO seg_rol_persona (COD_ROL,COD_USUARIO,COD_PERSONA)
    //         VALUES ('02','".$max_int."','".$prefijo."_".$cod_docente."')";


    //         //EJECUCION QUERY
    //         if ($mysqli->query($insert_docente) === TRUE) {
    //             echo "docente ingresado correctamente <br>";
    //             if ($mysqli->query($insert_asignatura) === TRUE) {
    //                 echo "asignatura ingresado correctamente <br>";
    //                 if ($mysqli->query($insert_curso) === TRUE) {
    //                     echo "curso ingresado correctamente <br>";
    //                 }else{
    //                     echo "Error: " . $insert_curso . "<br>" . $mysqli->error;
    //                 }
    //             }else{
    //                 echo "Error: " . $insert_asignatura . "<br>" . $mysqli->error;
    //             }
    //         } else {
    //             echo "Error: " . $insert_docente . "<br>" . $mysqli->error;
    //         }
    //         if ($mysqli->query($insert_usuario_docente) === TRUE) {
    //             echo "usuario docente ingresado correctamente <br>";
    //             if ($mysqli->query($insert_rol_persona_docente) === TRUE) {
    //                 echo "rol por persona ingresado correctamente <br>";
    //             }else{
    //                 echo "Error: " . $insert_rol_persona_docente . "<br>" . $mysqli->error;
    //             }
    //         }else{
    //             echo "Error: " . $insert_usuario_docente . "<br>" . $mysqli->error;
    //         }

          
    //     }
    // }
    $parametros['nrc']=$nrc_elegido;
    $lista_alumnos = $client->listadoEstudiantes($parametros);
    $alumnos=json_decode(object2array($lista_alumnos)["return"]);
    var_dump($alumnos);    
    
}
?>