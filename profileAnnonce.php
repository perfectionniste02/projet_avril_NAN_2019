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

  

<!-- navbar2 -->
<div class="container-fuid p-5 text-center mb-5  secondary-color-dark">
  <h3 style="color:white"><b>Bienvenue sur le profile de <?php echo $voir['prenom'].' '.$voir['nom']?></b></h3>
</div>

<div class="container mb-5">
  <div class="row mb-5">
    <!--Grid column-->
      <div class="col-lg-12 col-md-12 mb-4 z-depth-5 border border-secondary animated bounceInLeft">
            <div class="row no-gutters position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
              <img class="w-100 flip animated delay-1s" src="uploads/<?= $voir['image']?>">
            </div>
            <div class="col-md-6 pl-md-0 mt-5">
              <h5 class="mt-0"><?php echo "<b>NOM ET PRENOM</b>     : ".$voir['prenom'].' '.$voir['nom']?></h5><br>
              <h5 class="mt-0"><?php echo "<b>FONCTION</b>          : " .$voir['fonction'] ?></h5><br>
              <h5 class="mt-0"><?php echo "<b>VILLE ACTUELLE</b>    : ".$voir['ville'] ?></h5><br>
              <h5 class="mt-0"><?php echo "<b>COMMUNE</b>           : ".$voir['commune'] ?></h5><br>
              <h5 class="mt-0"><?php echo "<b>LIEU DE RESIDENCE</b> : ".$voir['quartier'] ?></h5><br>
              <h5 class="mt-0"><?php echo "<b>NOMERO DE TELEPHONE</b> : ".$voir['numero'] ?></h5><br>
              <h5 class="mt-0"><?php echo "<b>ADRESSE MAIL</b> : ".$voir['email'] ?></h5>
              <p class="mt-3"><b><h5>EXPERIENCE</h5></b><?php echo $voir['exp'] ?>.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mt-5">
              <a href="produit.php#voir"class="btn btn-outline-default" style="border-radius: 50px;"><i class="fa fa-arrow-alt-circle-left fa-lg" aria-hidden="true"> Retour</i></a>
            </div>

            <div class="col-md-6 mb-4 mt-5">
              <a href="#"class="btn btn-outline-default" style="border-radius: 50px;" data-toggle="modal" data-target="#sideModalTR">Envoyer un message <i class="fas fa-envelope-open-text fa-lg" aria-hidden="true"></i></a>
            </div>
            
          </div>

      </div>
     <!--Grid column-->

     <!-- To change the direction of the modal animation change .right class -->
<div class="modal fade bottom" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-bottom-right" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100 text-center text-secondary" id="myModalLabel"><strong><small><?php echo "Envoyer un mail à ".$voir['nom'] ?></small></strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form class="form-controls"method="post" action="#">
                <div class="md-form form-sm text-center">
                  <label  for="modalLRInput12" class="text-secondary mb-5 ml-5">Message...</label>
                <textarea type="text" id="modalLRInput12" class="form-control form-control-sm  p-2" name="email" required></textarea>
              </div>

                <div class="mt-3 ml-2 mb-2">
                   <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="border-radius: 50px;">fermer</button>
                    <input type="submit" class="btn btn-outline-success" value="Envoyer" style="border-radius: 50px;"><i class="fas fa-sign-in ml-1"></i></input>
                </div>
          </form>
      </div> 
    </div>
  </div>
</div>
<!-- Side Modal Top Right -->
    
  </div>
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

