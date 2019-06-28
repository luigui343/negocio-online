<!DOCTYPE html>
<html>
<head>
  <title>mostrar</title>
  <link rel="stylesheet" type="text/css" href="b.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

</head>
<body>
<div class="container">

  <!-- Portfolio Item Heading -->
  <h1 class="my-4"><?php echo $datos['pro_nombre']; ?>
    <h5> precio:  <?php echo $datos['pro_precio']; ?> $</h5>
  </h1>

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
      <img class="img-fluid" src="recursos/imagen/<?php echo $datos['pro_foto'];?>"  alt="" >
    </div>

    <div class="col-md-4">
      <h3 class="my-3">descripcion</h3>
      <p><?php echo $datos['pro_escripcion']; ?>.</p>
      <h3 class="my-3">Project Details</h3>
      <ul>
        <li>Dolores de cabeza</li>
        <li>emfermedades comunes</li>
        <li>Para niños y adultos</li>
        <li>Adipiscing Elit</li>
      </ul>
    </div>

  </div>
  <!-- /.row -->
  <br>

  <!-- Related Projects Row -->
  </section>
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center"> 
          <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h3>pide tu producto atraves de whatsApp o por nuestro correo </h3>
          <hr class="divider my-4">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <h3>+57 300 289 7740</h3>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <h3><a class="d-block" href="Salim malof:pedidosfitway@gmail.com">pedidosfitway@gmail.com</a></h3>
        </div>
      </div>
    </div>
  </section>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
        
        </div>
      </div>
    </div>
  </section>
  <!-- /.row -->

</div>
<!-- /.container -->
<script type="text/javascript" src="a.js"></script>
<script type="text/javascript" src="c.js"></script>
<script type="text/javascript" src="recursos/js/mostar.js"></script>
<link rel="stylesheet" type="text/css" href="vista/plantilla.php ">
</body>
</html>

<!-- Page Content -->

