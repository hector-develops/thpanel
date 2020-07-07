<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=192.168.0.22;dbname=devslops",
			            "root",
			            "Dev1234*");

		$link->exec("set names utf8");

		return $link;

	}

}