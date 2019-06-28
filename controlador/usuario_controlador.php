<?php
class usuario_controlador{

	public function    __construct(){
		require_once "modelo/usuario_modelo.php";
	}

	public static function validarDatos(){
		if(isset($_SESSION['usu_id'])){
			if ($_SESSION['usu_rol']==2) {
				header("Location: /APP");
				}
			}else{
				header("Location: /APP");
			}
	}


	public function lisUsuario(){
		usuario_controlador::validarDatos();
	$datos = usuario_modelo::mdl_listarUsuario();
		require_once "vista/usuario/listadoUsuarios.php";
		//echo "aqui se cargara el listado de usuario";
	}
//el sgite metodo carga el formulario para crear usuario
	public function frmCrearUsuario(){
		usuario_controlador::validarDatos();
	require_once "vista/usuario/crearUsuario.php";	
	}
	//el siguiente metodo gestionara los datos del formualrio enviandolos al metodo
	public function regUsuario(){
		extract($_POST); 
		$r= usuario_modelo::validarCorreo($correo);
		if( $r > 0){
			echo json_encode(array("texto" => "ya existe este correo", "success" => 1));
		}else{
				usuario_controlador::validarDatos();
				extract($_POST);
			$respuesta = usuario_modelo::mdl_regUsuario($nombre,$correo,$telefono);
			if ($respuesta==1) {
				echo json_encode(array("texto" => "usuario registrado exitosamente", "success"=>1));
			}else{
				$respuesta['success'] = 2;
				echo json_encode(array("texto" => "error al registrar usuario ", "success"=>2));
			}
		}
		
	}
	public function eliminar(){
		usuario_controlador::validarDatos();
		//si el id no existe en la url, entra en el sino y lo redirecciona a la pagina principal

		
	if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$r1 = usuario_modelo::mdl_validarRol($id);
			if( $r1 > 0){
				echo json_encode(array("texto" => "no se puede eliminar un administrador ", "success"=>1));
			}else {
				$r = usuario_modelo::mdl_eliminarUsuario($id);
				//cuamdo se elimine, lo redireccionamos al listado
				echo json_encode(array("texto" => "Usuario  eliminado", "success"=>2));
				}
			
	}else{
		header("Location: /APP");
	}
		}
	public function frmEditar(){
		usuario_controlador::validarDatos();
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$datos = usuario_modelo::mdl_consultarUsuarioByID($id);
			require_once "vista/usuario/frmEditar.php";
		}else{
			header("Location: /APP");
	}
		}
		public function edtUsuario(){
			usuario_controlador::validarDatos();
			extract($_POST);
			$r = usuario_modelo::mdl_editarUsuario($nombre,$correo,$telefono,$id);
			if($r > 0){
				echo json_encode(array("texto" => "  ", "success"=>1));
			}else{
				$respuesta['success'] = 2;
				echo json_encode(array("texto" => "  ", "success"=>2));
			}
		}
		public function validar(){
		extract($_POST);
		$r = usuario_modelo::mdl_validarUsuario($usuario,$password);
		if ($r > 0 ) {
			$_SESSION['usu_nombre'] = $r['usu_nombre'];
			$_SESSION['usu_rol'] = $r['usu_rol'];
			$_SESSION['usu_id'] = $r['usu_id'];
			//header("Location: /APP");
			//echo "todo correcto";
			echo json_encode(array("texto" => "ok", "success"=>1));
		}else{
			$respuesta['success'] = 2;
			echo json_encode(array("texto" => "usuario y/o contraseña incorrectos", "success"=>2));
		}
	}
	//el siguiente metodo gestionara los datos del formualrio enviandolos al metodo
		public function frmContactar(){
		extract($_POST);
		$respuesta = usuario_modelo::mdl_Contactar($nombre,$correo,$telefono,$mensaje);
		if ($respuesta==1) {
			echo "<br /> se a registrado tu sugerencia";
		}else{
			echo "<br /> error al registrar";
		}
	}
	public function frmBusqueda(){
		require_once "vista/usuario/frmBusqueda.php";
	}

	public function ConsultarUsuario(){
		$r = usuario_modelo::mdl_buscarUsuario($_POST['valor']);

		$tabla = "";
		$tabla.="<table class='table'>";
		$tabla.="<tr>";
		$tabla.="<td>NOMBRES</td>";
		$tabla.="<td>TELEFONO</td>";
		$tabla.="<td>CORREO</td>";
		$tabla.="</tr>";
		foreach ($r as $key => $value) {
			$tabla.="<tr>";
			$tabla.="<td>".$value['usu_nombre']."</td>";
			$tabla.="<td>".$value['usu_telefono']."</td>";
			$tabla.="<td>".$value['usu_correo']."</td>";
			$tabla.="</tr>";
		}
		$tabla.="</table>";
		echo json_encode(array("text"=>"---","resultado"=> $tabla));
	}
	public function CambiarPassword(){
		require_once "vista/usuario/frmCambiarPassword.php";
	}

	public function camPassword(){
		extract($_POST);
		$r = usuario_modelo::mdl_camPassword($id,$conACT);
		// $encriptar = sha1($nueCon);
		if($conACT == $nueCon){
			echo json_encode(array("texto" => "la nueva contraseña es igual a la anterior", "success"=>4));
		}else{
			 if ($r > 0 ) {
		 	$r1 = usuario_modelo::mdl_actPassword($id,$nueCon);
		 // "UPDATE t_usarios SET usu_password = '$encriptar' WHERE  usu_id = '$id'";
		 	if($r1 > 0){
				echo json_encode(array("texto" => "contraseña actualizada satisfactoriamente", "success"=>1));
			}else{
				echo json_encode(array("texto" => "error al actualizar la contraseña", "success"=>3));
			}
		}else{
			$respuesta['success'] = 2;
			echo json_encode(array("texto" => "los datos no coinciden", "success"=>2));
		}
		}
		
		}

	
}
