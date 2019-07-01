<?php ob_start(); ?>

        <div>
            <p>Bienvenu sur mon site ! Vous êtes :</p>
            <a href="index.php?user=visitor">Visiteur</a>
            <a href="index.php?user=author">Auteur</a>
        </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>