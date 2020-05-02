<?php

require_once 'Vue/Vue.php';
$commande = [
    'id' => '2',
    'utilisateur_id' => '1',
    'details_commande' => 'Souris, microphone et clavier pour performer dans les jeux',
    'courriel' => 'utilisateur@hotmail.com',
    'nom' => 'Yasser Soliman',
    'identifiant' => 'ysoliman'
];
$produits = [
    [
        'id' => '4',
        'nom_produit' => 'Razer 1',
        'prix_unitaire' => '250.19',
        'description_produit' => 'Clavier de jeu mécanique touches mécaniques Razer Green (tactile et clicky) commande multimédia repose',
        'en_stock' => '0'
    ],
    [
        'id' => '5',
        'nom_produit' => 'Razer 2',
        'prix_unitaire' => '500.19',
        'description_produit' => 'Clavier de jeu mécanique touches mécaniques Razer Green (tactile et clicky) commande multimédia repose',
        'en_stock' => '0'
    ],
    [
        'id' => '6',
        'nom_produit' => 'Razer 3',
        'prix_unitaire' => '100.19',
        'description_produit' => 'Clavier de jeu mécanique touches mécaniques Razer Green (tactile et clicky) commande multimédia repose',
        'en_stock' => '0'
    ]
];
$produitsCommandes = [
    [
        'id' => '5',
        'commande_id' => '2',
        'produit_id' => '4',
        'quantite_produit' => '1',
        'nom_produit' => 'Razer 1',
        'prix_unitaire' => '250.19',
        'description_produit' => 'Clavier de jeu mécanique touches mécaniques Razer Green (tactile et clicky) commande multimédia repose',
        'details_commande' => 'Souris, microphone et clavier pour performer dans les jeux',
        'nom' => 'Yasser Soliman'
    ],
    [
        'id' => '6',
        'commande_id' => '2',
        'produit_id' => '5',
        'quantite_produit' => '1',
        'nom_produit' => 'Razer 2',
        'prix_unitaire' => '500.19',
        'description_produit' => 'Clavier de jeu mécanique touches mécaniques Razer Green (tactile et clicky) commande multimédia repose',
        'details_commande' => 'Souris, microphone et clavier pour performer dans les jeux',
        'nom' => 'Yasser Soliman'
    ]
];
$vue = new Vue('Commande');
$vue->generer(array('commande' => $commande, 'produits' => $produits, 'produitsCommandes' => $produitsCommandes));
