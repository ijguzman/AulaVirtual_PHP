<?php
  session_start();
  include 'dbconnection.php';
  $nombre_usuario=$_SESSION["nombre"];
  $perfil_usuario=$_SESSION["perfil"];
  $codigo_usuario=$_SESSION["codigo"]; 
  if($_GET){
	$curso=$_GET["Curso"];
	$nrc=$_GET["Nrc"];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
<title>Tarea</title>
<!-- Site favicon -->
<link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
<!-- /site favicon -->

<!-- Entypo font stylesheet -->
<link href="css/entypo.css" rel="stylesheet">
<!-- /entypo font stylesheet -->

<!-- Font awesome stylesheet -->
<link href="css/font-awesome.min.css" rel="stylesheet">
<!-- /font awesome stylesheet -->

<!-- CSS3 Animate It Plugin Stylesheet -->
<link href="css/plugins/css3-animate-it-plugin/animations.css" rel="stylesheet">
<!-- /css3 animate it plugin stylesheet -->

<!-- Bootstrap stylesheet min version -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- /bootstrap stylesheet min version -->

<!-- Mouldifi core stylesheet -->
<link href="css/mouldifi-core.css" rel="stylesheet">
<!-- /mouldifi core stylesheet -->

<link href="css/mouldifi-forms.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
<![endif]-->

<!--[if lte IE 8]>
	<script src="js/plugins/flot/excanvas.min.js"></script>
<![endif]-->
</head>
<body>
<?php
					include 'dbconnection.php';
					if($perfil_usuario==="DOCENTE")
					$select_curso="SELECT COD_CURSO FROM auv_curso WHERE COD_ASIGNATURA='".$curso."' AND COD_DOCENTE='".$codigo_usuario."';";
					$res_curso = $mysqli->query($select_curso);
					
					while($row = $res_curso->fetch_object()){
						$cod_curso=$row->COD_CURSO;
						//echo "<script>alert(".$cod_curso.")</script>;";
					}
					$select_tarea="SELECT * FROM auv_tarea WHERE COD_CURSO='".$cod_curso."';";
						
?>
<!-- Page container -->
<div class="page-container">

	<!-- Page Sidebar -->
	<div class="page-sidebar">

		<!-- Site header  -->
		<header class="site-header">
		  <div class="site-logo"><a href="index.html"><img src="images/logo.jpg" alt="Mouldifi" title="Mouldifi"></a></div>
		  <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
		  <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
		</header>
		<!-- /site header -->

		<!-- Main navigation -->
		<ul id="side-nav" class="main-menu navbar-collapse collapse">
		
			<?php
         echo '<li class="active"><a href="tarea.php"><i class=" icon-graduation-cap"></i><span class="title">Tareas</span></a>';
         echo '<li ><a href="foro.php"><i class="icon-pencil"></i><span class="title">Foros</span></a>
		 <ul class="nav collapse">';
		 
		 
		 if($perfil_usuario==="DOCENTE"){
			echo'<li ><a href="	.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Crear Foro</span></a>
			<li ><a href="modificar_foro.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Modificar Foro</span></a>
			<li ><a href="ver_participaciones.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Ver Participaciones</span></a>';
			
		 }else if($perfil_usuario==="ALUMNO"){
			echo'<li ><a href="ver_participaciones.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Ver Foros</span></a>';
		 }			
		 
		 echo'</ul>';

		 //echo '<li ><a href="anuncio.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Anuncios</span></a>';
		 echo '<li class="has-sub"><a href="anuncios.php?curso='.$curso.'"><i class="icon-info"></i><span class="title">Anuncios</span></a>
		 
		 <ul class="nav collapse">';
		 
		 
		 if($perfil_usuario==="DOCENTE"){
			echo
			'
			<li ><a href="anuncios.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Crear Anuncnio</span></a>
			<li ><a href="modificar_anuncio.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Modificar Anuncio</span></a>
			<li ><a href="visualizar_anuncio.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Visualizar Anuncnio</span></a>
			';
		 }else if($perfil_usuario==="ALUMNO"){
			echo'<li ><a href="visualizar_anuncio.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Visualizar Anuncio</span></a>';
		 }			
		 
		 echo'</ul>
	 </li>';
		 echo '<li ><a href="wiki.php"><i class=" icon-graduation-cap"></i><span class="title">Wikis</span></a>';
		 if($perfil_usuario==="DOCENTE"){
			echo '<li ><a href="notificaciones.php?Nrc='.$nrc.'"><i class=" icon-graduation-cap"></i><span class="title">Enviar notificaciones</span></a>';
		}
      ?>		</ul>
			</li>
		</ul>
		<!-- /main navigation -->


  </div>
  <!-- /page sidebar -->
	<!-- Main content -->
	<div class="main-content">
<!-- Secondary header -->
<div class="header-secondary row gray-bg">
		<div class="col-lg-12">
			<div class="page-heading clearfix">
				<h1 class="page-title pull-left">Tareas</h1><button type="button" class="btn btn-primary btn-sm btn-add" data-toggle="modal" data-target="#modal-1">ENVIAR</button>
			</div>
			<!-- Breadcrumb -->
			<ol class="breadcrumb breadcrumb-2">
				<li><a href="index.html"><i class="fa fa-home"></i>Inicio</a></li>
				<li class="active"><strong>Tareas</strong></li>
			</ol>
			<div class="tab-wrapper clearfix">
        <!--
        <ul class="nav nav-pills nav-pills-default pull-left">
				  <li role="presentation"><a href="simple-view.html">STYLE 1</a></li>
				  <li role="presentation"><a href="cards-view.html">STYLE 2</a></li>
				  <li class="active" role="presentation"><a href="strip-view.html">STYLE 3</a></li>
				  <li role="presentation"><a href="table-view.html">STYLE 4</a></li>
				</ul>
        -->
				<ul class="nav nav-pills nav-icons pull-right">
				  <!--<li role="presentation"><a href="#"><i class="icon-layout"></i></a></li>-->
				  <!--<li class="active" role="presentation"><a href="#"><i class="icon-list"></i></a></li>-->
				  <li role="presentation"><a href="#" class="toggle-filter" data-block-id="filter-box"><i class="fa fa-filter"></i></a></li>
				</ul>
			</div>

		</div>
	</div>
	<!-- /secondary header -->

	<!-- Filter wrapper -->

  <div class="row filter-wrapper visible-box" id="filter-box">
		<div class="col-lg-12">
			<div class="filter-header">
				<button aria-label="Close" class="close toggle-filter" type="button" data-block-id="filter-box"><i class="icon-cancel"></i></button>
				<h3 class="title">Filtro de Tareas</h3>
			</div>
			<form class="form-inline">
				<div class="form-group">
					<label class="form-label">Buscar</label>
					<input type="text" id="filterusers" placeholder="Búsqueda por número de tarea, tema o descripción." class="form-control" size="100px">
				</div>
				
			</form>
		</div>
	</div>

	<!-- /filter wrapper -->

	<!-- Main content -->
	<div class="main-content">
		

		<div class="animatedParent animateOnce z-index-50">
			<div class="table-responsive indent-row animated fadeInUp">
        <!--<input type="text" id="filterusers" placeholder="Separate by commas...">-->
        		<table class="table table-users table-unbordered table-hover table-separate">
				<thead>
							<tr>
								<th>Código tarea</th>
								<th>Tema</th>
								<th>Descripcion</th>
								<th>Fecha de publicación</th>
								<th>Fecha límite</th>
								<th>Borrar</th>
				</thead>
					<tbody id="tableusers">
					<?php

					$res = $mysqli->query($select_tarea);
					while($row = $res->fetch_object()){
						echo '<tr>';
									//echo '<td class="size-40"><div class="form-checkbox"><input type="checkbox" name="name1" value="value1"> <span class="check"><i class="fa fa-check"></i></span></div></td>';
					
						echo '<td>'.$row->COD_TAREA.'</td>';
						echo '<td><strong>'.$row->TEMA.'</strong></td>';
						echo '<td>'.$row->DESCRIPCION.'</td>';
						echo '<td>'.$row->FECHA_FIN.'</td>';
						echo '<td>'.$row->FECHA_FIN.'</td>';
						echo '<td>';
						echo '<a class="btn btn-primary" class="btn btn-primary" href="borrarforo.php?id='.$row->COD_TAREA.'"><i 
							class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>';
						echo '</td>';
						echo '</tr>';

					}

					?>
						</tbody>
					</table>
			</div>
		</div>

		<!-- Footer -->
		<footer class="animatedParent animateOnce z-index-10">
			<div class="footer-main animated fadeInUp slow">&copy; 2018 <strong>EEUIO</strong> by <a target="_blank" href="#/">KAY Innovation</a> </div>
		</footer>
		<!-- /footer -->

	  </div>
	  <!-- /main content -->

  </div>
  <!-- /main container -->

</div>
<!-- /page container -->


<!--Basic Modal-->
<div id="modal-1" class="modal fade" tabindex="-1" role="dialog">
<form id="tareaNueva" method="post" action="tareaNueva.php">
	<div class="modal-dialog">
    <div class="modal-content">
      
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nueva Tarea</h4>
      </div>

				<div class="form-group">
					<label for="=Curso">Curso</label>
					<select id="select_curso" name="select_curso">;
          			
          			<?php $res = $mysqli->query($select_curso);
                		while($row = $res->fetch_object()){
                    	echo '
                        	<option id="'.$row->COD_CURSO.'" value="'.$row->COD_CURSO.'">'.$row->COD_CURSO."</option>";
                		}
        				echo '  </select>';?>
				</div>

					<div class="form-group">
					<label for="tema">Tema</label>
					<input type="text" class="form-control" id="tema" name="tema" placeholder="Tema de la tarea">
					</div>

					<div class="form-group">
					<label for="descripcion">Descripcion</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion de la tarea">
					</div>

					<div class="form-group">
					<label for="fechainicio">Fecha de inicio</label>
					<input type="Date" class="form-control" id="fechainicio" name="fechainicio">
					</div>

					<div class="form-group">
					<label for="fechafin">Fecha de fin</label>
					<input type="Date" class="form-control" id="fechafin" name="fechafin">
					</div>

					<input type="hidden" id="Lista_alumnos" name="nrc" value="<?php echo $nrc?>"/>
					<input type="hidden" id="Lista_alumnos" name="curso" value="<?php echo $curso?>"/>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="tareaNueva" class="btn btn-primary">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

	</form>
</div><!-- /.modal -->
<!--End Basic Modal-->


<!--Load JQuery-->
<script src="js/jquery.min.js"></script>
<!-- Load CSS3 Animate It Plugin JS -->
<script src="js/plugins/css3-animate-it-plugin/css3-animate-it.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metismenu/jquery.metisMenu.js"></script>
<!-- Select2-->
<script src="js/plugins/select2/select2.full.min.js"></script>
<script src="js/functions.js"></script>
<script>
	$(document).ready(function () {
		$(".select2").select2();
	});
	function generarClave(){
            var año="2018_";
            var nombre_usuario=$("#firstname").val();
            var rol=$("#rol_select").val();
            $("#password").val(año+nombre_usuario+"_"+rol);
            //alert($("#firstname").val());
    }

</script>
	</div>
	  <!-- /main content -->


</body>

</html>

