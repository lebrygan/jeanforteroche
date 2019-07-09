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

    <h2 class="col-sm-12 my-1 pb-4 pt-2 titleUnderline">Anciens billets</h2>
    
<?php $content .= ob_get_clean(); ?>