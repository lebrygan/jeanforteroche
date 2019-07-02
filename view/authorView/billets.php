<?php ob_start(); ?>

    <?php foreach ($billets as $i => $billet) {?>
        <div>
            <form method="POST" action="controller/editBillet.php">
                <textarea name="textPublication" class="tinyMCEarea">
                    <?= $billet->textPublication(); ?> 
                </textarea>
                <p><?= $billet->datePublicationReadable(); ?></p>
                <?php
                    if ($billet->published()) {
                        echo '<input type="checkbox" name="published" id="published" checked>';
                    } else {
                        echo '<input type="checkbox" name="published" id="published">';
                    }
                ?>
                <label for="published">Publier le billet</label>
                <input type="hidden" name="idBillet" value=<?= '"'.$billet->id().'"'; ?>>
                <input type="submit" value="Modifier le billet">
            </form>
            <?php
                foreach ($comments as $j => $comment) {
                    if($comment->relativeBillet() == $billet->id()){
                        echo '<div>';
                            echo '<div><p>'.$comment->comment().'</p>';
                            echo '<p>'.$comment->datePublicationReadable().'</p></div>';
                            echo '<button class="signal" name="'.$comment->id().'">Signaler ce commentaire</button>';
                            echo '<button class="delete" name="'.$comment->id().'">Supprimer ce commentaire</button>';
                        echo '</div>';
                }
            } ?>
        </div>

    <?php } ?>
<?php $content .= ob_get_clean(); ?>