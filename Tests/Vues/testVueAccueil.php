<?php

require_once 'Vue/Vue.php';
$commandes = [
    [
        'id' => '2',
        'utilisateur_id' => '1',
        'details_commande' => 'Souris, microphone et clavier pour performer dans les jeux',
        'courriel' => 'utilisateur@hotmail.com',
        'nom' => 'Yasser Soliman',
        'identifiant' => 'ysoliman'
    ],
    [
        'id' => '3',
        'utilisateur_id' => '2',
        'details_commande' => 'Ordinateur portable',
        'courriel' => 'john.doe@yahoo.com',
        'nom' => 'John Doe',
        'identifiant' => 'jdoe'
    ],
    [
        'id' => '4',
        'utilisateur_id' => '3',
        'details_commande' => 'Tablette et ssd',
        'courriel' => 'George@hotmail.com',
        'nom' => 'George Leblanc',
        'identifiant' => 'gleblanc'
    ]
    
];
$vue = new Vue('Accueil');
$vue->generer(array('commandes' => $commandes));
