<?php ob_start(); ?>
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
                if(count($comments) > 0 ){
                    if(count($comments) == 1){
                        echo '<h3 class="col-sm-12 my-1 pb-4 pt-2 titleUnderline"> Une réponse à ce billet</h3>';
                    }else{
                        echo '<h3 class="col-sm-12 my-1 pb-4 pt-2 titleUnderline">'.count($comments).' réponses à ce billet</h3>';
                    }
                }
                foreach ($comments as $comment) { ?>
                    <div class="container-fluid bg-white justify-content-center align-items-center row col-sm-12 mx-0 my-1 p-1">
                        <div class="d-flex row col-sm-12"><p class="dateComment mx-2"><?= $comment->datePublicationReadable() ?></p>
                        <div class="textComment col-sm-10"><p><?= htmlspecialchars($comment->comment()) ?></p></div></div>
                        <div class="d-flex row"><button class="signal btn btn-warning mx-1" name=<?= '"'.$comment->id().'"' ?>>Signaler</button>
                        <button class="deleteComment btn btn-danger mx-1" name=<?= '"'.$comment->id().'"'?> >Supprimer</button></div>
                    </div>
                <?php } ?>
                <button class="hideComments d-none btn btn-dark mx-auto my-3">Afficher tous les commentaires</button>
        </div>
    </div>
<?php $content .= ob_get_clean(); ?>