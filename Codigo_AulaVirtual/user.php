<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
<title>Aula Virtual - Usuarios</title>
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

<link href="css/plugins/select2/select2.css" rel="stylesheet">

<link href="css/mouldifi-forms.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
<![endif]-->


<!--Load JQuery-->
<script src="js/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $("#filterusers").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tableusers tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</head>
<body  onload="generarClave()">

<!-- Page container -->
<div class="page-container">

  <!-- Page Sidebar -->
  <div class="page-sidebar">

  		<!-- Site header  -->
		<header class="site-header">
		  <div class="site-logo"><a href="index.html"><img src="images/logo.jpg" alt="EEUIO" title="EEUIO"></a></div>
		  <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
		  <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
		</header>
		<!-- /site header -->

		<!-- Main navigation -->
		<ul id="side-nav" class="main-menu navbar-collapse collapse">
		<?php
         echo '<li class="active"><a href="user.php"><i class=" icon-graduation-cap"></i><span class="title">Gestionar usuarios</span></a>';
				 echo '<li ><a href="curso_alumno.php"><i class=" icon-graduation-cap"></i><span class="title">Crear cursos</span></a>';
				 
				 echo '<li ><a ><i class="icon-pencil"></i><span class="title">Servicios Web</span></a>
				 <ul class="nav collapse">';
				 echo '<li ><a href="core.php"><i class=" icon-graduation-cap"></i><span class="title">Core</span></a>';
				 echo '<li ><a href="educacioncontinua.php"><i class=" icon-graduation-cap"></i><span class="title">Educacion Continua</span></a>';
				 echo '</ul';
      ?>
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
          <!-- <li class="profile-info dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> <img width="44" class="img-circle avatar" alt="" src="images/man-3.jpg"><?php echo  $_SESSION["username"] ?> <span class="caret"></span></a> -->

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

			 

			  
			</ul>
			<!-- /user alerts -->

		</div>
      </div>
    </div>
	<!-- /main header -->

	<!-- Secondary header -->
	<div class="header-secondary row gray-bg">
		<div class="col-lg-12">
			<div class="page-heading clearfix">
				<h1 class="page-title pull-left">Usuarios</h1><button type="button" class="btn btn-primary btn-sm btn-add" data-toggle="modal" data-target="#modal-1">NUEVO</button>
			</div>
			<!-- Breadcrumb -->
			<ol class="breadcrumb breadcrumb-2">
				<li><a href="index.html"><i class="fa fa-home"></i>Inicio</a></li>
				<li class="active"><strong>Usuarios</strong></li>
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
				<h3 class="title">Filtro de Usuarios</h3>
			</div>
			<form class="form-inline">
				<div class="form-group">
					<label class="form-label">Buscar</label>
					<input type="text" id="filterusers" placeholder="Búsqueda por ID, nombre, cédula o correo." class="form-control" size="100px">
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
					<tbody id="tableusers">
        <?php
        include 'dbconnection.php';
        $res = $mysqli->query($select_usuario);


          while($row = $res->fetch_object()){
            echo '<tr>';
						//echo '<td class="size-40"><div class="form-checkbox"><input type="checkbox" name="name1" value="value1"> <span class="check"><i class="fa fa-check"></i></span></div></td>';
           
            echo '<td>'.$row->COD_USUARIO.'</td>';
            echo '<td><strong>'.$row->NOMBRE.'</strong></td>';
            echo '<td>'.$row->CORREO_ELECTRONICO.'</td>';
            echo '<td>'.$row->FECHA_CREACION.'</td>
            
            </td>
            </tr>';

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
<form id="newuser" method="post" action="newuser.php">
	<div class="modal-dialog">
    <div class="modal-content">
      
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nuevo Usuario</h4>
      </div>
      
					<div class="form-group">
					<label for="emailaddress">Email</label>
					<input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Email">
					</div>
					<div class="form-group">
					<label for="password">Password</label>
					<input type="text" class="form-control" id="password" name="password" placeholder="Contraseña">
					</div>
					<div class="form-group">
					<label for="firstname">Nombre</label>
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombre de usuario" onkeypress="generarClave()">
					</div>
					<div class="form-group">
					<label for="rol">Rol</label>
					<!--<input type="text" class="form-control" id="rol" name="rol" placeholder="Seleccione el rol">-->
					<select id="rol_select" name="select_rol" onchange="generarClave()">;
          <?php $res = $mysqli->query($select_rol);
                while($row = $res->fetch_object()){
                    echo '
                        <option id="'.$row->COD_ROL.'" value="'.$row->NOMBRE.'">'.$row->NOMBRE."</option>";
                }
        				echo '  </select>';?>
					</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="newuser" class="btn btn-primary">Guardar</button>
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
</body>
</html>
