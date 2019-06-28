<div class="row">
	<div class="col-md-12">

<fieldset>
	<legend>crear producto</legend>
	<form action="?controlador=producto&accion=regProducto&op=1" method="post" id="regProducto"
	 enctype="multipart/form-data">
		<label  for="nombre" >nombre</label>
		<input  id="nombre" type="text" name="nombre" class="form-control">

		<label for="precio" >precio</label>
		<input id="precio" type="number" name="precio"  class="form-control">

		<label for="descripcion" >descripcion</label>
		<input id="descripcion" type="text" name="escripcion" class="form-control">

		foto: <input type="file" name="foto" id="foto" class="form-control">
		<input type="submit" name="enviar" class="btn btn-primary">
	</form>
	

</fieldset>
</div>
        </div>