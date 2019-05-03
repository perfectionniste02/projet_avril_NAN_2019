<?php 
require 'traitement/database.php';
if (isset($_GET)) 
{
  $id = $_GET['id'];
  $db = Database::connect();
  $select = $db -> prepare('SELECT * FROM inscription WHERE id = ?');
  $select -> execute(array($id));
  $afficher = $select -> fetch();
}
?>



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

  <!-- Start your project here-->
  <!--Body-->
              
            <div class="modal-body">
              <form method="post" action="traitement/modifier.php">
              <div class="md-form form-sm mb-5">
                
                <input type="text" class="form-control form-control-sm validate" name="nom" value="<?php echo $afficher['Nom'] ?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12">Nom</label>
              </div>

              <div class="md-form form-sm mb-5">
                
                <input type="text" class="form-control form-control-sm validate" name="prenom"   value="<?php echo $afficher['Prenom'] ?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12">Prenom</label>
              </div>

              <div class="md-form form-sm mb-5">
                
                <input type="text" class="form-control form-control-sm validate" name="email"   value="<?php echo $afficher['Email'] ?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12">Email</label>
              </div>

              <div class="md-form form-sm mb-4">
                <input type="password" id="modalLRInput14" class="form-control form-control-sm validate" name="password" value="<?php echo $afficher['Password'] ?>" >
                <label data-error="wrong" data-success="right" for="modalLRInput14"> Mot de Passe</label>
              </div>


              <div class="md-form form-sm mb-5">
                <input type="text" id="modalLRInput13" class="form-control form-control-sm validate" name="id"   value="<?php echo $afficher['id'] ?>" hidden>
              </div>
              <div class="text-center form-sm mt-2">
                <input type="submit" class="btn btn-info" value="modifier"><i class="fas fa-sign-in ml-1"></i></input>
              </div>

            </div>
          </from> 
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
