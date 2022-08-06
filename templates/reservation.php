<?php use App\HTML\Form;?>
<div class="reservation-car">
        <img src="/imgs/cars_picture/<?= $car->getCar_picture()?>" alt="<?= $car->getModele()?>">
        <div class="cars-marque"><?= $car->getMarque()?></div>
        <div class="car-modele"><?= $car->getModele()?></div>
        <div class="cars-price"><?= $car->getDaily_price()?> dh</div>
        <div class="availablite">
        <?php if($car->getAvailable()) :?>
            <span>available</span>
            <?php else :?>
                <span>not available</span>
            <?php endif;?>
        </div>
        <?php $form = new Form();?>
        <form action="<?=$router->url('add_to_cart', ['id' => $car->getId()])?>" method="GET">
                <?=$form->input('check_in', 'Debut de reservation','','date')?>
                <?=$form->input('check_out', 'Fin de Reservation','','date')?>
                <button>ajouter au panier</button>
        </form>
        <!-- <a href="<?//=$router->url('add_to_cart', ['id' => $car->getId()])?>">
            
        </a> -->
<div>
