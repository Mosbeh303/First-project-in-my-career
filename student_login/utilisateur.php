<?php

require_once "connexion.php";

function verifier($uname, $email)
{
  $ligne = array();

  // se connecter à la base
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "SELECT * FROM etudiant
             WHERE uname = :uname
             AND email = :email";
  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
  $stmt->bindValue(':uname', $uname, PDO::PARAM_STR);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);

  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  $ligne = $stmt->fetch();

  if ($ligne)
    return $ligne['id_utilisateur'];

  return 0;
}

?>
