<?php ob_start(); ?>
    
    <h2>Les commentaire suivant on été signalé</h2>
    <?php foreach ($comments as $i => $comment) {?>
    	<?php if($comment->signaled() == true ){ ?>
	        <div>
	        	<div>
		            <p><?= $comment->comment(); ?></p>
		            <p><?= $comment->datePublicationReadable(); ?></p>
		            <p>Associé au billet n°<?= $comment->relativeBillet(); ?></p>
	            </div>
	            <button class="delete" name=<?= '"'.$comment->id().'"' ?> >Supprimer ce commentaire</button>
	            <button class="unSignal" name=<?= '"'.$comment->id().'"' ?> >Rétablir ce commentaire</button>
	        </div>
    	<?php }
	} ?>

<?php $content .= ob_get_clean(); ?>