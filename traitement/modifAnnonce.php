<?php 
require "database.php";
function inputCtrol($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);

	return $data;
}
if ($_POST) 
{
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
	$id = inputCtrol($_POST['id']);



}
$imageName = inputCtrol($_FILES['image']['name']);
	$imageFile = $_FILES['image']['tmp_name'];
	$imagePath = '../uploads/'. basename($imageName);
		$imageStatus=move_uploaded_file($imageFile, $imagePath);
				
	if ($imageStatus) {
			
$db = Database::connect();
$incrire = $db -> prepare("UPDATE poste Set nom = ?, prenom = ?, fonction = ?, ville = ?, commune = ?, quartier = ?, exp = ?, numero = ?, email = ? , image = ? WHERE id =?");
$incrire -> execute(array($nom,$prenom,$fonction,$ville,$commune,$quartier,$experiance,$tel,$email,$imageName,$id));
		header("location:../produit.php");
}

?>

