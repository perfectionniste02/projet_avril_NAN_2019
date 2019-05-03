<?php 
require "database.php";

if ($_POST) 
{
	$nom = inputCtrol($_POST['nom']);
	$prenom = inputCtrol($_POST['prenom']);
	$email = inputCtrol($_POST['email']);
	$password1 = inputCtrol($_POST['password1']);
	$password2 = inputCtrol($_POST['password2']);
}

$db = Database::connect();
$incrire = $db -> prepare("INSERT INTO `inscription`(`Nom`, `Prenom`, `Email`, `Password`) VALUES (?,?,?,?)");
$incrire -> execute(array($nom,$prenom,$email,$password1));
header("location:../index.php");

function inputCtrol($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);

	return $data;
}
?>