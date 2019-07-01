
<?php ob_start(); ?>

    <h1>Billet simple pour l'Alaska</h1>

    <?php foreach ($billets as $i => $billet) {?>

        <div>
            <p><?= $billet->textPublication(); ?></p>
            <p><?= $billet->datePublicationReadable(); ?></p>
            <form>
                <textarea name='comment' id='comment' placeholder="Votre commentaire"></textarea>
                <input type="submit" name="send" />
            </form>
            <?php
                foreach ($comments as $comment) {
                    if($comment->relativeBillet() == $billet->id()){
                        echo '<div>';
                            echo '<p>'.$comment->comment().'</p>';
                            echo '<p>'.$comment->datePublicationReadable().'</p>';
                            echo '<button class="signaled">Signaler ce commentaire</button>';
                        echo '</div>';
                }
            } ?>
        </div>

    <?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
