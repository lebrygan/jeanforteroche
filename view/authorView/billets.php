<?php ob_start(); ?>
    <div id="addBillet">
        <h2>Ajout d'un nouveau billet</h2>
        <form  method="POST" action="controller/addBillet.php">
            <textarea name="textPublication" class="tinyMCEarea">
            </textarea>
            <input type="checkbox" name="published" id="published" checked>
            <label for="published">Publier le billet</label>
            <button type="submit">Ajouter un nouveau billet</button>
        </form>
    </div>

    <h2>Anciens billets</h2>
    <?php foreach ($billets as $i => $billet) {?>
        <div class="billet">
            <form method="POST" action="controller/editBillet.php">
                <textarea name="textPublication" class="tinyMCEarea">
                    <?= $billet->textPublication(); ?> 
                </textarea>
                <p class="date"><?= $billet->datePublicationReadable(); ?></p>
                <p>Ceci est le billet n°<?= $billet->id(); ?></p>
                <?php
                    if ($billet->published()) {
                        echo '<input type="checkbox" name="published" id="published" checked>';
                    } else {
                        echo '<input type="checkbox" name="published" id="published">';
                    }
                ?>
                <label for="published">Publier le billet</label>
                <input type="hidden" name="idBillet" value=<?= '"'.$billet->id().'"'; ?> />
                <button type="submit">Modifier le billet</button>
                <button class="deleteBillet" name=<?= '"'.$billet->id().'"'; ?>>Supprimer le billet</button>
            </form>
            <div class="comments">
            <?php
                foreach ($comments as $j => $comment) {
                    if($comment->relativeBillet() == $billet->id()){
                        echo '<div class="comment">';
                            echo '<div class="textComment"><p>'.htmlspecialchars($comment->comment()).'</p>';
                            echo '<p class="date">'.$comment->datePublicationReadable().'</p></div>';
                            echo '<button class="signal" name="'.$comment->id().'">Signaler ce commentaire</button>';
                            echo '<button class="deleteComment" name="'.$comment->id().'">Supprimer ce commentaire</button>';
                        echo '</div>';
                }
            } ?>
            </div>
        </div>

    <?php } ?>
<?php $content .= ob_get_clean(); ?>