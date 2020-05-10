<?php

require_once 'Framework/Vue.php';
$vue = new Vue("erreur");
$vue->generer(array('msgErreur' => '*** Message d\'erreur test ***'));