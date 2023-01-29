<?php

require_once "connexion.php";

function verifier($identifiant, $mot_de_passe)
{
  $ligne = array();

  // se connecter à la base
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "SELECT * FROM utilisateur
             WHERE identifiant = :identifiant
             AND mot_de_passe = :mot_de_passe";
  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
  $stmt->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);
  $stmt->bindValue(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);

  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  $ligne = $stmt->fetch();

  if ($ligne)
    return $ligne['id_utilisateur'];

  return 0;
}

?>
