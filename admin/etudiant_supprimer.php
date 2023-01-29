<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
 
  require_once "connexion.php";

    function etudiant_supprimer($uname)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "DELETE FROM etudiant WHERE uname = :uname";
  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
  $stmt->bindValue(':uname', $uname, PDO::PARAM_STR);

  return $stmt->execute();
}

      $uname = $_GET["uname"];

      if (etudiant_supprimer($uname) === false) {
        echo "Erreur lors de la suppression ";
      } else {
        echo "Suppression réussit";
      }

     ?>
     <br>
     <a href='admin_board.php'>Back</a>
  </body>
</html>
