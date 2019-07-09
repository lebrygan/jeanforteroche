<!DOCTYPE html>
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

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 pb-2 footer">
                            <h3 class="text-center">L'auteur</h3>
                            <div class="d-flex">
                                <img src="public/img/jean.jpg">
                                <div class="ml-2">
                                <h4>Jean Forteroche</h4>
                                <p>Après des études scientifiques et un début de carrière dans la lutte contre la pollution, je “décide” (ma vie est tout à fait une suite planifiée de choix réfléchis) de me consacrer à ma famille et à l’écriture.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 p-0 align-items-left">
                            <div class="footer ml-md-1 mt-md-0 mt-sm-1 pl-2 mb-0 h-100">
                                <h3 class="text-center">Contact</h3>
                                <h4 class="my-1">Email</h4>
                                <p class="pl-5 mb-2">jeanforteroche@gmail.com</p>
                                <h4 class="my-1">Téléphone</h4>
                                <p class="pl-5 mb-2">+33 7 12 34 56 78</p>
                                <h4 class="my-1">Adresse</h4>
                                <p class="pl-5 my-1">5 rue de l'écriture</p>
                                <p class="pl-5 my-1">12 345 Paris</p>
                                <p class="pl-5 mt-1">France</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      	<script src="js/ajax.js"></script>
        <script src="js/class/ShowHideButton.js"></script>
      	<script src="js/manageComment.js"></script>
    </body>
</html>