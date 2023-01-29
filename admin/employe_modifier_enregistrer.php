<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      
require_once "connexion.php";


// Notes :
// PDO::exec() - "Execute an SQL statement and return the number of affected rows"
// PDO::query() - "Executes an SQL statement, returning a result set as a PDOStatement object"


function recuperer()
{
  $lignes = array();

  // se connecter à la base
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "SELECT * FROM employe";
  //echo $requette;
  $stmt = $cnx->prepare($requette);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  // récupérer toutes les lignes
  $lignes = $stmt->fetchAll();

/*
  // récupérer les lignes une à une
  while($ligne = $stmt->fetch()) {
    $lignes[] = $ligne;
  }
*/

  return $lignes;
}

function ajouter($nomprenom,$cin,$tel,$poste)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "INSERT INTO employe(nomprenom , cin , tel , poste) VALUES(:nomprenom , :cin , :tel , :poste)";
  $stmt = $cnx->prepare($requette);

 
  // préciser les valeurs des paramètres et exécuter
   $stmt->bindValue(':nomprenom', $nomprenom, PDO::PARAM_STR);
    $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);
      $stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
        $stmt->bindValue(':poste', $poste, PDO::PARAM_STR);


  // on peut utiliser aussi bindParam au lieu de bindValue
  // si on veut que les valeurs que les valeurs des variables
  // soit intérpréter uniquement lors de l'exécution

  return $stmt->execute();
}

function supprimer($cin)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "DELETE FROM employe WHERE cin = :cin";
  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
  $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);

  return $stmt->execute();
}


function recuperer_une($cin)
{
  $ligne = array();

  // se connecter à la base
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "SELECT * FROM employe WHERE cin = :cin";
  //echo $requette;

  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
  $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);

  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  $ligne = $stmt->fetch();

  return $ligne;
}

function modifier($nomprenom,$cin,$tel,$poste)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "UPDATE employe
                SET nomprenom = :nomprenom, tel = :tel, poste = :poste
                WHERE cin = :cin";
  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
    $stmt->bindValue(':nomprenom', $nomprenom, PDO::PARAM_STR);
    $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);
      $stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
        $stmt->bindValue(':poste', $poste, PDO::PARAM_STR);
    

  return $stmt->execute();
}





      
      $nomprenom = $_GET["nomprenom"];
      $cin = $_GET["cin"];
      $tel=$_GET["tel"];
      $poste=$_GET["poste"];
      
     


      if (modifier($nomprenom,$cin,$tel,$poste) === false) { // === (3 fois) pour éviter que ça soit interpréter avec 0
        echo "Erreur lors de la modification";
      } else {
        echo "Modification réussit";
      }
     ?>
     <br>
     <a href='admin_board.php'>Back</a>
  </body>
</html>
