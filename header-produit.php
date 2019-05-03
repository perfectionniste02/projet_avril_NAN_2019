<?php 
require 'traitement/database.php';
session_start();
if (!(isset($_SESSION['id']))) 
{
    $db = Database::connect();
    $user = $db -> prepare('SELECT * FROM inscription WHERE id = ?');
    $user -> execute(array($_SESSION['id']));
    $afficher = $user -> fetch();
}
?>

 <header>
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar teal accent-3">
            <div class="container">
                <strong class="navbar-brand">NANconstruct</strong>
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
                     <a href="produit.php" style="color:white; font-size: 1.2em;">Main d'oeuvre</a>
                  </div>

                   <div class="mr-4">
                     <a style="color:white; font-size: 1.2em;" data-toggle="modal" data-target="#fullHeightModalRight">Annnoce</a>
                  </div>


                  <div class="mr-5">
                     <a href="#" style="color:white; font-size: 1.2em;">Contacter-nous</a>
                  </div>

                    </ul>
                      <ul class="navbar-nav  nav-flex-icons">
                        <li class="nav-item">
                          <h1 class="nav-link"><?php echo $afficher['P']?></h1>
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
                            <a class="dropdown-item" href="#">Modifier l'annonce</a>
                            <a class="dropdown-item" href="#">suprimer l'annonce </a>
                            <a class="dropdown-item" href="#">Deconnexion</a>
                          </div>
                        </li>
                    </ul>
              </div>
            </div>
          </nav>
  </header>

<!-- Navbar -->


<!-- moddal gauche -->

<!-- Full Height Modal Right -->
<div class="modal fade left" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-left" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Architeque/Maiçon/Manawa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div>
          <form method="post" action="#">
              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="nom" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12">Nom</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="prenom" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12">Prenom</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="fonction" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12">Fonction</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="ville" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12">Ville</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="commune" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12">Commune</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="quartier" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12">Quartier</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="tel" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12">Numero Téléphonique</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <input type="email" id="modalLRInput12" class="form-control form-control-sm validate" name="email" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12">Email</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix"></i>
                <textarea type="text" id="modalLRInput12" class="form-control form-control-sm validate p-2 ml-4" name="experiance" required></textarea>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="mb-5">Expérience</label>
              </div>

              <div class="text-center form-sm mt-2">
                <input type="submit" class="btn btn-info" value="Publier"><i class="fas fa-sign-in ml-1"></i></input>
              </div>
          </from>
  </div>
      </div>
      <div class="modal-footer justify-content-center">
       
      </div>
    </div>
  </div>
</div>
<!-- Full Height Modal Right -->