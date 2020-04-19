
<?php
	header('Content-Type:application/json');
	$tipos_productos = [
		'cocina',
		'taller',
		'limpieza'
	];
	
	$productos = array(
		array('cuchara' => 'mango de madera', 'tenedor' => 'tres puntas', 'cuchillo' => 'acero inoxidable'),
		array('martillo' => 'mango de hule' ,  'serrucho' => 'modelo japones' , 'clavo' => 'de Cristo 100% originales'),
		array('jabon' => 'antibacterinao', 'trapeador' => 'incluye balde', 'escoba' => 'de paja'),
	);
	
	
	$combinacion = array_combine($tipos_productos, $productos);
	
	$tipoProducto= $_GET['tipos_productos'];

	foreach($combinacion as $key => $value){
		if($tipoProducto == $key)
		{
			echo json_encode($value);

		}
	};
	
	
?>