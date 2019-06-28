<?php
class inicio_controlador{

	public function    __construct(){
		require_once "modelo/producto_modelo.php";
	}

	public function index(){
		$datos = producto_modelo::mdl_listarProducto();
		require_once"vista/inicio/index.php";
	}
	public function frmLogin(){
		require_once "vista/inicio/frmLogin.php";
	}
	public function frmContactar(){
		require_once "vista/inicio/frmContactar.php";
	}
	public function CerrarSession(){
		session_destroy();//esto elimina los datos de seccion
		header("Location: /APP");
	}
}