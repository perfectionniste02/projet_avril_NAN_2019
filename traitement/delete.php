<?php 
require 'database.php';
if (isset($_GET)) 
{
	$id = $_GET['id'];
	$db = Database::connect();
	$delete = $db -> prepare('DELETE FROM inscription WHERE id = ?');
	$delete -> execute(array($id));
	header('location:../detail.php');
}

?>