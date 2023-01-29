<?php
session_start();

require_once "utilisateur.php";

$id_utilisateur = "0";

if (isset($_GET["uname"]) && isset($_GET["email"]))
{
  $uname  = $_GET["uname"];
  $email = $_GET["email"];

  if ($id_utilisateur = verifier($uname, $email))
  {
    $_SESSION["id_utilisateur"] = $id_utilisateur;
  }
}

echo $id_utilisateur;
?>
