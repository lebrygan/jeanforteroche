<?php ob_start(); ?>
    
    <form class="form-inline bg-white my-2 justify-content-center" method="POST" action="controller/access.php">
    	<label for="email">Votre email : </label>
    	<input class="mx-2" type="text" name="email" id="email" required>
    	<label for="password">Votre mot de passe : </label>
    	<input class="mx-2" type="password" name="password" id="password">
    	<button class="btn btn-primary m-2" type="submit">Valider</button>
    	<button class="btn btn-warning m-2" type="button" id="forgotPwd">Mot de pass oublié</button>
    </form>
<?php $content .= ob_get_clean(); ?>