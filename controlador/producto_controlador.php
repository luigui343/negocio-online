<?php
class producto_controlador{

	public function    __construct(){
		if(isset($_SESSION['usu_id'])){
			if ($_SESSION['usu_rol']==2) {
				header("Location: /APP");
			}
		}else{
			header("Location: /APP");
			}
		require_once "modelo/producto_modelo.php";
	}
	public function lisProducto(){
	$datos = producto_modelo::mdl_listarProducto();
		require_once "vista/producto/listadoProducto.php";
		//echo "aqui se cargara el listado de usuario";
	}
//el sgite metodo carga el formulario para crear usuario
	public function frmCrearProducto(){
	require_once "vista/producto/crearProducto.php";	
	}
	//el siguiente metodo gestionara los datos del formualrio enviandolos al metodo
	public function regProducto(){
		extract($_POST);

		$ruta = "./Recursos/imagen/";
		$nombre_foto = $_FILES["foto"]["name"];
		$nombre_tmp = $_FILES["foto"]["tmp_name"];

		if (move_uploaded_file($nombre_tmp, $ruta."".$nombre_foto)){	
				$respuesta = producto_modelo::mdl_regProducto($nombre, $precio, $escripcion,$nombre_foto);
			if($respuesta==1){
				echo json_encode(array("texto" => "producto registrado exitosamente", "success"=>1));
			}else{
				$respuesta['success'] = 2;
				echo json_encode(array("texto" => "error al registrar producto ", "success"=>2));
			}
		}else{
			echo json_encode(array("texto" => "error al cargar imagen ", "success"=>3));
		}
	}
	public function eliminar(){
		//si el id no existe en la url, entra en el sino y lo redirecciona a la pagina principal
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$r = producto_modelo::mdl_eliminarProducto($id);
		//cuamdo se elimine, lo redireccionamos al listado
		echo json_encode(array("texto" => "Producto eliminado", "success"=>1));
	}else{
		header("Location: /APP");
	}
		}

		public function frmEditar(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$datos = producto_modelo::mdl_consultarProductoByID($id);
			require_once "vista/producto/frmEditar.php";
		}else{
			header("Location: /APP");
	}
		}
		public function edtProducto(){
			extract($_POST);
			$r = producto_modelo::mdl_editarProducto($nombre,$precio,$escripcion,$foto,$id);
			if($r > 0){
				echo json_encode(array("texto" => " editado exitosamente ", "success"=>1));
			}else{
				echo json_encode(array("texto" => " hubo un al editar ", "success"=>2));
			}
		}
		public function frmBusqueda(){
		require_once "vista/producto/frmBusqueda.php";
	}

	public function ConsultarProducto(){
		$r = producto_modelo::mdl_buscarProducto($_POST['valor']);

		$tabla = "";
		$tabla.="<table class='table'>";
		$tabla.="<tr>";
		$tabla.="<td>NOMBRES</td>";
		$tabla.="<td>PRECIO</td>";
		$tabla.="<td>DESCRIPCION</td>";
		$tabla.="</tr>";
		foreach ($r as $key => $value) {
			$tabla.="<tr>";
			$tabla.="<td>".$value['pro_nombre']."</td>";
			$tabla.="<td>".$value['pro_precio']."</td>";
			$tabla.="<td>".$value['pro_escripcion']."</td>";
			$tabla.="</tr>";
		}
		$tabla.="</table>";
		echo json_encode(array("text"=>"---","resultado"=> $tabla));
	}
		public function buscar(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$datos = producto_modelo::mdl_consultarProductoByID($id);
			require_once "vista/producto/mostrar.php";
		}else{
			header("Location: /APP");
	}
		}

}