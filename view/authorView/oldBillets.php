<?php ob_start(); ?>
    <div class="container-fluid p-0">
        <form class="form-group col-sm-12 billetContainer pt-3 pb-3" method="POST" action="controller/formCall/editBillet.php">
            <p class="dateBillet mb-2"><?= $billet->datePublicationReadable(); ?></p>
            <textarea name="textPublication" class="tinyMCEarea" rows="15">
                <?= $billet->textPublication(); ?> 
            </textarea>
            <div class="text-center justify-content-center">
                <p class="col-12">Ceci est le billet n°<?= $billet->id(); ?></p>
                <label class="form-check-label mx-2 align-self-center h-100">
                    <?php
                        if ($billet->published()) {
                            echo '<input class="checkbox" type="checkbox" name="published" checked>';
                        } else {
                            echo '<input class="checkbox" type="checkbox" name="published">';
                        }
                    ?>
                    Publier le billet
                </label>
            </div>
            <div class="row col-12 justify-content-center">
                <input type="hidden" name="idBillet" value=<?= '"'.$billet->id().'"'; ?> />
                <button class="btn btn-warning mx-2 my-1" type="submit">Modifier</button>
                <button class="deleteBillet btn btn-danger mx-2 my-1" type="button" name=<?= '"'.$billet->id().'"'; ?>>Supprimer</button>
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
                        <div class="row col-sm-12 m-0">
                            <div class="col-md-1 col-sm-2 col-xs-12 text-sm-left my-auto text-xs-center mt-1 p-0">
                                <p class="dateComment mx-2 my-auto d-inline-block"><?= $comment->datePublicationReadable() ?></p>
                            </div>
                            <div class="textComment col-md-11 col-sm-10 mt-1 p-0">
                                <p class="col-12 px-0 mb-1"><?= htmlspecialchars($comment->comment()) ?></p>
                                <p class="col-xs-12 px-0 text-sm-right text-xs-center font-italic mb-1"><?= '- Publié par <span class="font-weight-bold">'.htmlspecialchars($comment->name()).'</span> -' ?></p>
                            </div>
                        </div>
                        <div class="d-flex row">
                            <button class="signal btn btn-warning mx-1" name=<?= '"'.$comment->id().'"' ?>>Signaler</button>
                            <button class="deleteComment btn btn-danger mx-1" name=<?= '"'.$comment->id().'"'?> >Supprimer</button>
                        </div>
                    </div>
                <?php } ?>
                <button class="hideComments d-none btn btn-dark mx-auto my-3">Afficher tous les commentaires</button>
        </div>
    </div>
<?php $content .= ob_get_clean(); ?>