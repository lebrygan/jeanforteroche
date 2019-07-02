
<?php ob_start(); ?>
    <?php
    foreach ($billets as $i => $billet) {
        if($billet->published()){
        ?>
        <div>
            <div>
                <?= $billet->textPublication(); ?>
                <p><?= $billet->datePublicationReadable(); ?></p>
            </div>
            <form method="post" action="controller/addComment.php">
                <textarea name="comment" placeholder="Votre commentaire"></textarea>
                <input type="hidden" name="billet" value=<?='"'.$billet->id().'"'; ?> />
                <input type="submit" value="Envoyer" />
            </form>
            <?php
                foreach ($comments as $j => $comment) {
                    if($comment->relativeBillet() == $billet->id() && !$comment->signaled()){
                        echo '<div>';
                            echo '<div><p>'.$comment->comment().'</p>';
                            echo '<p>'.$comment->datePublicationReadable().'</p></div>';
                            echo '<button class="signal" name="'.$comment->id().'">Signaler ce commentaire</button>';
                        echo '</div>';
                }
            } ?>
        </div>
        <?php
        }
    }
    ?>

    <a href="index.php?user=destroy">Retour à la page d'accueil</a>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
