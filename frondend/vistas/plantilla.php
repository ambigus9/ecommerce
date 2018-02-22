<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<meta name="title" content="Tienda Virtual">

	<meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam accusantium enim esse eos officiis sit officia">

	<meta name="keyword" content="Lorem ipsum, dolor sit amet, consectetur, adipisicing, elit, Quisquam, accusantium, enim, esse">

	<title>Tienda Virtual</title>
	
	<?php 
		$icono = ControladorPlantilla::ctrEstiloPlantilla();

		echo '<link rel="icon" href="http://localhost/backend/'.$icono["icono"].'">';


	/*==========================================================
	=            MANTENER LA RUTA FIJA DEL PROYECTO            =
	==========================================================*/
	
	$url = Ruta::ctrRuta();
	
	/*=====  End of MANTENER LA RUTA FIJA DEL PROYECTO  ======*/

	?>

	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">	
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">	
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/slide.css">
	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>
	<script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

</head>
<body>

<?php

/*================================
=            CABEZOTE            =
================================*/

include "modulos/cabezote.php";

/*================================
=            CONTENIDO DINAMICO  =
================================*/

$rutas = array();
$ruta  = null;

if(isset($_GET["ruta"])){

	$rutas = explode("/", $_GET["ruta"]);

	$item  = "ruta";
	$valor = $rutas[0];

	/*================================
    =  URL AMIGABLE DE CATEGORIA     =
     ================================*/

	$rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);


	if ($valor == $rutaCategorias["ruta"]) {

		$ruta = $valor;

	}

	/*=================================
    =  URL AMIGABLE DE SUB-CATEGORIA  =
     ================================*/

	$rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

	foreach ($rutaSubCategorias as $key => $value) {

		if ($valor == $value["ruta"]) {

			$ruta = $valor;

		}

	}


	/*=================================
    = lISTA BLANCA DE URL'S AMIGABLES =
     ================================*/


	if($ruta != null){

		include "modulos/productos.php";

	}else{

		include "modulos/error404.php";
	}
}else{

	include "modulos/slide.php";
}

/*=====  End of CABEZOTE  ======*/

	
?>

<script src="<?php echo $url; ?>vistas/js/cabezote.js"></script>
<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
<script src="<?php echo $url; ?>vistas/js/slide.js"></script>

</body>
</html>