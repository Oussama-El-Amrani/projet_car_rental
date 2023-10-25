<?php $form = new App\HTML\Form();?>
<main class="container-fluid my-3">
    <section class="row">
        <section class="col-12 col-lg-8 mb-3">
            <div class="card">
                <div class="card-body">
                    <h1 class="h3 text-capitalize"><?= $car->getMarque()?> <?= $car->getModele()?></h1>
                    <img src="/imgs/cars_picture/<?= $car->getCar_picture()?>" alt="<?= $car->getModele()?>" class="img-fluid">
                </div>
            </div>
        </section>
        <section class="col-12 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h1 class="h4 card-title text-uppercase">caractéristiques du véhicule</h1>
                    <div class="d-flex justify-content-between mb-2">
                        <div><i class="fa-solid fa-gas-pump pe-2"></i> Diesel</div>
                        <div><i class="fa-solid fa-credit-card pe-2"></i><?= $car->getDaily_price()?>dh/jour</div>
                        <div><i class="fa-solid fa-gears"></i>Authomatique</div>
                        <div><i class="fa-solid fa-car-side pe-2"></i>2020</div>
                    </div>
                </div>
            </div> 
            <form action="<?=$router->url('add_to_cart', ['id' => $car->getId()])?>" method="GET">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="mb-3 form-floating">
                            <?=$form->input('check_in', 'Debut de reservation','','date')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="mb-3 form-floating">
                            <?=$form->input('check_out', 'Fin de Reservation','','date')?>
                        </div>
                    </div>
                    <div><button class="col-12 btn btn-primary text-uppercase" type="submit">réserver ce véhicule</button></div>
                </div>
            </form>
        </section>
    </section>
</main>