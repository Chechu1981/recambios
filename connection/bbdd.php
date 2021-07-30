<?php 
	class Db{
		private static $conexion=null;
		private function __construct(){}

		public static function conectar(){
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$conexion=new PDO('mysql:host=localhost;dbname=jofwiffs_maestro','jofwiffs_laura','Chechu81+',$pdo_options);
			return self::$conexion;
		}
	}
?>