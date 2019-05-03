<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <div class="mr-4">
                     <a style="color:white; font-size: 1.2em;" data-toggle="modal" data-target="#ligne" class="btn btn-outline-secondary">Plublier une Annonce</a>
                  </div>
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
          <form method="post" action="traitement/inscription.php">
              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix text-default"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="nom" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Nom</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix text-default"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="prenom" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Prenom</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-envelope prefix text-default"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="email" required>
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Email</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-lock prefix text-default"></i>
                <input type="password" id="modalLRInput13" class="form-control form-control-sm validate" name="password1" required>
                <label data-error="wrong" data-success="right" for="modalLRInput13" class="text-default">Mot de Passe</label>
              </div>

              <div class="md-form form-sm mb-4">
                <i class="fas fa-lock prefix text-default"></i>
                <input type="password" id="modalLRInput14" class="form-control form-control-sm validate" name="password2" required>
                <label data-error="wrong" data-success="right" for="modalLRInput14" class="text-default">Confirmer le Mot de Passe</label>
              </div>

              <div class="text-center form-sm mt-2">
                <input type="submit" class="btn btn-secondary" value="S'inscrire" style="border-radius: 5px;"><i class="fas fa-sign-in ml-1"></i></input>
              </div>

            </div>
          </from>
         
      </div>
      <div class="modal-footer justify-content-center">
        
      </div>
    </div>
  </div>
</div>
<!-- Full Height Modal left -->
<!-- modal persone en ligne -->

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
