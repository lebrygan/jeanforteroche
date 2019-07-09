<?php ob_start(); ?>

<script type="text/javascript" src="js/manageBillet.js"></script>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=5dq4ykchp5kaozo8vxeqvqp20ycwj2n7b7fj2p2mwgbo4z2a"></script>
<script>
	tinymce.init({
		selector: '.tinyMCEarea'
	});
</script>

<?php $content .= ob_get_clean(); ?>