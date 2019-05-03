<?php 
require 'traitement/database.php';
session_start();
if (!(isset($_SESSION['id']))) 
{
 header('location:index.php');
}
else
{

$db = Database::connect();
$user = $db -> prepare('SELECT * FROM inscription WHERE id = ?');
$user -> execute(array($_SESSION['id']));
$afficher = $user -> fetch();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Detail produit</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/detail.css" rel="stylesheet">
</head>

<body>

  <!-- Start your project here-->
    <!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark secondary-color lighten-1">
  <a class="navbar-brand" href="#">NANconstruc</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ANNONCE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">SHOPPING</a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo $afficher['Nom']?></a>
      </li>
      <li class="nav-item avatar dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0"
            alt="avatar image" style="width: 30px">
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-secondary"
          aria-labelledby="navbarDropdownMenuLink-55">
          <a class="dropdown-item" href="#">Aouter une photo</a>
          <a class="dropdown-item" href="#">voir son profile</a>
          <a class="dropdown-item" href="#">Deconnexion</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->

<!-- navbar2 -->
<div class="container-fuid p-5 text-center" style="background:#a5a5a5;">
  <h1>nom du produit </h1>
</div>

<div class="container">
  <div class="row">
    
  </div>
</div>

<!-- essai -->
 
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Liste des items   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>premon</th>
                      <th>email</th>
                      <th>password</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                      $view = $db -> query("SELECT * FROM inscription");
                      while ($voir = $view -> fetch()){
                        
                   ?>
                             <tr>
                             <td><?php echo $voir['Nom']?></td>
                             <td><?php echo $voir['Prenom']?></td>
                             <td><?php echo $voir['Email']?></td>
                             <td><?php echo $voir['Password']?></td>
                             <td width=400>
                             <a class="btn btn-default" href="voir.php?id=<?php echo $voir['id']?>"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>
                            <a class="btn btn-primary" href="moddif.php?id=<?php echo $voir['id']?>"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>
                            <a class="btn btn-danger" href="traitement/delete.php?id=<?php echo $voir['id']?>"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>
                            </td>
                            </tr>
                       <?php  } ?>

                  </tbody>
                </table>
                <div>
                  <a href="traitement/deconnection.php" class="btn btn-danger">deconnection</a>
                </div>
            </div>
        </div>
    </body>
</html>


  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
<?php } ?>
