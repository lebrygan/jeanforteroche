<?php ob_start(); ?>
    
    <h2 class="col-sm-12 my-1 pb-4 pt-2 titleUnderline">Les commentaires suivants ont été signalés</h2>
    <?php foreach ($comments as $i => $comment) {?>
    	<?php if($comment->signaled() == true ){ ?>
	        <div class="container-fluid justify-content-center text-center p-0">
	        	<div class="bg-white d-flex justify-content-center align-items-center flex-wrap row col-sm-12 mx-0 my-1 p-1">
	        		<p class="dateComment mx-2"><?= $comment->datePublicationReadable() ?></p>
		            <div class="textComment"><p><?= htmlspecialchars($comment->comment()) ?></p></div>
		            <p>Associé au billet n°<?= $comment->relativeBillet(); ?></p>
	            </div>
	            <button class="deleteComment btn btn-danger" name=<?= '"'.$comment->id().'"' ?> >Supprimer</button>
	            <button class="unSignal btn btn-dark" name=<?= '"'.$comment->id().'"' ?> >Rétablir</button>
	        </div>
    	<?php }
	} ?>

<?php $content .= ob_get_clean(); ?>