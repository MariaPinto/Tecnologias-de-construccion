<?php

// cocinas
$cocinas = [
	1=>['categoria'=> 'cocina', 
	'tipo' => 'electrica', 
	'marca' => 'hp', 
	'id_seguro' => 1,],
	2=>['categoria'=> 'cocina', 
	'tipo' => 'gas', 
	'marca' => 'LG',
	'id_seguro' => 2,],
];

$refrigeradores = [
	1=>['categoria'=> 'refrigeradores', 
	'tipo' => 'puerta francesa', 
	'marca' => 'Maytag', 
	'id_seguro' => 1,],
	2=>['categoria'=> 'refrigeradores',
	'tipo' => 'top freezer', 
	'marca' => 'LG',
	'id_seguro' => 2,],
];


$cocina = array($cocinas, $refrigeradores);

// taller 

$taladros = [
	1=>['categoria'=> 'taladros', 
	'tipo' => 'electrico', 
	'marca' => 'pretul', 
	'id_seguro' => 1,],
	2=>['categoria'=> 'taladros',
	'tipo' => 'portatil', 
	'marca' => 'bosch',
	'id_seguro' => 2,],
];

$serruchos = [
	1=>['categoria'=> 'serruchos',
	'tipo' => 'modelo japones', 
	'marca' => 'Procut', 
	'id_seguro' => 1,],
	2=>['tipo' => 'de costilla', 
	'marca' => 'Procut', 
	'id_seguro' => 1,],
];

$taller = array($taladros, $serruchos);

// limpieza

$jabones = [
	1=>['categoria'=> 'jabones', 
	'tipo' => 'antibacterial', 
	'marca' => 'aval', 
	'id_seguro' => 1,],
	2=>['categoria'=> 'jabones',
	'tipo' => 'ropa', 
	'marca' => 'ariel',
	'id_seguro' => 2,],
];

$esponjas = [
	1=>['categoria'=> 'esponjas',
	'tipo' => 'antirayas', 
	'marca' => 'ayudin', 
	'id_seguro' => 1,],
	2=>['categoria'=> 'esponjas',
	'tipo' => 'limpia grasa', 
	'marca' => 'ciff', 
	'id_seguro' => 1,],
];

$limpieza = array($jabones, $esponjas);

// productos

$productos = array($cocina, $taller, $limpieza);



//echo json_encode($productos[0]);
/*
foreach ($productos as $level1)
{
	echo 'Categoria: '.$categoria.PHP_EOL;
	
	$tipo_producto = 1;
	foreach((array)$level1 as $level2)
	{
		echo '*** tipo producto '.$tipo_producto.PHP_EOL;
		
		$num_producto = 1;
		
		foreach((array)$level2 as $level3)
		{
			
			print_r($level3);
			
		}
		
		$tipo_producto = $tipo_producto + 1;
	}
	$categoria = $categoria + 1;
}*/

?>