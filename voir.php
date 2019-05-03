<?php 
session_start();
require 'traitement/database.php';
if (isset($_GET)) 
{
  $id = $_SESSION['id'];
  $db = Database::connect();
  $select = $db -> prepare('SELECT * FROM inscription WHERE id = ?');
  $select -> execute(array($id));
  $voir = $select -> fetch();
  
}
?>


<!DOCTYPE html>
<html>
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
  <link href="css/style.css" rel="stylesheet">

</head>
    
    <body>
        <div class="container-fuid p-5 text-center mb-5  secondary-color-dark">
            <h3 class="text-white"> <?php echo $voir['Prenom'].' '.$voir['Nom']?> Bienvenu(e) sur votre profile</h3>
        </div>

         <div class="container">
            <div class="row border border-secondary">
            
               <div class="col-sm-6 text-center">
                    <h3 class="mt-4"><strong><?php echo $voir['Nom']?></strong></h3>
                    <h3><strong><?php echo $voir['Prenom']?></strong></h1>
                    <br>
                    <form>                     
                      <div class="form-group">
                        <label><?php echo $voir['Email']?></label>
                      </div>
                    </form>
                    <?php   
                      // table userOrofile
                      $photo = $db -> query("SELECT * FROM user_profile");
                      $montrer = $photo -> fetch();
                     ?>
                    
                      <a class="btn btn-outline-secondary mb-4" href="produit.php" style="border-radius: 50px;"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                      <a data-toggle="modal" data-target="#sideModalTR"  class="btn btn-outline-secondary mb-4" href="#" style="border-radius: 50px;"><span class="glyphicon glyphicon-arrow-left"></span> modifier</a>
                   
                </div> 
                <div class="col-sm-6">
                
                        <img src="uphotoBD/<?= $voir['image']?>" class="w-50 border">
                    
                </div>
            </div>
        </div> 



<!-- To change the direction of the modal animation change .right class -->
<div class="modal fade bottom" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-top-left" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100 text-center text-secondary" id="myModalLabel"><strong><small>modifier vos informations</small></strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="traitement/modifProfileUser.php" class="p-3">
              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix text-default"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="nom"  value="<?php echo $voir['Nom']?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Nom</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-user prefix text-default"></i>
                <input type="text" id="modalLRInput12" class="form-control form-control-sm validate" name="prenom"  value="<?php echo $voir['Prenom']?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Prenom</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-envelope prefix text-default"></i>
                <input type="email" id="modalLRInput12" class="form-control form-control-sm validate" name="email" value="<?php echo $voir['Email']?>">
                <label data-error="wrong" data-success="right" for="modalLRInput12" class="text-default">Email</label>
              </div>

              <div class="md-form form-sm mb-5">
                <i class="fas fa-lock prefix text-default"></i>
                <input type="text" id="modalLRInput13" class="form-control form-control-sm validate" name="password1" value="<?php echo $voir['Password']?>">
                <label data-error="wrong" data-success="right" for="modalLRInput13" class="text-default">Mot de Passe</label>
              </div>

              <div class="md-form form-sm mb-5">
                <input type="text" id="modalLRInput13" class="form-control form-control-sm validate" name="id" value="<?php echo $voir['id']?>" hidden>
              </div>

              <div class="text-center form-sm mt-2">
                <input type="submit" class="btn btn-secondary" value="Modifier" style="border-radius: 5px;"><i class="fas fa-sign-in ml-1"></i></input>
              </div>

            </div>

          </from>

      </div> 
    </div>
  </div>
</div>
<!-- Side Modal Top Right -->
        
<?php include 'footer.php' ?>
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
