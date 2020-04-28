<?php
    
	include 'ayuda.php';
	include 'productos.php';

	
	$enlace = mysqli_connect("127.0.0.1:3306", "maria", "12345678", "tds");
	if (!$enlace) {
		die('No pudo conectarse: ' . mysql_error());
	}
	
	
	// loggin + insertar
	if('POST' == strtoupper($_SERVER['REQUEST_METHOD'])) 
	{
		$funcion= $_REQUEST['funcion'];

		$json = file_get_contents('php://input');
		
		// loggin
		if($funcion == 'loggin')
		{
			$respuesta =json_decode($json,true);
		
			$pswd = '12345';
			
			if($respuesta['password'] == '12345' & $respuesta['usuario']== 1)
			{
				$token = password_hash($pswd, PASSWORD_DEFAULT);
				echo 'wellcome'.PHP_EOL. 'your token is: '.$token;
				actualizarToken(1, $token, true, $enlace);
			}
		}
		
		// insertar
		
		elseif($funcion = 'insertar')
		{
			$token = $_REQUEST['token'];
			if(comparaToken(1,$token,$enlace) & comparaTiempo(1, $enlace) == true)
			{
				$categoria = $_REQUEST['categoria'];
				$tipoProducto = $_REQUEST['tipo'];
				
				if($categoria == 'cocina')
				{
					if($tipoProducto == 'cocinas')
					{
						$productos[0][0][] = json_decode($json,true);
						echo json_encode($productos[0][0]);
						
					}
					elseif($categorias = 'refrigeradores')
					{
						$productos[0][1][] = json_decode($json,true);
						echo json_encode($productos[0][1]);
					}
				}
				elseif($categoria == 'taller')
				{
					if($tipoProducto == 'taladros')
					{
						$productos[1][0][] = json_decode($json,true);
						echo json_encode($productos[1][0]);
						
					}
					elseif($categorias = 'serruchos')
					{
						$productos[1][1][] = json_decode($json,true);
						echo json_encode($productos[1][1]);
					}
				}
				elseif($categoria == 'limpieza')
				{
					if($tipoProducto == 'jabones')
					{
						$productos[2][0][] = json_decode($json,true);
						echo json_encode($productos[2][0]);
						
					}
					elseif($categorias = 'esponjas')
					{
						$productos[2][1][] = json_decode($json,true);
						echo json_encode($productos[2][1]);
					}
				}
			}
			
			else
			{
				echo 'datos incorrectos. Intente de nuevo';
			}
			
		}
				
	}
	
	// get todos los productos, segun categoria y tipo de porducto
	if('GET' == strtoupper($_SERVER['REQUEST_METHOD']))
	{
		$token = $_REQUEST['token'];
		
		if(comparaToken(1,$token,$enlace) & comparaTiempo(1, $enlace) == true)
		{
			echo 'autenticado'.PHP_EOL;
			$categorias = $_REQUEST['categorias'];
			
			if($categorias == 'todos')
			{
				echo json_encode($productos); // muestra todos los productos
			}
			elseif($categorias == 'cocina')
			{
				$tipos = $_REQUEST['productos'];
				
				if($tipos == 'todos')
				{
					echo json_encode($productos[0]); // muestra todos los productos en cocina
				}
				
				elseif($tipos == 'cocinas')
				{
					echo json_encode($productos[0][0]); // muestra las cocinas
				}
				elseif($tipos == 'refrigeradores')
				{
					echo json_encode($productos[0][1]); // muestra los refrigeradores
				}
				
			}
			
			elseif($categorias == 'taller')
			{
				$tipos = $_REQUEST['productos'];
				
				if($tipos == 'todos')
				{
					echo json_encode($productos[1]); // muestra todos los productos en taller
				}
				
				elseif($tipos == 'taladros')
				{
					echo json_encode($productos[1][0]); // muestra los taladros
				}
				elseif($tipos == 'serruchos')
				{
					echo json_encode($productos[1][1]); // muestra los serruchos
				}
				
			}
			elseif($categorias == 'limpieza')
			{
				$tipos = $_REQUEST['productos'];
				
				if($tipos == 'todos')
				{
					echo json_encode($productos[2]);
				}
				
				elseif($tipos == 'jabones')
				{
					echo json_encode($productos[2][0]);
				}
				elseif($tipos == 'esponjas')
				{
					echo json_encode($productos[2][1]);
				}
				
			}
		}
		else
		{
			echo 'datos incorrectos. Intente de nuevo';
		}
	}
	
	if('PUT' == strtoupper($_SERVER['REQUEST_METHOD']))
	{
		$token = $_REQUEST['token'];
		if(comparaToken(1,$token,$enlace) & comparaTiempo(1, $enlace) == true)
		{
			$json = file_get_contents('php://input');
			
			$categoria = $_REQUEST['categoria'];
			$tipoProducto = $_REQUEST['tipo'];
			$item = $_REQUEST['item'];
			
			if($categoria == 'cocina')
			{
				if($tipoProducto == 'cocinas')
				{
					$productos[0][0][$item] = json_decode($json,true);
					echo json_encode($productos[0][0]);
					
				}
				elseif($categorias = 'refrigeradores')
				{
					$productos[0][1][$item] = json_decode($json,true);
					echo json_encode($productos[0][1]);
				}
			}
			
			elseif($categoria == 'taller')
			{
				if($tipoProducto == 'taladros')
				{
					$productos[1][0][$item] = json_decode($json,true);
					echo json_encode($productos[1][0]);
					
				}
				elseif($categorias = 'serruchos')
				{
					$productos[1][1][$item] = json_decode($json,true);
					echo json_encode($productos[1][1]);
				}
			}
			elseif($categoria == 'limpieza')
			{
				if($tipoProducto == 'jabones')
				{
					$productos[2][0][$item] = json_decode($json,true);
					echo json_encode($productos[2][0]);
					
				}
				elseif($categorias = 'esponjas')
				{
					$productos[2][1][$item] = json_decode($json,true);
					echo json_encode($productos[2][1]);
				}
			}
		}
		else
		{
			echo 'datos incorrectos. Intente de nuevo';
		}
		
	}
	if('DELETE' == strtoupper($_SERVER['REQUEST_METHOD']))
	{
		$token = $_REQUEST['token'];
		if(comparaToken(1,$token,$enlace) & comparaTiempo(1, $enlace) == true)
		{
			$json = file_get_contents('php://input');
			
			$categoria = $_REQUEST['categoria'];
			$tipoProducto = $_REQUEST['tipo'];
			$item = $_REQUEST['item'];
			
			if($categoria == 'cocina')
			{
				if($tipoProducto == 'cocinas')
				{
					unset($productos[0][0][$item]);
					echo json_encode($productos[0][0]);
					
				}
				elseif($categorias = 'refrigeradores')
				{
					unset($productos[0][1][$item]);
					echo json_encode($productos[0][1]);
				}
			}
			
			elseif($categoria == 'taller')
			{
				if($tipoProducto == 'taladros')
				{
					unset($productos[1][0][$item]);
					echo json_encode($productos[1][0]);
					
				}
				elseif($categorias = 'serruchos')
				{
					unset($productos[1][1][$item]);
					echo json_encode($productos[1][1]);
				}
			}
			elseif($categoria == 'limpieza')
			{
				if($tipoProducto == 'jabones')
				{
					unset($productos[2][0][$item]);
					echo json_encode($productos[2][0]);
					
				}
				elseif($categorias = 'esponjas')
				{
					unset($productos[2][1][$item]);
					echo json_encode($productos[2][1]);
				}
			}
		}
		else
		{
			echo 'datos incorrectos. Intente de nuevo';
		}
		
	}

	
	mysqli_close($enlace);
	
	
	
?>