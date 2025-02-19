<?php
require "conn.php";
$db->exec("update paiement set etat='paié' where mois=".$_GET["mois"]." and grop='".$_GET["grop"]."' and nom='".$_GET["nom"]."' ;");
header("location:etudiant.php?nom=".$_GET["nom"]);