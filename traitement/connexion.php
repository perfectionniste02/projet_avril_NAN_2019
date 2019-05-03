<?php 
	session_start();
	function verifyInput($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

require 'database.php';
if (isset($_POST)) 
{
	$email = verifyInput($_POST['email']);
	$password = verifyInput($_POST['password']);
}

$db = database::connect();
$select = $db -> prepare('SELECT * FROM inscription WHERE email = ? AND password = ?');
$select -> execute(array($email , $password));

if($afficher = $select -> fetch())
{

	$_SESSION['id'] = $afficher['id'];
	
	header('location:../produit.php');
}
else
{
	header('location:../index.php');
}



?>