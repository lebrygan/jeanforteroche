
<?php ob_start(); ?>
    <div class="container-fluid p-0">
        <div class="col-sm-12 billetContainer pt-3 pb-3">
            <p class="dateBillet"><?= $billet->datePublicationReadable(); ?></p>
            <div class="flexBreakmd"></div>
            <?= $billet->textPublication(); ?>
        </div>
        <div class="container-fluid bg-white">
            <form class="d-flex justify-content-center align-items-center flex-wrap row col-md-10 col-sm-12 offset-md-1 py-3 my-1" method="post" action="controller/addComment.php">
                <div class="col-md-10 col-sm-12">
                    <textarea class="d-block form-control mb-1 mr-1 col-12" rows="2" name="comment" placeholder="Ecrivez un commentaire" required></textarea>
                    <input class="nameComment d-block mb-1 mr-1 col-md-6 offset-md-6 col-sm-12" type="text" name="nameComment" placeholder="Votre pseudo" required />
                </div>
                <div class="col-md-2"><button class="btn btn-dark mx-auto mb-1" type="submit">Envoyer</button></div>
                <input type="hidden" name="billet" value=<?='"'.$billet->id().'"'; ?> />
            </form>
        </div>

        <div class="comments container-fluid justify-content-center text-center p-0">
            <?php
                if(count($comments) > 0 ){
                    if(count($comments) == 1){
                        echo '<h3 class="col-sm-12 my-1 pb-4 pt-2 titleUnderline"> Une réponse à ce billet</h3>';
                    }else{
                        echo '<h3 class="col-sm-12 my-1 pb-4 pt-2 titleUnderline">'.count($comments).' réponses à ce billet</h3>';
                    }
                }
                foreach ($comments as $comment) {
                    ?>
                    <div class="bg-white d-flex justify-content-center align-items-center flex-wrap row col-sm-12 mx-0 my-1 p-1">
                        <div class="row col-sm-12 p-0">
                            <div class="col-sm-2 col-xs-12 text-center align-items-center">
                                <p class="dateComment mx-2 d-inline-block"><?= $comment->datePublicationReadable() ?></p>
                            </div>
                            <div class="textComment col-sm-8 col-xs-12 px-xs-0">
                                <p class="col-12 px-0"><?= htmlspecialchars($comment->comment()) ?></p>
                                <p class="col-xs-12 px-0 text-sm-right text-xs-center font-italic"><?= '- Publié par <span class="font-weight-bold">'.htmlspecialchars($comment->name()).'</span> -' ?></p>
                            </div>
                            <div class="col-sm-2 col-xs-12 align-items-center">
                                <button class="signal btn btn-warning mx-auto my-1" name=<?= '"'.$comment->id().'"' ?>>Signaler</button>
                            </div>
                        </div>
                    </div>
            <?php } ?>
            <button class="hideComments d-none btn btn-dark mx-auto my-3">Afficher tous les commentaires</button>
        </div>
    </div>
<?php $content .= ob_get_clean(); ?>
