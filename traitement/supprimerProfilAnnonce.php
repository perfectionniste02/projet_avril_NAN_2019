<?php 
require 'database.php';
if (isset($_GET)) 
{
	$id = $_GET['id'];
	$db = Database::connect();
	$delete = $db -> prepare('DELETE FROM poste WHERE id = ?');
	$delete -> execute(array($id));
	header('location:../produit.php');
}

?>