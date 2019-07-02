<?php ob_start(); ?>
<a href="index.php?user=destroy">Retour à la page d'accueil</a>

<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=5dq4ykchp5kaozo8vxeqvqp20ycwj2n7b7fj2p2mwgbo4z2a"></script>
<script>
	tinymce.init({
		selector: '#mytextarea'
	});
</script>

<?php $content .= ob_get_clean(); ?>