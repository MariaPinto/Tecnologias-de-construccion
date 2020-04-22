
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
	
	$taller = [
	1=>['tipo' => 'serrucho', 
	'marca'=>'Superior',
	'id_seguro'=>1,],
	];
	
	$limpieza = [
	1=>['tipo' => 'ayudin', 
	'marca'=>'Sapolio',
	'id_seguro'=>1,],
	];
	
	$categoria= $_REQUEST['categoria']; 
	$item = $_REQUEST['id_item'];
	
	if('PUT' == strtoupper($_SERVER['REQUEST_METHOD']))
	{
		$json = file_get_contents('php://input');
		if($categoria == 'cocina'){
			 if(!empty($item) && array_key_exists($item,$cocinas)){
				$cocinas[$item]=json_decode($json,true);
				echo json_encode($cocinas);
			}
			else{
				echo json_encode($cocinas);
			}
		}
		elseif($categoria == 'limpieza'){
			if(!empty($item) && array_key_exists($item,$limpieza)){
				$limpieza[$item]=json_decode($json,true);
				echo json_encode($limpieza);
			}
			else{
				echo json_encode($limpieza);
			}
		}
		elseif($categoria == 'taller'){
			if(!empty($item) && array_key_exists($item,$taller)){
				$taller[$item]=json_decode($json,true);
				echo json_encode($taller);
			}
			else{
				echo json_encode($taller);
			}
		}
				
	}
	
?>