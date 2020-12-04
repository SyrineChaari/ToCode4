<?php
$var=$_GET['id'];
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,"http://localhost/mywebservice/to_code_4/RWS1.PHP?id=".$var);

curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$response=curl_exec($curl);
$data=json_decode($response);
echo $response;



?>