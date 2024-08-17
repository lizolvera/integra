<?php
define('CARPETACONTROLADORES', "Controlador/");



if(!empty($_GET['clase'])){
    $control = $_GET['clase'];
    $file = CARPETACONTROLADORES.$control.".php";
    require_once $file;
    $objeto = new $control;
    
    if(!empty($_GET['metodo'])){
    	$metodo = $_GET['metodo'];
    	$objeto->$metodo();
	}

}
else
{
	require_once("Controlador/controladorpublico.php");
    $iniciar=new controladorpublico();
    $iniciar->inicio();
}

?>