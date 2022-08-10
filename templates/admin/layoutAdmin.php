<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="icon" type="image/png" sizes="73x39" href="/imgs/img_site/logo.png">
        <link rel="stylesheet" href="/css/all.min.css">
        <link rel="stylesheet" href='/css/main.css'>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/all.min.js" defer></script>
        <script src="/js/toast.js" defer></script>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light navbar-expand-lg">
            <div class="container-fluid">
                <a href="<?=$router->url('admin_posts')?>" class="navbar-brand">
                <img src="/imgs/img_site/logo.png" alt="logo">
                    <span class="navbar-text">RentalCarsFes</span>
                </a>
                <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#main"
                aria-controls="main"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="main">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-uppercase" href="<?=$router->url('admin_rentalCarsInfo')?>">voitures louer</a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase" href="<?=$router->url('admin_posts')?>">voitures</a></li>
                        <li class="nav-item text-uppercase"><a class="nav-link" href="<?=$router->url('singout')?>" >déconnexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?= $content ?>

        <footer>
            <span>Copyright &copy; Oussama El-Amrani 2022</span>
        </footer>
    </body>
</html>