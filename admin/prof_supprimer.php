<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      require_once "prof.php";

      $cin = $_GET["cin"];

      if (prof_supprimer($cin) === false) {
        echo "Erreur lors de la suppression ";
      } else {
        echo "Suppression réussit";
      }

     ?>
     <br>
     <a href='admin_board.php'>Back</a>
  </body>
</html>
