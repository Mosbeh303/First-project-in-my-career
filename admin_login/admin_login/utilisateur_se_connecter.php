<?php
session_start();

require_once "utilisateur.php";

$id_utilisateur = "0";

if (isset($_GET["identifiant"]) && isset($_GET["mot_de_passe"]))
{
  $identifiant  = $_GET["identifiant"];
  $mot_de_passe = $_GET["mot_de_passe"];

  if ($id_utilisateur = verifier($identifiant, $mot_de_passe))
  {
    $_SESSION["id_utilisateur"] = $id_utilisateur;
  }
}

echo $id_utilisateur;
?>
