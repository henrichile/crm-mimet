<?php
$post = [
    'sede' => 'Vitacura',
    ];
    $ch = curl_init('https://portal.autoescuelahuelen.cl/listado_productos.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    
if(curl_exec($ch) === false)
{
    echo 'Curl error: ' . curl_error($ch);
}
else
{
  $response = curl_exec($ch);
}
    curl_close($ch);
var_dump($response);
?>