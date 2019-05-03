<?php 
session_start();

require 'traitement/database.php';
if ($_POST) {
  require 'traitement/annonce.php';
}

if (!(isset($_SESSION['id']))) 
{
 header('location:index.php');
}
else
{
// table inscription
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
  <title>produit</title>
  <link rel="icon" type="text/image" href="image/white-male-1834102_1280.jpg">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/produit.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
</head>

<body>

<header>
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar teal accent-3">
            <div class="container">
                <strong class="navbar-brand z-depth-3 p-2 animated flash  slower delay-4s secondary-color-dark" style="font-family:'Holtwood OneSC'">NANconstruct</strong>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="mr-auto">
                </ul>
                <div class="mr-4">
                     <a href="index.php" style="color:white; font-size: 1.2em;">Accueil</a>
                  </div>

                   <div class="mr-4">
                     <a style="color:white; font-size: 1.2em;" data-toggle="modal" data-target="#fullHeightModalRight">Plublier une Annonce</a>
                  </div>
                    <?php   
                      // table userOrofile
                      $photo = $db -> query("SELECT * FROM user_profile");
                      $montrer = $photo -> fetch();
                     ?>

                  <div class="mr-5">
                     <a href="#" style="color:white; font-size: 1.2em;">Contacter-nous</a>
                  </div>

                    </ul>
                      <ul class="navbar-nav  nav-flex-icons">
                        <li class="nav-item">
                          <strong>
                            <h5 class="nav-link text-secondary"><?php echo $afficher['Nom']."  ".$afficher['Prenom']?></h5>
                          </strong>
                        </li>
                        <li class="nav-item avatar dropdown">
                          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="uphotoBD/<?= $afficher['image']?>"  class="rounded-circle z-depth-0"
                              alt="avatar image" style="width: 30px">
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-secondary"
                            aria-labelledby="navbarDropdownMenuLink-55">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#sideModalTR">Ajouter une photo</a>
                            <a class="dropdown-item" href="voir.php?id=<?php echo $afficher['id']?>" >voir son profile</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ligne">personne en ligne</a>
                            <a class="dropdown-item" href="traitement/deconnection.php">Deconnexion</a>
                          </div>
                        </li>
                    </ul>
              </div>
            </div>
          </nav>
  </header>
<!-- Navbar -->
  <!-- Side Modal Top Right -->

  <!-- modal persone en ligne -->
 <!-- Full Height Modal Right-->
<div class="modal fade left" id="ligne" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-right" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100 text-center teal accent-3 text-white" id="myModalLabel">Personne en ligne </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- contenu -->
          <?php 
          $user = $db -> query('SELECT * FROM inscription');

          while ($afficher = $user -> fetch()) {
            
          ?>
          <div class="row mb-5">
            <div class="col-md-4">
              <img src="uphotoBD/<?= $afficher['image']?>"  class="rounded-circle p-0 m-0"
               alt="avatar image" style="width: 40px">
            </div>

            <div class="col-md-6 position-absolute ml-5 mb-5">
              <h5 class="nav-link text-secondary position-relative ml-1"><strong><?php echo $afficher['Nom']."  ".$afficher['Prenom']?></strong></h5>
            </div>
        </div>
      <?php } ?>
         
      </div>
      <div class="modal-footer justify-content-center">
        
      </div>
    </div>
  </div>
</div>
<!-- Full Height Modal left -->
<!-- modal persone en ligne -->

<!-- To change the direction of the modal animation change .right class -->
<div class="modal fade top" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-top-right" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100 text-center secondary-color-dark text-white" id="myModalLabel">Télécharger une image</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <form class="form-controls" method="post" action="traitement/useProfile.php" enctype="multipart/form-data">
                <div class="mt-4 ml-2">
                  <input type="file"  name="image" class="text-success">
                </div>
                <div class="mt-3 ml-2 mb-2">
                   <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="border-radius: 50px;">fermer</button>
                    <input type="submit" class="btn btn-outline teal accent-3 text-white" value="Enregistrer" style="border-radius: 50px;"></i></input>
                </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- Side Modal Top Right -->



<!-- moddal Annonce(left) -->

<!-- Full Height Modal Right-->
<div class="modal fade bottom" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-left" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100 text-center teal accent-3 text-white" id="myModalLabel">Poster une annonce </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div>
          <form method="post" action="" rol="form" enctype="multipart/form-data">
              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix text-secondary"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="nom" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-secondary">Nom</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix text-secondary"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="prenom" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-secondary">Prenom</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-briefcase prefix text-secondary"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="fonction" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-secondary">Fonction</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-city prefix text-secondary"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="ville" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-secondary">Ville</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-city prefix text-secondary"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="commune" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-secondary">Commune</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-city prefix text-secondary"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="quartier" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-secondary">Quartier</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-mobile-alt prefix text-secondary"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="tel" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-secondary">Numero Téléphonique</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-envelope prefix text-secondary"></i>
                <input type="email" id="modalLRInput12" class="form-control form-control-sm validate" name="email" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-secondary">Email</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix text-secondary"></i>
                <textarea type="text" id="modalLRInput12" class="form-control form-control-sm validate p-2 ml-4" name="experiance" required></textarea>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="mb-5 text-secondary">Commentaire</label>
              </div>

               <div class="md-form form-sm mb-5">
                <i class="fas fa-file-alt prefix text-secondary"></i>

                <input type="file" id="modalLRInput12" name="image" class="text-secondary" required>
              </div>

              <div class="text-center form-sm mt-2">
                <button type="button" class="btn btn-outline-secondary mr-5" data-dismiss="modal" style="border-radius: 50px;">Annuler</button>
                <input type="submit" class="btn  teal accent-3 text-white " value="Publier" style="border-radius: 50px;"><i class="fas fa-sign-in ml-1"></i></input>
              </div>
          </from>
  </div>
      </div>
      <div class="modal-footer justify-content-center">
        
      </div>
    </div>
  </div>
</div>
<!-- Full Height Modal left -->

<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade ml-5" data-ride="carousel" style="margin-top: 6%;">

  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div>
        <img class="d-block w-25" src="image/white-male-1834102_1280.jpg">
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div>
        <img class="d-block w-25" src="image/bear-1015586_1280.jpg"
          alt="Second slide">
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div>
        <img class="d-block w-25" src="image/fax-1904631__340.jpg"
          alt="Third slide">
      </div>

    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

                   <!--Section: architeque-->
                  <section class="text-center mt-5" id="voir">

                      <!--Section heading-->
                      <h4 class="text-secondary mb-5 mt-5 px-3 text-center w-75 ml-auto mr-auto mt-5 pt-4" style="font-size: 1.3em; font-style: italic;">Ici  vous pouvez voir differents profiles notamment celui d'un architèques , maçons ou encore d'un jeunes manawa (aide maiçon)... Chacun specialiste dans leurs domaine d'activités. A travers leurs profiles vous pouvez savoir qui sont ceux avec qui vous ête dans la même zone  ainsi le choix vous revient selon vos attentes de les contactés.</h4>
                      <!--Section description-->

                      <div class="row mr-5 ml-5">
                        <?php 

                          // table post
                          $post = $db -> query('SELECT * FROM poste ORDER BY id DESC');
                          while ($voir = $post -> fetch()) {
                       ?>
  
                          <!--Grid column-->
                          <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
                               <!-- Card -->
                              <div class="card hoverable">
                                <!-- Card image -->
                                <img class="card-img-top" src="uploads/<?= $voir['image']?>" style="height: 40vh">
                                <!-- Card content -->
                                <div class="card-body">

                                  <!-- Title -->
                                  <h4 class="card-title"><?php echo $voir['nom'] ?></h4>
                                  <h4 class="card-title"><?php echo $voir['fonction'] ?></h4>
                                  <!-- Text -->
                                  <p class="card-text"><?php echo $voir['exp'] ?></p>
                                  <!-- Button -->
                                  <?php if ($voir['id_post'] == $_SESSION['id']){
                                    
                                   ?>
                                  <a href="profileAnnonce.php?id=<?php echo $voir['id'] ?>"class="btn btn-outline-blue" style="border-radius: 50px;">Details <i class="fas fa-user-circle fa-lg" aria-hidden="true"></i></a>
                                  <a href="pageModifAnnonce.php?id=<?php echo $voir['id'] ?>"class="btn btn-outline-success" style="border-radius: 50px;">Modifier <i class="fas fa-user-edit fa-lg" aria-hidden="true"></i></a>
                                  <a href="traitement/supprimerProfilAnnonce.php?id=<?php echo $voir['id'] ?>" class="btn btn-outline-danger"  style="border-radius: 50px;">suprimer <i class="fas fa-user fa-lg" aria-hidden="true"></i></a>
                                  <?php } ?>

                                   <?php if (!($voir['id_post'] == $_SESSION['id'])){
                                    
                                   ?>
                                  <a href="profileAnnonce.php?id=<?php echo $voir['id'] ?>"class="btn btn-outline-blue" style="border-radius: 50px;">Details <i class="fas fa-user-circle fa-lg" aria-hidden="true"></i></a>
                                  <?php } ?>



                                </div>

                              </div>
                              <!-- Card -->
                          </div>
                          <!--Grid column-->

                          <?php } ?>
                     </div>

        <?php include "footer.php"?>   

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
