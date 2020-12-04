<?php
  $url = 'http://localhost/mywebservice/to_code_4/RWS1/personne.php';
  $id = $_POST["id"];
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  
	$data = array('id' => $id, 'nom' => $nom, 'prenom' => $prenom);

	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { /* Handle error */ }

	var_dump($result);
?>