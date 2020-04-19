
<?php
	header('Content-Type:application/json');
	$tipos_productos = [
		'cocina',
		'taller',
		'limpieza'
	];
	$cocinas = [
	1=>['tipo' => 'electrica', 
	'marca' => 'hp', 
	'id_seguro' => 1,],
	2=>['tipo' => 'gas', 
	'marca' => 'LG',
	'id_seguro' => 2,],
	];
	
	if('POST' == strtoupper($_SERVER['REQUEST_METHOD']))
	{
		$json = file_get_contents('php://input');
		$cocinas[] = json_decode($json,true);
		
		echo json_encode($cocinas);
	}
	
?>