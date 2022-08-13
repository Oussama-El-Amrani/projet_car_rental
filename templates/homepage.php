<?php $title = "RentelCarsFes"; ?>

<main class="container-fluid my-3 ">
    <section class="row g-4 mx-0 mx-md-5">
        <?php foreach($cars as $car):?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <img src="/imgs/cars_picture/<?=$car->getCar_picture()?>" alt="<?= $car->getModele()?>" class="card-img-top img-thumbnail">
                <div class="card-body">
                    <h1 class="h3 card-title text-capitalize"><?= $car->getMarque()?> <?= $car->getModele()?></h1>
                    <!-- <p class="card-text">modele</p> -->
                    <div class="d-flex justify-content-between mb-2">
                        <div><i class="fa-solid fa-gas-pump pe-2 mx-lg-2"></i> Diesel</div>
                        <div><i class="fa-solid fa-credit-card pe-2 mx-lg-2"></i><?= $car->getDaily_price()?>dh/jour</div>
                        <div><i class="fa-solid fa-gears"></i>Authomatique</div>
                        <div><i class="fa-solid fa-car-side pe-2 mx-lg-2"></i>2020</div>
                    </div>
                    <div><a href="<?=$router->url('reservation', ['id' => $car->getId()]) ?>" class="col-12 btn btn-primary text-uppercase" type="submit">Louer ce véhicule</a></div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </section>
</main>
