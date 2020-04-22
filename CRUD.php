
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
	
	
	if(!array_key_exists('HTTP_X_HASH',$_SERVER)||
	!array_key_exists('HTTP_X_TIMESTAMP',$_SERVER)||
	!array_key_exists('HTTP_X_UID',$_SERVER)){
		die;
	}

	list($hash,$uid,$timestamp)=[
	$_SERVER['HTTP_X_HASH'],
	$_SERVER['HTTP_X_UID'],
	$_SERVER['HTTP_X_TIMESTAMP']
	];

	$pwd='my password';

	$newHash = sha1($uid.$timestamp.$pwd);

	if($newHash !== $hash){
		echo "too late";
		die;
	}
	else{
		echo "welcome".PHP_EOL;
		
		if('GET' == strtoupper($_SERVER['REQUEST_METHOD']))
		{
			$tipoProducto= $_REQUEST['tipos_productos'];
			if(isset($tipoProducto))
			{
				if($tipoProducto == 'cocina')
				{
					echo json_encode($cocinas);
				}
				elseif($tipoProducto == 'taller')
				{
					echo json_encode($taller);
				}
				elseif($tipoProducto == 'limpieza')
				{
					echo json_encode($limpieza);
				}
			}
		}
		if('POST' == strtoupper($_SERVER['REQUEST_METHOD']))
		{
			$categoria= $_REQUEST['categoria']; 
			
			$json = file_get_contents('php://input');
			if($categoria == 'cocina'){
				$cocinas[]=json_decode($json,true);
				echo json_encode($cocinas);
			}
			elseif($categoria == 'limpieza'){
				$limpieza[]=json_decode($json,true);
				echo json_encode($limpieza);
			}
			elseif($categoria == 'taller'){
				$taller[]=json_decode($json,true);
				echo json_encode($taller);
			}
					
		}
		
		if('PUT' == strtoupper($_SERVER['REQUEST_METHOD']))
		{
			$categoria= $_REQUEST['categoria']; 
			$item = $_REQUEST['item'];
			
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
		
			
		if('DELETE' == strtoupper($_SERVER['REQUEST_METHOD']))
		{
			$categoria= $_REQUEST['categoria']; 
			$item = $_REQUEST['item'];
			
			$json = file_get_contents('php://input');
			if($categoria == 'cocina'){
				 if(!empty($item) && array_key_exists($item,$cocinas)){
					unset($cocinas[$item]);
					echo json_encode($cocinas);
				}
				else{
					echo json_encode($cocinas);
				}
			}
			elseif($categoria == 'limpieza'){
				if(!empty($item) && array_key_exists($item,$limpieza)){
					unset($limpieza[$item]);
					echo json_encode($limpieza);
				}
				else{
					echo json_encode($limpieza);
				}
			}
			elseif($categoria == 'taller'){
				if(!empty($item) && array_key_exists($item,$taller)){
					unset($taller[$item]);
					echo json_encode($taller);
				}
				else{
					echo json_encode($taller);
				}
			}
					
		}
			
	
	}

	
	
	
	
	
	
?>