<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>




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







      $cin = $_GET["cin"];

      $ligne = recuperer_une($cin);

      if (count($ligne) > 0) {

          $nomprenom = $ligne["nomprenom"];
          $cin = $ligne["cin"];
             $tel = $ligne["tel"];
             $poste=$ligne["poste"];
      } else {
          echo "Employee Not Find !";
      }

     ?>
    <?php
      if (count($ligne) > 0)
      {
    ?>
        <h3>Employee Update</h3>

         <div>
        <form method="get" action="employe_modifier_enregistrer.php">
          <label for="fname">Full name</label> <input id="fname" name="nomprenom" placeholder="Full name.." type="text"  value="<?php echo $nomprenom; ?>">
          <input type="hidden" name="cin" value="<?php echo $cin; ?>">
          <label for="fname">Phone</label><input id="fname"  placeholder=" Phone.." type="text" name="tel" value="<?php echo $tel; ?>">

          <label for="fname">Job</label><input id="fname" name="poste" placeholder=" Phone.." type="text"  value="<?php echo $poste; ?>">
          
          
          <br>
          
          <br>

          <input type="submit" value="Save Changes">
         
        </form>
       </div>
    <?php
      }
     ?>

  </body>
</html>
