<?php

require 'Modele.php';

try {
  if (isset($_GET['id'])) {
    // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
    $id = intval($_GET['id']);
    if ($id != 0) {
      $commande = getCommande($id);
      $produits = getProduitsCommande($id);
      require 'vueCommande.php';
    }
    else
      throw new Exception("Identifiant de commande incorrect");
  }
  else
    throw new Exception("Aucun identifiant de commande");
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'vueErreur.php';
}