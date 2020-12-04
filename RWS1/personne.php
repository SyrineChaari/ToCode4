<?php
	
	include("db.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getPersonnes()
	{
		global $conn;
		$query = "SELECT * FROM `personne`";
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function getPersonne($id=0)
	{   
		global $conn;
	
		if(id != 0)
		{
			$query="SELECT * FROM `personne` WHERE id=$id";
		}
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function AddPersonne()
	{
		global $conn;
		$id = $_POST["id"];
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		
	
		echo $query="INSERT INTO personne VALUES(".$id.", '".$nom."','".$prenom."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'personne ajouté avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	
	switch($request_method)
	{
		
		case 'GET':
			if(!empty($_GET["id"]))
			{
				$id=$_GET['id'];
				getPersonne($id);
			}
			else
			{
                getPersonnes();
            }
			
			break;
		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			AddPersonne();
			break;
			

	}
?>