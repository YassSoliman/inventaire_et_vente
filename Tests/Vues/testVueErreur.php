<?php

require_once 'Vue/Vue.php';
$vue = new Vue("Erreur");
$vue->generer(array('msgErreur' => '*** Message d\'erreur test ***'));