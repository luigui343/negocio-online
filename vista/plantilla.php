<!-- <!DOCTYPE html>
<html>
<head>
	<title>MI APP EN MVC</title>
</head>
<body>
	<a href="/APP">inicio</a>
	<a href="?controlador=usuario&accion=lisUsuario">listar usuarios</a>
	<a href="?controlador=producto&accion=lisProducto">listar productos</a>
	<br/>
	<?php //require_once "rutas.php"; ?>

</body>
</html>

 -->
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>tienda online</title>

  <!-- Bootstrap core CSS -->
  <link href="recursos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="recursos/css/heroic-features.css" rel="stylesheet">

<script src="recursos/js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="recursos/css/sweetalert2.min.css" id="theme-styles">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/APP">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          


           <?php if(isset($_SESSION['usu_id'])){ 
              if($_SESSION['usu_rol'] == 1){  ?>
          <li class="nav-item">
            <a class="nav-link" href="?controlador=usuario&accion=lisUsuario">listar usuario </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controlador=producto&accion=lisProducto">listar productos</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="?controlador=usuario&accion=CambiarPassword">Cambiar contraseña</a>
          </li>

          <?php } //validar rol
        } //validar seccion existe?> 

        <?php if(isset($_SESSION['usu_id'])){ 
              if($_SESSION['usu_rol'] == 2){  ?>
   
              	<fieldset>
					<form action="?controlador=producto&accion=ConsultarProducto&op=1"
					 autocomplete="off" method="post" id="frmBusquedaProducto">
					<td><input id="nombre_pro"  placeholder="buscar un producto"  type="text" name="nombre_pro" required=""  class="form-control"></td>
					</form>
						<div id="listado"></div>
				</fieldset>
         <li class="nav-item">
            <a class="nav-link" href="?controlador=usuario&accion=CambiarPassword">Cambiar contraseña</a>
          </li>

          <?php } //validar rol
        }       ?>


         <?php if(!isset($_SESSION['usu_id'])){ ?>
         <li class="nav-item">
            <a class="nav-link" href="?controlador=inicio&accion=frmLogin">login</a>
          </li>
          <?php } ?>

           <li class="nav-item">
            <a class="nav-link" href="?controlador=inicio&accion=frmContactar">Contactanos</a>
          </li>

          <?php if(isset($_SESSION['usu_id'])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="?controlador=inicio&accion=cerrarSession"> <?php echo $_SESSION['usu_nombre']."";?> salir</a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">Bienvenido a  tienda onnline!</h1>
      <p class="lead">.</p>
     <!--  <a href="#" class="btn btn-primary btn-lg">Call to action!</a> -->
    </header>

    <!-- Page Features -->
    <?php require_once "rutas.php"; ?>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Tienda onnline 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="recursos/vendor/jquery/jquery.min.js"></script>
  <script src="recursos/js/default.js"></script>
  <script src="recursos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
