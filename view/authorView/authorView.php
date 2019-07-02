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

    <a href="index.php?user=destroy">Retour à la page d'accueil</a>

    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=5dq4ykchp5kaozo8vxeqvqp20ycwj2n7b7fj2p2mwgbo4z2a"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
<?php $content .= ob_get_clean(); ?>