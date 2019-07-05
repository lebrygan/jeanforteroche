
<?php ob_start(); ?>
    <?php
    foreach ($billets as $i => $billet) {
        if($billet->published()){
        ?>
        <div class="billet">
            <div class="textBillet">
                <?= $billet->textPublication(); ?>
                <p class="date"><?= $billet->datePublicationReadable(); ?></p>
            </div>
            <form class="addComment" method="post" action="controller/addComment.php">
                <textarea class="areaComment" name="comment" placeholder="Votre commentaire"></textarea>
                <input type="hidden" name="billet" value=<?='"'.$billet->id().'"'; ?> />
                <button type="submit">Envoyer</button>
            </form>
            <div class="comments">
                <?php
                    foreach ($comments as $j => $comment) {
                        if($comment->relativeBillet() == $billet->id() && !$comment->signaled()){
                            echo '<div class="comment">';
                                echo '<div class="textComment"><p>'.htmlspecialchars($comment->comment()).'</p>';
                                echo '<p class="date">'.$comment->datePublicationReadable().'</p></div>';
                                echo '<button class="signal" name="'.$comment->id().'">Signaler ce commentaire</button>';
                            echo '</div>';
                    }
                } ?>
                <button class="hideComments">Afficher tous les commentaires</button>
            </div>
        </div>
        <a href="index.php?user=destroy">Retour à la page d'accueil</a>
        <?php
        }
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
