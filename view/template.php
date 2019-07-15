<!DOCTYPE html>
<!-- Main template  -->
<html lang='fr'>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Billet simple pour l'Alaska</title>
        <link href="public/css/style.css" rel="stylesheet" />
        <link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
        
    <body>
        <div id="mainOverlay">
            <div class="container-fluid col-lg-8 col-md-10 col-sm-12 p-0" id="mainContainer">
                <div class="page-header p-0">
                    <a href="index.php?user=destroy"><h1 class="pl-2">Billet simple pour l'Alaska</h1></a>
                </div>

                <?= $content ?>
            </div>
        </div>

        <?= $script ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      	<script src="js/ajax.js"></script>
        <script src="js/class/ShowHideButton.js"></script>
      	<script src="js/manageComment.js"></script>
    </body>
</html>