<?php $title = "rentelCarsFes"; ?>

<main class="container-fluid my-3 ">
    <section class="row g-4 mx-0 mx-md-5">
        <?php foreach($cars as $car):?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <img src="/imgs/cars_picture/<?=$car->getCar_picture()?>" alt="<?= $car->getModele()?>" class="card-img-top">
                    <div class="card-body">
                        <h1 class="h3 card-title"><?= $car->getMarque()?> <?= $car->getModele()?></h1>
                        <p class="card-text">modele</p>
                            <div class="d-flex justify-content-between mb-2">
                                <div><i class="fa-solid fa-gas-pump"></i> Diesel</div>
                                <div><i class="fa-solid fa-credit-card"></i><?= $car->getDaily_price()?>dh/jour</div>
                                <div><i class="fa-solid fa-credit-card"></i>Authomatique</div>
                                <div><i class="fa-solid fa-car-side"></i>2020</div>
                            </div>
                        <a href="<?=$router->url('reservation', ['id' => $car->getId()]) ?>" class="btn btn-primary text-uppercase px-5 py-3   lign-self-center">Louer ce véhicule</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </section>
</main>
