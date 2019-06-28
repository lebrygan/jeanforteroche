<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="public/style.css" rel="stylesheet" /> 
    </head>
        
    <body>

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

        <a href="index.php?logout=out">Logout</a>
    </body>
</html>