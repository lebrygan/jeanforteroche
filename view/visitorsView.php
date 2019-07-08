
<?php ob_start(); ?>
    <div class="container-fluid">
        <div class="col-md-10 col-sm-12 offset-md-1 billetContainter">
            <p class="dateBillet"><?= $billet->datePublicationReadable(); ?></p>
            <div class="flexBreakmd"></div>
            <?= $billet->textPublication(); ?>
        </div>
        <form class="d-flex justify-content-center align-items-center flex-wrap row col-md-10 col-sm-12 offset-md-1" method="post" action="controller/addComment.php">
            <textarea class="areaComment d-block form-control mb-1 mr-1" rows="2" name="comment" placeholder="Ecrivez un commentaire"></textarea>
            <div class="buttonCommentContainer"><button class="btn btn-primary mx-auto mb-1" type="submit">Envoyer</button></div>
            <input type="hidden" name="billet" value=<?='"'.$billet->id().'"'; ?> />
        </form>

        <div class="comments container-fluid justify-content-center text-center">
            <h3 class="col-12"><?= count($comments).' réponses à ce billet'?></h3>
            <?php
                foreach ($comments as $comment) {
                    if(!$comment->signaled()){
                        echo '<div class="comment d-flex justify-content-center align-items-center flex-wrap row col-md-10 col-sm-12 offset-md-1">';
                            echo '<div class="textComment"><p>'.htmlspecialchars($comment->comment()).'</p>';
                            echo '<p class="date">'.$comment->datePublicationReadable().'</p></div>';
                            echo '<div class="buttonCommentContainer"><button class="signal btn btn-primary mx-auto mb-1" name="'.$comment->id().'">Signaler</button></div>';
                        echo '</div>';
                }
            } ?>
            <button class="hideComments d-none btn btn-primary mx-auto mb-5">Afficher tous les commentaires</button>
        </div>
    </div>
    <a href="index.php?user=destroy">Retour à la page d'accueil</a>
<?php $content .= ob_get_clean(); ?>
