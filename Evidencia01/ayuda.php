<?php
    
	function insertar($id, $token, $act, $enlace)
	{		
		$sql = "INSERT INTO usuarios(usuario_id, token, act, created) VALUES ($id, '$token', $act, NOW())";
		if($enlace->query($sql) == false)
		{
			echo 'error'.$sql . "<br>" . $enlace->error;
		}
		
	}
	
	function actualizarToken($id, $token, $act, $enlace)
	{		
		$sql = "UPDATE usuarios SET token = '$token', act = $act, created = NOW() where usuario_id = $id";
		if($enlace->query($sql) == false)
		{
			echo 'error'.$sql . "<br>" . $enlace->error;
		}
	}
	
	function actualizarAct($id,$act,$enlace)
	{
		$sql = "UPDATE usuarios SET act = '$act' where usuario_id = $id";
		if($enlace->query($sql) == false)
		{
			echo 'error'.$sql . "<br>" . $enlace->error;
		}
	}
	
	function comparaToken($id,$token,$enlace)
	{
		$sql = "SELECT token FROM usuarios WHERE usuario_id = $id";
		$result = $enlace->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$aux =  $row["token"];
				//echo "bd: " . $row["created"].PHP_EOL;
			}
			if($token == $aux)
			{
				return true;
			}
			else
			{
				return false;
			}
			
		}

		else {
			echo "0 results";
			return false;
		}
		
		
	}
	
	function comparaTiempo($id, $enlace)
	{
		$sql = "SELECT created FROM usuarios WHERE usuario_id = $id";
		$result = $enlace->query($sql);
		
		$aux;
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$aux =  $row["created"];
				//echo "bd: " . $row["created"].PHP_EOL;
			}
		} else {
			echo "0 results";
		}
		
		
		date_default_timezone_set('America/Lima');
		$timestamp = date('Y-m-d H:i:s');
		
		$bd = strtotime($aux);
		$newtimestamp = strtotime( $timestamp.'- 2 minute');
		
		//echo date('Y-m-d H:i:s', $newtimestamp);
		
		
		if($bd >= $newtimestamp)
		{
			//echo 'se logro'.PHP_EOL;
			return true;
		}	
		else
		{
			actualizarAct($id, false, $enlace);
			return false;
		}
	}
	
	

?>