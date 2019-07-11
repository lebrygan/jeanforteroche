
<?php ob_start(); ?>
    <div class="container-fluid p-0">
        <div class="col-sm-12 billetContainer pt-3 pb-3">
            <p class="dateBillet"><?= $billet->datePublicationReadable(); ?></p>
            <div class="flexBreakmd"></div>
            <?= $billet->textPublication(); ?>
        </div>
        <div class="container-fluid bg-white">
            <form class="d-flex justify-content-center align-items-center flex-wrap row col-md-10 col-sm-12 offset-md-1 py-3 my-1" method="post" action="controller/addComment.php">
                <textarea class="areaComment d-block form-control mb-1 mr-1" rows="2" name="comment" placeholder="Ecrivez un commentaire" required></textarea>
                <div class="buttonCommentContainer"><button class="btn btn-dark mx-auto mb-1" type="submit">Envoyer</button></div>
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
                    echo '<div class="bg-white d-flex justify-content-center align-items-center flex-wrap row col-sm-12 mx-0 my-1 p-1">';
                        echo '<p class="dateComment mx-2">'.$comment->datePublicationReadable().'</p>';
                        echo '<div class="textComment"><p>'.htmlspecialchars($comment->comment()).'</p></div>';
                        echo '<div class="buttonCommentContainer"><button class="signal btn btn-warning mx-auto my-1" name="'.$comment->id().'">Signaler</button></div>';
                    echo '</div>';
            } ?>
            <button class="hideComments d-none btn btn-dark mx-auto my-3">Afficher tous les commentaires</button>
        </div>
    </div>
<?php $content .= ob_get_clean(); ?>
