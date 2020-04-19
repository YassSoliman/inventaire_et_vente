<?php

require('Controleur.php');

try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'commande') {
      if (isset($_GET['id'])) {
        $idCommande = intval($_GET['id']);
        if ($idCommande != 0)
          commande($idCommande);
        else
          throw new Exception("Identifiant de commande non valide");
      }
      else
        throw new Exception("Identifiant de commande non défini");
    }
    else
      throw new Exception("Action non valide");
  }
  else {
    accueil();  // action par défaut
  }
}
catch (Exception $e) {
    erreur($e->getMessage());
}