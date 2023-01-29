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



function ajouter($uname,$email)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "INSERT INTO etudiant(uname , email) VALUES(:uname , :email )";
  $stmt = $cnx->prepare($requette);

 
  // préciser les valeurs des paramètres et exécuter
   $stmt->bindValue(':uname', $uname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    


  // on peut utiliser aussi bindParam au lieu de bindValue
  // si on veut que les valeurs que les valeurs des variables
  // soit intérpréter uniquement lors de l'exécution

  return $stmt->execute();
}


// Notes :
// PDO::exec() - "Execute an SQL statement and return the number of affected rows"
// PDO::query() - "Executes an SQL statement, returning a result set as a PDOStatement object"





      $uname = $_GET["uname"];
      $email = $_GET["email"];
      



      if (ajouter($uname, $email)) {
          echo "<label for='fname'> student successefully registred </label>";
          echo "<div>";
          echo "<br>";
            echo "<input type='submit' value='Back to home' onclick='redirect()'>";
          echo "<div>";
      } else {
          echo "Error";
      }

     ?>
     <br>
     

<script type="text/javascript">
  function redirect(){
          window.location.href = "../index.php" ;
          }
</script>

  </body>
</html>
