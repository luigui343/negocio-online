<fieldset>
	<legend>editar producto</legend>
	<form action="?controlador=producto&accion=edtProducto&op=1" method="post" id="edtProducto"enctype="multipart/form-data" >
			<tr>
				<td><label>nombre</label></td>
				<td><input type="text" name="nombre" class="form-control" value="<?php echo $datos['pro_nombre']; ?>"></td>
			</tr>
			<tr>
				<td><label>precio</label></td>
				<td><input type="number" name="precio" class="form-control" value="<?php echo $datos['pro_precio']; ?>"></td>
			</tr>
			<tr>
				<td><label>descripcion</label></td>
				<td><input type="text" class="form-control" name="escripcion" value="<?php echo $datos['pro_escripcion']; ?>"></td>
			</tr>
			foto: <input type="file" name="foto" id="foto" value="<?php echo $datos['pro_foto']; ?>" class="form-control">
		<input type="hidden" name="id" value="<?php echo $datos['pro_id']; ?>">
		<input type="submit" name="enviar"  class="btn btn-primary">
	</form>
</fieldset>