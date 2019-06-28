<fieldset>
	<legend>Cambio de contraseña</legend>
	<form action="?controlador=usuario&accion=camPassword&op=1" method="post" id="frmCambiarPassword">
			</td>
			<td><label  for="conACT">contraseña actual</label></td>
			<td><input id="conACT"   type="text" name="conACT" required=""  class="form-control" ></td>
			<td><label for="nueCon">Nueva contraseña</label></li></td>
			<td><input id="nueCon" type="text" name="nueCon" required="" class="form-control" pattern="[A-Za-z0-9]{5,40}" title="Minimo 5 caracteres"></td>
			<td><label for="conNueCon">confirmacion contraseña</label></td>
			<td><input id="conNueCon" type="text" name="conNueCon" required="" class="form-control" pattern="[A-Za-z0-9]{5,40}"  title="Minimo 5 caracteres"></td>
	<input type="hidden" name="id" value="<?php echo $_SESSION['usu_id']; ?>">
	<input type="submit" name="enviar" value="guardar" class="btn btn-primary">
</form>
</fieldset>