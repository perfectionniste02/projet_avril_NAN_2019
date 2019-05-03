<?php 
require 'traitement/database.php';
if (isset($_GET)) 
{
  $id = $_GET['id'];
  $db = Database::connect();
  $select = $db -> prepare('SELECT * FROM poste WHERE id = ?');
  $select -> execute(array($id));
  $voir = $select -> fetch();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Profile</title>
  <link rel="icon" type="text/image" href="image/white-male-1834102_1280.jpg">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/detail.cs" rel="stylesheet">
</head>

<body>

<div class="container-fuid p-5 text-center mb-5  secondary-color-dark">
    <h3 class="text-white bounceIn animated delay-2s">Modifier l'annonce</h3>
</div>
  
<div class="container w-25 p-5 border border-secondary hoverable animated bounceInDown  slower delay-0.3s" style="border-radius: 50px;">
<form method="post" action="traitement/modifAnnonce.php" enctype="multipart/form-data">


              <div class="text-center form-sm mb-4">
                <a href="produit.php" class="btn btn-outline-secondary text-white" style="border-radius: 50px"; value="Modifier"><i class="fas fa-sign-in ml-1"></i>Retour</a>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="nom" value="<?php echo $voir['nom'] ?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Nom</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="prenom"  value="<?php echo $voir['prenom'] ?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Prenom</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="fonction"  value="<?php echo $voir['fonction'] ?>" >
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Fonction</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="ville"  value="<?php echo $voir['ville'] ?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Ville</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="commune" value="<?php echo $voir['commune'] ?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Commune</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="quartier" value="<?php echo $voir['quartier'] ?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Quartier</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="tel"  value="<?php echo $voir['numero'] ?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Numero Téléphonique</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="email" id="modalLRInput12" class="form-control form-control-sm validate" name="email"  value="<?php echo $voir['email'] ?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Email</label>
              </div>

              <div class="md-form form-sm mb-5">
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="id"  value="<?php echo $voir['id'] ?>" hidden>
              </div>


              <div class="md-form form-sm mb-5">
                <textarea type="text" id="modalLRInput12" class="form-control form-control-sm validate p-2 ml-4" name="experiance"><?php echo $voir['exp'] ?></textarea>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="mb-5 text-default">Expérience</label>
              </div>

               <div class="md-form form-sm mb-5">
                <h5 class="text-default">image : <small class="text-dark"><?php echo $voir['image']?></small></h5>
                <input type="file" id="modalLRInput12" name="image"  class="text-default">
              </div>

              <div class="text-center form-sm mt-2">
                <input type="submit" class="btn btn-outline-secondary text-white" style="border-radius: 50px"; value="Modifier"><i class="fas fa-sign-in ml-1"></i></input>
              </div>
          </from>
        </div>


 <?php include "footer.php" ?>

<!-- Footer -->
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

