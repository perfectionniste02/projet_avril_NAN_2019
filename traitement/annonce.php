<?php 

	session_start();
	function inputCtrol($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}

	$nom = inputCtrol($_POST['nom']);
	$prenom = inputCtrol($_POST['prenom']);
	$fonction = inputCtrol($_POST['fonction']);
	$ville = inputCtrol($_POST['ville']);
	$commune = inputCtrol($_POST['commune']);
	$quartier = inputCtrol($_POST['quartier']);
	$tel = inputCtrol($_POST['tel']);
	$email = inputCtrol($_POST['email']);
	$ville = inputCtrol($_POST['ville']);
	$experiance = inputCtrol($_POST['experiance']);



	$imageName = inputCtrol($_FILES['image']['name']);
	$imageFile = $_FILES['image']['tmp_name'];
	
	$imagePath = 'uploads/'. basename($imageName);


	if (move_uploaded_file($imageFile, $imagePath)) {
		$db = Database::connect();
		$incrire = $db -> prepare("INSERT INTO `poste`(`nom`, `prenom`, `fonction`, `ville`, `commune`, `quartier`, `exp`, `numero`, `email` , `image`,`id_post`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$incrire->execute(array($nom,$prenom,$fonction,$ville,$commune,$quartier,$experiance,$tel,$email,$imageName,$_SESSION['id']));
	} 







?>

