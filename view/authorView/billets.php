<?php ob_start(); ?>

    <?php foreach ($billets as $i => $billet) {?>

        <div>
            <textarea name=<?= '"'.$billet->id().'"'; ?> class="tinyMCEarea">
                <?= $billet->textPublication(); ?> 
            </textarea>
            <p><?= $billet->datePublicationReadable(); ?></p>
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