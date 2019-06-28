
<?php ob_start(); ?>

    <h1>Billet simple pour l'Alaska</h1>

    <?php foreach ($billets as $i => $billet) {?>

        <div>
            <p><?= $billet->textPublication(); ?></p>
            <?php foreach ($comments as $comment) {
                if($comment->relativeBillet() == $billet->id())
                    echo '<p>'.$comment->comment().'</p>'; 
            } ?>
        </div>

    <?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
