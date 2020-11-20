<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=192.168.15.22;dbname=devslops",
			            "jaja",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}
