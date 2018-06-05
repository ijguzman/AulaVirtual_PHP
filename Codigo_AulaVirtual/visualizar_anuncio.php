<?php
  session_start();
  include 'dbconnection.php';
  $nombre_usuario=$_SESSION["nombre"];
  $perfil_usuario=$_SESSION["perfil"];
  $codigo_usuario=$_SESSION["codigo"]; 
  if($_GET){
	$curso=$_GET["curso"];
	$nrc=$_GET["nrc"];
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

  <!-- Main container -->
  <div class="main-container gray-bg">

		<!-- Main header -->
		<div class="main-header row">
		  <div class="col-sm-6 col-xs-7">

			<!-- User info -->
			<ul class="user-info pull-left">
			  <li class="profile-info dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> <img width="44" class="img-circle avatar" alt="" src="images/man-3.jpg">John Henderson <span class="caret"></span></a>

				<!-- User action menu -->
				<ul class="dropdown-menu">

				  <!-- <li><a href="#/"><i class="icon-user"></i>My profile</a></li>
				  <li><a href="#/"><i class="icon-mail"></i>Messages</a></li>
				  <li><a href="#"><i class="icon-clipboard"></i>Tasks</a></li>
				  <li class="divider"></li>
				  <li><a href="#"><i class="icon-cog"></i>Account settings</a></li> -->
				  <li><a href="logout.php"><i class="icon-logout"></i>Logout</a></li>
				</ul>
				<!-- /user action menu -->

			  </li>
			</ul>
			<!-- /user info -->

		  </div>

		  <div class="col-sm-6 col-xs-5">
			<div class="pull-right">
				<!-- User alerts -->
				<ul class="user-info pull-left">

				  <!-- Notifications -->
				  <li class="notifications dropdown">
					<a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-attention"></i><span class="badge badge-info">6</span></a>
					<ul class="dropdown-menu pull-right">
						<li class="first">
							<div class="small"><a class="pull-right danger" href="#">Mark all Read</a> You have <strong>3</strong> new notifications.</div>
						</li>
						<li>
							<ul class="dropdown-list">
								<li class="unread notification-success"><a href="#"><i class="icon-user-add pull-right"></i><span class="block-line strong">New user registered</span><span class="block-line small">30 seconds ago</span></a></li>
								<li class="unread notification-secondary"><a href="#"><i class="icon-heart pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
								<li class="unread notification-primary"><a href="#"><i class="icon-user pull-right"></i><span class="block-line strong">Privacy settings have been changed</span><span class="block-line small">2 hours ago</span></a></li>
								<li class="notification-danger"><a href="#"><i class="icon-cancel-circled pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
								<li class="notification-info"><a href="#"><i class="icon-info pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
								<li class="notification-warning"><a href="#"><i class="icon-rss pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
							</ul>
						</li>
						<li class="external-last"> <a href="#" class="danger">View all notifications</a> </li>
					</ul>
				  </li>
				  <!-- /notifications -->

				  <!-- Messages -->
				  <li class="notifications dropdown">
					<a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-mail"></i><span class="badge badge-secondary">12</span></a>
					<ul class="dropdown-menu pull-right">
						<li class="first">
							<div class="dropdown-content-header"><i class="fa fa-pencil-square-o pull-right"></i> Messages</div>
						</li>
						<li>
							<ul class="media-list">
								<li class="media">
									<div class="media-left"><img alt="" class="img-circle img-sm" src="images/domnic-brown.png"></div>
									<div class="media-body">
										<a class="media-heading" href="#">
											<span class="text-semibold">Domnic Brown</span>
											<span class="media-annotation pull-right">Tue</span>
										</a>
										<span class="text-muted">Your product sounds interesting I would love to check this ne...</span>
									</div>
								</li>
								<li class="media">
									<div class="media-left"><img alt="" class="img-circle img-sm" src="images/john-smith.png"></div>
									<div class="media-body">
										<a class="media-heading" href="#">
											<span class="text-semibold">John Smith</span>
											<span class="media-annotation pull-right">12:30</span>
										</a>
										<span class="text-muted">Thank you for posting such a wonderful content. The writing was outstanding...</span>
									</div>
								</li>
								<li class="media">
									<div class="media-left"><img alt="" class="img-circle img-sm" src="images/stella-johnson.png"></div>
									<div class="media-body">
										<a class="media-heading" href="#">
											<span class="text-semibold">Stella Johnson</span>
											<span class="media-annotation pull-right">2 days ago</span>
										</a>
										<span class="text-muted">Thank you for trusting us to be your source for top quality sporting goods...</span>
									</div>
								</li>
								<li class="media">
									<div class="media-left"><img alt="" class="img-circle img-sm" src="images/alex-dolgove.png"></div>
									<div class="media-body">
										<a class="media-heading" href="#">
											<span class="text-semibold">Alex Dolgove</span>
											<span class="media-annotation pull-right">10:45</span>
										</a>
										<span class="text-muted">After our Friday meeting I was thinking about our business relationship and how fortunate...</span>
									</div>
								</li>
								<li class="media">
									<div class="media-left"><img alt="" class="img-circle img-sm" src="images/domnic-brown.png"></div>
									<div class="media-body">
										<a class="media-heading" href="#">
											<span class="text-semibold">Domnic Brown</span>
											<span class="media-annotation pull-right">4:00</span>
										</a>
										<span class="text-muted">I would like to take this opportunity to thank you for your cooperation in recently completing...</span>
									</div>
								</li>
							</ul>
						</li>
						<li class="external-last"> <a class="danger" href="#">All Messages</a> </li>
					</ul>
				  </li>
				  <!-- /messages -->

				</ul>
				<!-- /user alerts -->

			</div>
		  </div>
		</div>
		<!-- /main header -->

	                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                  <h2>Anuncios</h2>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                
                                                <th> Codigo Anuncio </th>
                                                <th> Codigo Curso </th>
                                                <th> Tema </th>
                                                <th> Descripcion </th>
                                                <th> Fecha </th>
                                            </tr>
											
											
											<?php
											include 'dbconnection.php';
											//$link = mysqli_connect("localhost", "root", "", "aula virtual");
											$sql="SELECT * from auv_anuncio A, auv_curso C, auv_docente D WHERE A.COD_CURSO=C.COD_CURSO AND C.COD_DOCENTE=D.COD_DOCENTE AND C.COD_ASIGNATURA='".$curso."' AND C.COD_DOCENTE='".$codigo_usuario."';";
											//$mysqli->query($select_curso);
											//$res_curso = $mysqli->query($select_curso);
											$result=$mysqli->query($sql);
											while($mostrar=$result->fetch_object()){
												echo "<tr>";
												echo '<td><a href="modificar_anuncio.php?anuncio='.$mostrar->COD_ANUNCIO.'">'.$mostrar->COD_ANUNCIO."</a></td>";
												echo "<td>".$mostrar->COD_CURSO."</td>";
												echo "<td>".$mostrar->TEMA."</td>";
												echo "<td>".$mostrar->DESCRIPCION."</td>";
												echo "<td>".$mostrar->FECHA."</td>";
												echo "</tr>";
										
											}
											?>
										
										
											
                                        </thead>
										
                                        <tbody>
                                            

								
										</li>
										
										
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
							</script>

		<!-- Main content -->

				

	  </div>
	  <!-- /main content -->

  </div>
  <!-- /main container -->

</div>
<!-- /page container -->

</script>
</body>
</html>

</html>