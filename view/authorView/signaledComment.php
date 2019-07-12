<?php ob_start(); ?>
    
    <h2 class="col-sm-12 my-1 pb-4 pt-2 titleUnderline">Les commentaires suivants ont été signalés</h2>
    <?php foreach ($comments as $i => $comment) {?>
	        <div class="container-fluid justify-content-center text-center p-0 bg-white my-1">
	        	<div class="row col-sm-12 m-0">
                    <div class="col-sm-2 col-xs-12 text-center">
                        <p class="dateComment mx-2 d-inline-block"><?= $comment->datePublicationReadable() ?></p>
                    </div>
                    <div class="textComment col-sm-10">
                        <p class="col-12 px-0"><?= htmlspecialchars($comment->comment()) ?></p>
                        <p class="col-xs-12 px-0 text-sm-right text-xs-center font-italic"><?= '- Publié par <span class="font-weight-bold">'.htmlspecialchars($comment->name()).'</span> -' ?></p>
                        <p class="col-12 px-0 text-sm-right text-xs-center font-italic">Associé au billet n°<?= $comment->relativeBillet(); ?></p>
                    </div>
                </div>
	            <button class="deleteComment btn btn-danger mb-1" name=<?= '"'.$comment->id().'"' ?> >Supprimer</button>
	            <button class="unSignal btn btn-dark mb-1" name=<?= '"'.$comment->id().'"' ?> >Rétablir</button>
	        </div>
    <?php } ?>

<?php $content .= ob_get_clean(); ?>