<?php $this->titre = "L'inventaire de Yasser - Connexion" ?>

<p>Vous devez être connecté pour accéder à cette zone.</p>

<form action="Utilisateurs/connecter" method="post">
    <input name="login" type="text" placeholder="Entrez votre login" required autofocus>
    <input name="mdp" type="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">Connexion</button>
</form>

<?= ($erreur == 'mdp') ? '<span style="color : red;">Login ou mot de passe incorrects</span>' : '' ?> 
        
