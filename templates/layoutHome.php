<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href='/css/main.css'>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <script src="/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
    <header id="header_one">
            <div class="logo">
                <a href="<?=$router->url('index')?>" class="logo">
                    <img src="/imgs/img_site/logo__.png" alt="">
                <span>RentalCarsFes</span>
                </a>
            </div>

           
            <ul class="nav">
                <li><a href="login" >Connexion</a></li>
                <li><a href="signup">Inscription</a></li>
            </ul>
        </header>
        <?= $content ?>

        <footer>
            <span>Copyright &copy; Oussama El-Amrani 2022</span>
        </footer>
    </body>
</html>