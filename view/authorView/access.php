<?php ob_start(); ?>
    
    <form form  method="POST" action="controller/access.php">
    	<label for="email">Votre email : </label>
    	<input type="text" name="email" id="email">
    	<label for="password">Votre mot de passe : </label>
    	<input type="password" name="password" id="password">
    	<button type="submit">Valider</button>
    </form>
    <a href="index.php?user=destroy">Retour à la page d'accueil</a>
<?php $content .= ob_get_clean(); ?>