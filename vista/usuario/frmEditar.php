<fieldset>
	<legend>editar usuario</legend>
	<form action="?controlador=usuario&accion=edtUsuario&op=1" method="post" id="edtUsuario">
		<tr>
			<td><label>nombre</label></td>
			<td><input type="text"  class="form-control" name="nombre" value="<?php echo $datos['usu_nombre']; ?>" required=""></td>
		</tr>
		<tr>
			<td><label>correo</label></li></td>
			<td><input type="email" name="correo" class="form-control" value="<?php echo $datos['usu_correo']; ?>" required=""></td>
		</tr>
		<tr>
			<td><label>telefono</label></td>
			<td><input type="text" class="form-control" name="telefono" value="<?php echo $datos['usu_telefono']; ?>" required=""></td>
		</tr>
	<input type="hidden" name="id" value="<?php echo $datos['usu_id']; ?>">
	<input type="submit" name="enviar" value="guardar" class="btn btn-primary">
</form>
</fieldset>