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
	$email = inputCtrol($_POST['email']);
	$password1 = inputCtrol($_POST['password']);
	$id = inputCtrol($_POST['id']);
}

$db = Database::connect();
$incrire = $db -> prepare("UPDATE inscription SET Nom = ?, Prenom = ?, Email = ?, Password = ? WHERE id = ?");
$incrire -> execute(array($nom,$prenom,$email,$password1,$id));
header("location:../detail.php");

?>