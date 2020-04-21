<?php
$filecontents = file_get_contents('palabras.txt');

$words = preg_split('/[\s]+/', $filecontents, -1, PREG_SPLIT_NO_EMPTY); // cargar palabras en array

$fichero = 'final.txt';
$u_original = 'https://linguatools-conjugations.p.rapidapi.com/conjugate/?verb=';

foreach($words as $word)
{
	file_put_contents($fichero, $word.'***'.PHP_EOL , FILE_APPEND); // ingresa palabra al final fichero
	echo $word.'***'.PHP_EOL;
	$curl = curl_init();

	curl_setopt_array($curl, array(
	CURLOPT_URL => $u_original.$word, // url + verbo
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST =>'GET',
	CURLOPT_HTTPHEADER => array(
		'x-rapidapi-host: linguatools-conjugations.p.rapidapi.com', 
		'x-rapidapi-key: e3b25c2e35msh44a1983ad44e240p13de01jsn025cba401e8a' //cambiar key
	),
	));

	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo 'cURL Error #:' . $err;
	} else {
		echo $response.PHP_EOL;
	}
	
	file_put_contents($fichero, $response.PHP_EOL, FILE_APPEND); //ingresa respuesta en fichero
}
