<?php ob_start(); ?>
<div class="row m-0">
    <div class="form-inline bg-white my-2 justify-content-center">
    	<h3 class="col-sm-12 my-1 pb-4 pt-2 titleUnderline">Gestion des utilisateurs</h3>
    	<label for="email">Email : </label>
    	<input class="mx-2" type="text" name="email" id="email" required>
    	<label for="password">Mot de passe : </label>
    	<input class="mx-2" type="password" name="password" id="password">
    	<button class="btn btn-primary m-2" id="addChangeUser">Ajouter/Modifier</button>
    	<button class="btn btn-warning m-2" id="deleteUser">Supprimer</button>
    </div>
    <div class="col-12" id="respondUser"></div>
</div>
<?php $content .= ob_get_clean(); ?>