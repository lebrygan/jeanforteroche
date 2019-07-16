<?php ob_start(); ?>
	<div class="container-fluid">
		<div class="row">
            <div class="col-md-6 col-sm-12 pb-2 mb-1 bg-white">
                <h3 class="text-center">L'auteur</h3>
                <div class="row">
                    <figure class="col-sm-5 col-xs-12">
                        <img class="mw-100 mh-100" id="authorImg" src="public/img/jean.jpg" alt="Photos de l'auteur">
                    </figure>
                    <div class="pl-2 col-sm-6 col-xs-12">
                        <h4>Jean Forteroche</h4>
                        <p>Après des études scientifiques et un début de carrière dans la lutte contre la pollution, je “décide” (ma vie est tout à fait une suite planifiée de choix réfléchis) de me consacrer à ma famille et à l’écriture.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 p-0 mb-1 align-items-left">
                <div class="bg-white ml-md-1 mt-md-0 mt-sm-1 pl-2 mb-0 h-100">
                    <h3 class="text-center">Contact</h3>
                    <h4 class="my-1">Email</h4>
                    <p class="pl-5 mb-2">jeanforteroche@gmail.com</p>
                    <h4 class="my-1">Téléphone</h4>
                    <p class="pl-5 mb-2">+33 7 12 34 56 78</p>
                    <h4 class="my-1">Adresse</h4>
                    <p class="pl-5 my-1">5 rue de l'écriture</p>
                    <p class="pl-5 my-1">12 345 Paris</p>
                    <p class="pl-5 mt-1">France</p>
                </div>
            </div>
        </div>
    </div>
<?php $content .= ob_get_clean(); ?>