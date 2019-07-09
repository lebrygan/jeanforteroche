<?php ob_start(); ?>
    <div id="addBillet">
        <h2 class="col-sm-12 my-1 pb-4 pt-2 titleUnderline">Ajout d'un nouveau billet</h2>
        <form class="bg-white" method="POST" action="controller/addBillet.php">
            <textarea name="textPublication" class="tinyMCEarea" rows="15">
            </textarea>
            <div class="form-inline d-flex justify-content-center">
                <input class="checkbox" type="checkbox" name="published" id="published" checked>
                <label class="form-check-label mx-2 my-1" for="published">Publier le billet</label>
                <button class="btn btn-primary mx-2 my-1" type="submit">Ajouter un nouveau billet</button>
            </div>
        </form>
    </div>

    <h2 class="col-sm-12 my-1 pb-4 pt-2 titleUnderline short">Anciens billets</h2>
    <?php foreach ($billets as $i => $billet) {?>
        <div class="container-fluid p-0">
            <form class="form-group col-sm-12 billetContainer pt-3 pb-3" method="POST" action="controller/editBillet.php">
                <p class="dateBillet mb-2"><?= $billet->datePublicationReadable(); ?></p>
                <textarea name="textPublication" class="tinyMCEarea" rows="15">
                    <?= $billet->textPublication(); ?> 
                </textarea>
                <p class="text-center">Ceci est le billet n°<?= $billet->id(); ?></p>
                <div class="d-flex justify-content-center">
                    <?php
                        if ($billet->published()) {
                            echo '<input class="checkbox" type="checkbox" name="published" id="published" checked>';
                        } else {
                            echo '<input class="checkbox" type="checkbox" name="published" id="published">';
                        }
                    ?>
                    <label class="form-check-label mx-2 align-self-center h-100"  for="published">Publier le billet</label>
                    <input type="hidden" name="idBillet" value=<?= '"'.$billet->id().'"'; ?> />
                    <button class="btn btn-warning mx-2 my-1" type="submit">Modifier le billet</button>
                    <button class="deleteBillet btn btn-danger mx-2 my-1" name=<?= '"'.$billet->id().'"'; ?>>Supprimer le billet</button>
                </div>
            </form>
            <div class="comments container-fluid justify-content-center text-center p-0">
            <?php
                foreach ($comments as $j => $comment) {
                    if($comment->relativeBillet() == $billet->id()){
                        echo '<div class="comment">';
                            echo '<div class="textComment"><p>'.htmlspecialchars($comment->comment()).'</p>';
                            echo '<p class="date">'.$comment->datePublicationReadable().'</p></div>';
                            echo '<button class="signal btn btn-warning" name="'.$comment->id().'">Signaler ce commentaire</button>';
                            echo '<button class="deleteComment btn btn-danger" name="'.$comment->id().'">Supprimer ce commentaire</button>';
                        echo '</div>';
                }
            } ?>
            </div>
        </div>

    <?php } ?>
<?php $content .= ob_get_clean(); ?>