<?php
	/*
	mapea la url ingresada en el navegador
	1-controlador
	2-metodo
	3-parametro
	ejemplo /articulos/actualizar/4
	*/
	class Core{
		protected $controladorActual = 'paginas';
		protected $metodoActual = 'index';
		protected $parametros = [];

		//constructor
		public function __construct(){
			//print_r($this->getUrl());
			$url = $this->getUrl();
			//buscar en controladores si el coontrolador existe 
		    if (file_exists('../appcontroladores/' .ucwords($url[0]).'.php')) {
		    
		    unset($url[0]);
		    }
 				//si existe se setea como controlador por defecto
 				//----

 				//unset indice 0
 				//---
		    	
		    // requerir el controlador
		    require_once '../app/controladores/' . $this->controladorActual . '.php';
		    $this->controladorActual = new $this->controladorActual;
		}

		public function getUrl(){
			// echo $_GET['url'];
			if (isset($_GET['url'])){
				$url = rtrim($_GET['url'],'/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}