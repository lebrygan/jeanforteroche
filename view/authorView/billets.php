<?php ob_start(); ?>

    <h1>Billet simple pour l'Alaska</h1>

    

    <?php foreach ($billets as $i => $billet) {?>

        <div>
            <p><?= $billet->textPublication(); ?></p>
            <p><?= $billet->datePublicationReadable(); ?></p>
            <form method="post" action="controller/addComment.php">
                <textarea name="comment" placeholder="Votre commentaire"></textarea>
                <input type="hidden" name="billet" value=<?='"'.$billet->id().'"'; ?> />
                <input type="submit" value="Envoyer" />
            </form>
            <?php
                foreach ($comments as $j => $comment) {
                    if($comment->relativeBillet() == $billet->id()){
                        echo '<div>';
                            echo '<div><p>'.$comment->comment().'</p>';
                            echo '<p>'.$comment->datePublicationReadable().'</p></div>';
                            echo '<button class="signaled" name="'.$comment->id().'">Signaler ce commentaire</button>';
                        echo '</div>';
                }
            } ?>
        </div>

    <?php } ?>
<?php $content .= ob_get_clean(); ?>