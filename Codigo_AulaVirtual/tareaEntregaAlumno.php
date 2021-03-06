<?php

  session_start();
  include 'dbconnection.php';
  $nombre_usuario=$_SESSION["nombre"];
  $perfil_usuario=$_SESSION["perfil"];
  $codigo_usuario=$_SESSION["codigo"]; 
  if($_GET){
	$cod_tarea=$_GET["tarea"];
	
   }

?>
 
<html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
<title>Aula Virtual | Tareas</title>
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
					
		$select_curso="SELECT COD_CURSO FROM auv_curso WHERE COD_ASIGNATURA='".$curso."' 
		AND COD_DOCENTE='".$codigo_usuario."';";
		$res_curso = $mysqli->query($select_curso);
					
		while($row = $res_curso->fetch_object()){
			$cod_curso=$row->COD_CURSO;
		//echo "<script>alert(".$cod_curso.")</script>;";
			}
		$select_tarea="SELECT * FROM auv_tarea WHERE COD_CURSO='".$cod_curso."';";

		$sql_envio="SELECT T.COD_TAREA, A.COD_ALUMNO FROM auv_entrega_tarea T,
		auv_alumno A WHERE T.COD_ALUMNO=A.COD_ALUMNO AND COD_TAREA=".$cod_tarea.";";

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
			echo'<li ><a href="crear_foros.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Crear Foro</span></a>
			<li ><a href="modificar_foro.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Modificar Foro</span></a>
			<li ><a href="ver_participaciones.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Ver Participaciones</span></a>';
			
		 }else if($perfil_usuario==="ALUMNO"){
			echo'<li ><a href="ver_participaciones.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Ver Foros</span></a>';
		 }			
		 
		 echo'</ul>';

		 //echo '<li ><a href="anuncio.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Anuncios</span></a>';
		 echo '<li class="has-sub"><a href="anuncios.html"><i class="icon-info"></i><span class="title">Anuncios</span></a>
		 
		 <ul class="nav collapse">';
		 
		 
		 if($perfil_usuario==="DOCENTE"){
			echo'<li ><a href="anuncios.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Crear Anuncnio</span></a>
			<li ><a href="modificar_anuncio.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Modificar Anuncio</span></a>';
		 }else if($perfil_usuario==="ALUMNO"){
			echo'<li ><a href="modificar_anuncio.php?curso='.$curso.'"><i class="icon-pencil"></i><span class="title">Modificar Anuncio</span></a>';
		 }			
		 
		 echo'</ul>
	 </li>';
		 echo '<li ><a href="wiki.php"><i class=" icon-graduation-cap"></i><span class="title">Wikis</span></a>';
      ?>		</ul>
			</li>
		</ul>
		<!-- /main navigation -->
  </div>
  <!-- /page sidebar -->


  <!-- Main container -->
  <div class="main-container gray-bg">


		  	<!-- Main content -->

		<div class="header-secondary row gray-bg">
			<div class="col-lg-12">
				<div class="page-heading clearfix">
					<h1 class="page-title pull-left">Tareas</h1><button type="button" class="btn btn-primary btn-sm btn-add" data-toggle="modal" data-target="#modal-1">Enviar</button>
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
							<th> Tarea </th>
                            <th> Texto </th>
                            <th> Fecha de envio </th>
                            <th> Archivo </th>
				</thead>
					<tbody id="tableusers">
					<?php

					$res = $mysqli->query($select_tarea);
					while($row = $res->fetch_object()){
						echo '<tr>';
									//echo '<td class="size-40"><div class="form-checkbox"><input type="checkbox" name="name1" value="value1"> <span class="check"><i class="fa fa-check"></i></span></div></td>';
					
						echo '<td>'.$row->COD_TAREA.'</td>';
						echo '<td><strong>'.$row->TEMA.'</strong></td>';
						echo '<td>'.$row->FECHA_ENVIO.'</td>';
						echo '<td>'.$row->ARCHIVO.'</td>';
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


		<div class="row">
		<?php
		if($perfil_usuario==="ALUMNO"){
			echo '<form action="insert_participacion.php" method="POST">
				<textarea  name="texto"></textarea> 
				<input type="hidden" value="'.$cod_curso.'" name="cod_curso"/>
				<input type="hidden" value="'.$cod_tarea.'" name="cod_tarea"/> 
				<input type="submit" value="Registrar Entrega de Tarea">
				
				';
					  					  echo '</form>';
		 }		
					  
      ?>

	  </div>
	  <!-- /main content -->

  </div>
  <!-- /main container -->

</div>
<!-- /page container -->


<!--Basic Modal-->
<div id="modal-1" class="modal fade" tabindex="-1" role="dialog">
<form id="tareaEnviar" method="post" action="tareaEnviar.php">
	<div class="modal-dialog">
    <div class="modal-content">
      
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Enviar Tarea</h4>
      </div>


      			<div class="form-group">
					<label for="=Curso">Tarea</label>
					<select id="select_tarea" name="select_tarea">;
          			
          			<?php $res = $mysqli->query($select_tarea);
                		while($row = $res->fetch_object()){
                    	echo '
                        	<option id="'.$row->COD_TAREA.'" value="'.$row->COD_TAREA.'">'.$row->COD_TAREA."</option>";
                		}
        				echo '  </select>';?>
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
					<label for="texto">Texto</label>
					<input type="text" class="form-control" id="texto" name="texto" placeholder="Titulo de Texto">
					</div>

					<div class="form-group">
					<label for="date">Fecha de Envio</label>
					<input type="Date" class="form-control" id="date" name="date" placeholder="Fecha de Envio">
					</div>

					<div class="form-group">
					<label for="archivo">Archivo</label>
					<input type="Text" class="form-control" id="archivo" name="archivo">
					</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="tareaEnviar" class="btn btn-primary">Guardar</button>
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
<script src="js/plugins/blockui-master/jquery-ui.js"></script>
<script src="js/plugins/blockui-master/jquery.blockUI.js"></script>
<!--Float Charts-->
<script src="js/plugins/flot/jquery.flot.min.js"></script>
<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="js/plugins/flot/jquery.flot.selection.min.js"></script>
<script src="js/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="js/plugins/flot/jquery.flot.time.min.js"></script>
<script src="js/functions.js"></script>

<!--ChartJs-->
<script src="js/plugins/chartjs/Chart.min.js"></script>
<script>
	$(document).ready(function () {
		var $checkbox = $('.todo-list .checkbox input[type=checkbox]');

		$checkbox.change(function () {
			if ($(this).is(':checked')) {
				$(this).parent().addClass('checked');
			} else {
				$(this).parent().removeClass('checked');
			}
		});

		$checkbox.each(function (index) {
			if ($(this).is(':checked')) {
				$(this).parent().addClass('checked');
			} else {
				$(this).parent().removeClass('checked');
			}
		});

		// charts
		var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

		var previousPoint = null;
		$('#graph-bars, #graph-lines').bind('plothover', function (event, pos, item) {
			if (item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
					$('#flotTip').remove();
					var x = item.datapoint[0],
							y = item.datapoint[1];

					var color = item.series.color;
					var day = new Date(x).getDate();
					var month = monthNames[new Date(x).getMonth()];
					var year = new Date(x).getFullYear();
					showTooltip(item.pageX,
							item.pageY,
							day + ' ' + month + ',' + year
							+ " : <strong>" + y +
							" visitors</strong>");

					/*content = item.series.label + ' = ' + item.datapoint[1];
					 showTooltip(item.pageX, item.pageY, content);
					 showTooltip(item.pageX, item.pageY, y + ' visitors at ' + x + '.00h');*/

				}
			} else {
				$('#flotTip').remove();
				previousPoint = null;
			}
		});

		var graphData = [{
				// Visits
				data: [[1196463600000, 45], [1196550000000, 30], [1196636400000, 98], [1196722800000, 37], [1196809200000, 95], [1196895600000, 45], [1196982000000, 65],
					[1197068400000, 120], [1197154800000, 90], [1197241200000, 65], [1197327600000, 50]],
				color: '#ff7575'
			}, {
				// Returning Visits
				data: [[1196463600000, 100], [1196550000000, 170], [1196636400000, 260], [1196722800000, 127], [1196809200000, 240], [1196895600000, 180], [1196982000000, 160],
					[1197068400000, 210], [1197154800000, 270], [1197241200000, 120], [1197327600000, 85]],
				color: '#77b7c5',
			}
		];


		// Lines
		$.plot($('#graph-lines'), graphData, {
			series: {
				points: {
					show: true,
					radius: 3.5
				},
				lines: {
					show: true,
					fill: true
				},
				shadowSize: 0
			},
			grid: {
				color: '#646464',
				borderColor: 'transparent',
				borderWidth: 20,
				hoverable: true
			},
			xaxis: {
				mode: "time",
				tickColor: 'transparent',
				tickDecimals: 2
			},
			yaxis: {
				tickSize: 100
			}
		});

		// Bars
		$.plot($('#graph-bars'), graphData, {
			series: {
				points: {
					show: true,
					radius: 3.5,
				},
				lines: {
					show: true,
					fill: false
				},
				bars: {
					show: false,
					lineWidth: 5,
					align: 'center'
				},
				shadowSize: 0,
				hoverable: true
			},
			grid: {
				color: '#646464',
				borderColor: 'transparent',
				borderWidth: 20,
				hoverable: true
			},
			xaxis: {
				mode: "time",
				tickColor: 'transparent',
				tickDecimals: 2
			},
			yaxis: {
				tickSize: 100
			}
		});

		var $graphBar = $('#graph-bars'), $graphLine = $('#graph-lines'), $linkLine = $('#lines'), $linkBar = $('#bars');
		$graphBar.hide();
		$linkLine.on('click', function (e) {
			e.preventDefault();

			$linkBar.removeClass('active');
			$graphBar.fadeOut(function () {
				$(this).addClass('active');
				$graphLine.fadeIn();
			});
		});
		$linkBar.on('click', function (e) {
			e.preventDefault();

			$linkLine.removeClass('active');
			$graphLine.fadeOut(function () {
				$(this).addClass('active');
				$graphBar.fadeIn();
			});
		});

		var revenueData = [{
				// Visits
				data: [[1475280000000, 400.05], [1475366400000, 1600.32], [1475452800000, 900.35], [1475539200000, 2100.31], [1475625600000, 1800.55], [1475712000000, 900.42], [1475798400000, 2885.01], [1475884800000, 1870.97], [1475971200000, 2145.14], [1476057600000, 1130.14], [1476144000000, 1490.02], [1476230400000, 740.74], [1476316800000, 1280.88], [1476403200000, 1157.71], [1476489600000, 599.71], [1476576000000, 2159.89], [1476662400000, 1557.81], [1476748800000, 959.06], [1476835200000, 158.00], [1476921600000, 757.99], [1477008000000, 800], [1477094400000, 950.25], [1477180800000, 1289.22], [1477267200000, 400.52], [1477353600000, 2425], [1477440000000, 1300.35], [1477526400000, 1600.20], [1477612800000, 890.65], [1477699200000, 2165.29], [1477785600000, 1566.22], [1477872000000, 2064.33]],
				//data: [[6, 400], [7, 1600], [8, 900], [9, 2100], [10, 1200], [12, 1800]],
				//data: [[1167692400000, 1600.05], [1167778800000, 5800.32], [1167865200000, 570.35], [1167951600000, 5600.31], [1168210800000, 1155.55], [1168297200000, 2255.64], [1168383600000, 5334.02], [1168470000000, 1151.88], [1168556400000, 3352.99], [1168815600000, 2652.99], [1168902000000, 3251.21], [1168988400000, 4152.24], [1169074800000, 4450.48], [1169161200000, 7751.99], [1169420400000, 5851.13], [1169506800000, 1555.04], [1169593200000, 55.37], [1169679600000, 54.23], [1169766000000, 55.42], [1170025200000, 54.01], [1170111600000, 56.97], [1170198000000, 58.14], [1170284400000, 58.14], [1170370800000, 59.02], [1170630000000, 58.74], [1170716400000, 58.88], [1170802800000, 57.71], [1170889200000, 59.71], [1170975600000, 59.89], [1171234800000, 57.81], [1171321200000, 59.06], [1171407600000, 58.00], [1171494000000, 57.99], [1171580400000, 59.39], [1171839600000, 59.39], [1171926000000, 58.07], [1172012400000, 60.07], [1172098800000, 61.14], [1172444400000, 61.39], [1172530800000, 61.46], [1172617200000, 61.79], [1172703600000, 62.00], [1172790000000, 60.07], [1173135600000, 60.69], [1173222000000, 61.82], [1173308400000, 60.05], [1173654000000, 58.91], [1173740400000, 57.93], [1173826800000, 58.16], [1173913200000, 57.55], [1173999600000, 57.11], [1174258800000, 56.59], [1174345200000, 59.61], [1174518000000, 61.69], [1174604400000, 62.28], [1174860000000, 62.91], [1174946400000, 62.93], [1175032800000, 64.03], [1175119200000, 66.03], [1175205600000, 65.87], [1175464800000, 64.64], [1175637600000, 64.38], [1175724000000, 64.28], [1175810400000, 64.28], [1176069600000, 61.51], [1176156000000, 61.89], [1176242400000, 62.01], [1176328800000, 63.85], [1176415200000, 63.63], [1176674400000, 63.61], [1176760800000, 63.10], [1176847200000, 63.13], [1176933600000, 61.83], [1177020000000, 63.38], [1177279200000, 64.58], [1177452000000, 65.84], [1177538400000, 65.06], [1177624800000, 66.46], [1177884000000, 64.40], [1178056800000, 63.68], [1178143200000, 63.19], [1178229600000, 61.93], [1178488800000, 61.47], [1178575200000, 61.55], [1178748000000, 61.81], [1178834400000, 62.37], [1179093600000, 62.46], [1179180000000, 63.17], [1179266400000, 62.55], [1179352800000, 64.94], [1179698400000, 66.27], [1179784800000, 65.50], [1179871200000, 65.77], [1179957600000, 64.18], [1180044000000, 65.20], [1180389600000, 63.15], [1180476000000, 63.49], [1180562400000, 65.08], [1180908000000, 66.30], [1180994400000, 65.96], [1181167200000, 66.93], [1181253600000, 65.98], [1181599200000, 65.35], [1181685600000, 66.26], [1181858400000, 68.00], [1182117600000, 69.09], [1182204000000, 69.10]],
				color: '#fff',
				label: 'Revenue($)',
				dashes: {show: true}
			}
		];

		$('#placeholder_overview, #Revenue-lines').bind('plothover', function (event, pos, item) {
			if (item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
					$('#flotTip').remove();
					var x = item.datapoint[0],
							y = item.datapoint[1];
					//showTooltip(item.pageX, item.pageY, y + ' visitors at ' + x + '.00h');

					var color = item.series.color;
					var day = new Date(x).getDate();
					var month = monthNames[new Date(x).getMonth()];
					var year = new Date(x).getFullYear();
					showTooltip(item.pageX,
							item.pageY,
							day + ' ' + month + ',' + year
							+ " : <strong>" + y +
							"($)</strong>");
				}
			} else {
				$('#flotTip').remove();
				previousPoint = null;
			}
		});

		var options = {
			series: {
				points: {
					show: true,
					radius: 3.5,
					fillColor: "rgba(0,0,0,0.35)",
				},
				lines: {
					show: true,
					lineWidth: 2,
					fill: true
				},
				bars: {
					show: false,
					lineWidth: 2
				},
				shadowSize: 10,
				//highlightColor: '#fff',
				hoverable: true,
				clickable: true,
			},
			grid: {
				color: '#646464',
				borderColor: 'transparent',
				borderWidth: 20,
				hoverable: true,
				tickColor: "rgba(255,255,255,0.05)",
				markingsColor: "rgba(255,255,255,0.05)",
				markingsLineWidth: 5,
				/*backgroundColor: {
					colors: ["rgba(54,58,60,0.05)", "rgba(0,0,0,0.2)"]
				}*/
			},
			legend: {
				show: true
			},
			xaxis: {
				mode: 'time',
				font: {
					weight: "bold"
				},
				color: "#D6D8DB",
				tickColor: 'transparent',
				tickDecimals: 2
			},
			selection: {
				mode: "x"
			},
			yaxis: {
				font: {
					weight: "bold"
				},
				color: "#D6D8DB",
				tickSize: 500
			}
		};

		// Lines
		var plot = $.plot($('#Revenue-lines'), revenueData, options);

		// Bars
		var overview = $.plot($("#placeholder_overview"), revenueData, {
			colors: ["#edc240", "#5eb95e"],
			series: {
				bars: {
					show: true,
					lineWidth: 5,
					fillColor: "#5eb95e"
				},
				shadowSize: 2,
				grow: {
					active: false
				}
			},
			legend: {
				show: false
			},
			xaxis: {
				ticks: [],
				mode: "time"
			},
			yaxis: {
				ticks: [],
				min: 0,
				autoscaleMargin: 0.1
			},
			selection: {
				mode: "x"
			},
			grid: {
				color: "#D6D8DB",
				borderColor: 'transparent',
				markingsColor: "rgba(255,255,255,0.05)",
				/*backgroundColor: {
					colors: ["rgba(54,58,60,0.05)", "rgba(0,0,0,0.2)"]
				}*/
			}
		});

		$("#Revenue-lines").bind("plotselected", function (event, ranges) {
			// do the zooming
			plot = $.plot($("#Revenue-lines"), revenueData,
					$.extend(true, {}, options, {
						xaxis: {
							min: ranges.xaxis.from,
							max: ranges.xaxis.to
						}
					}));

			// don't fire event on the overview to prevent eternal loop
			overview.setSelection(ranges, true);
		});

		$("#placeholder_overview").bind("plotselected", function (event, ranges) {
			plot.setSelection(ranges);
		});

		$("#Revenuelines").click(function (event) {
			event.preventDefault();
			overview.clearSelection();
			$.plot($("#Revenue-lines"), revenueData, options);
		});

		// pie graph
		var doughnutData = [
			{
				value: 5742,
				color: "#2bbfba",
				highlight: "#1fb3ae",
				label: "Only Visited"
			},
			{
				value: 2496,
				color: "#00b8ce",
				highlight: "#00acc2",
				label: "Purchased"
			},
			{
				value: 1762,
				color: "#e5e8eb",
				highlight: "#d9dcdf",
				label: "Bounced"
			}
		];

		var doughnutOptions = {
			segmentShowStroke: true,
			segmentStrokeColor: "#fff",
			segmentStrokeWidth: 4,
			percentageInnerCutout: 60, // This is 0 for Pie charts
			animationSteps: 100,
			animationEasing: "easeOutBounce",
			animateRotate: true,
			animateScale: false,
			responsive: true,
			//String - A legend template
			legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
		};

		var canvas = document.getElementById("doughnutChart");
		var helpers = Chart.helpers;
		//var ctx = document.getElementById("doughnutChart").getContext("2d");
		var moduleDoughnut = new Chart(canvas.getContext("2d")).Doughnut(doughnutData, doughnutOptions);
		var legendHolder = document.createElement('div');
		legendHolder.innerHTML = moduleDoughnut.generateLegend();
		helpers.each(legendHolder.firstChild.childNodes, function (legendNode, index) {
			helpers.addEvent(legendNode, 'mouseover', function () {
				var activeSegment = moduleDoughnut.segments[index];
				activeSegment.save();
				activeSegment.fillColor = activeSegment.highlightColor;
				moduleDoughnut.showTooltip([activeSegment]);
				activeSegment.restore();
			});
		});
		helpers.addEvent(legendHolder.firstChild, 'mouseout', function () {
			moduleDoughnut.draw();
		});
		canvas.parentNode.parentNode.appendChild(legendHolder.firstChild);
	});
	
          
      ?>
      
</script>
</body>
</html>
