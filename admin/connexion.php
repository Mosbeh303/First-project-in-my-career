<?php
function se_connecter()
{
  $bd_url_serveur = "localhost";
  $bd_utilisateur = "root";
  $bd_mot_de_passe = "";
  $bd_nom = "institut_afaak";

  try {
      $cnx = new PDO("mysql:host=" . $bd_url_serveur . ";dbname=" . $bd_nom, $bd_utilisateur, $bd_mot_de_passe);
      // préciser le mode de retour des erreurs : ERRMODE_EXCEPTION : générer une exception
      $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // forcer le mode UTF8
      $cnx->exec("SET CHARACTER SET utf8");

      // retourner l'objet  de connexion
      return $cnx;
      }
  catch(PDOException $e)
      {
      echo "<br>" . $e->getMessage();
      }

  return null;
}

?>
