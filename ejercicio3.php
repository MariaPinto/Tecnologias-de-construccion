
<?php
	header('Content-Type:application/json');
	$tipos_productos = [
		'cocina',
		'taller',
		'limpieza'
	];
	
	$productos = array(
		array('cuchara', 'tenedor', 'cuchillo'),
		array('martillo', 'serrucho', 'clavo'),
		array('jabon', 'trapeador', 'escoba'),
	);
	
	$combinacion = array_combine($tipos_productos, $productos);
	
	
	$Producto = $_GET['producto'];
	foreach($combinacion as $key => $value){
		if(in_array($Producto,$value))
		{
			echo "pertenece a $key";

		}
	};
	
	
?>