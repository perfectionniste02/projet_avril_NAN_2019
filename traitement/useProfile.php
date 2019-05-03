<?php
session_start();

require "database.php";

function inputCtrol($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);

	return $data;
}




if ($_FILES) 
{
	$id = $_SESSION['id'];
	$image = inputCtrol($_FILES['image']['name']);
	$imageFile = $_FILES['image']['tmp_name'];	
	$imagePath = '../uphotoBD/'. basename($image);

	if (move_uploaded_file($imageFile, $imagePath))
	{

		$db = Database::connect();
	    $incrire = $db -> prepare("UPDATE inscription SET image = ? WHERE id = ?");
        $incrire -> execute(array($image,$_SESSION['id']));
        header("location:../produit.php");
	}
	header("location:../produit.php");

} 



?>