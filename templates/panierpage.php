<main class="container-fluid my-3">
    <section class="row">
        <section class="col-12  col-lg-8 mb-4">
            <article class="card">
                <div class="card-header">
                    <span>Panier</span>
                </div>
                <div class="card-body">
                    <?php //dd($cars)?>
                    <?php foreach($cars as $car):?>
                        <?php //dd($car)?>
                    <article>
                        <div class="row">
                            <figure class="col-12 col-md-3 ">
                                <img src="/imgs/cars_picture/<?=$car['car_picture']?>" alt="arbre" class="img-fluid img-thumbnail">
                            </figure>
                            <div class="col-12 col-md-6">
                                <span class="text-capitalize"><?=$car['marque']?> <?=$car['modele']?></span>
                                <div class="d-flex justify-content-between mb-2">
                                    <div><i class="fa-solid fa-gas-pump"></i> Diesel</div>
                                    <div><i class="fa-solid fa-credit-card"></i><?=$car['daily_price']?>dh/jour</div>
                                    <div><i class="fa-solid fa-credit-card"></i>Authomatique</div>
                                    <div><i class="fa-solid fa-car-side"></i>2020</div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <span>date de debut de rervation</span>
                                    <span><?=$car['check_in']?></span>
                                </div>
                                <div>
                                    <span>date de fin de reservation</span>
                                    <span><?=$car['check_out']?></span>
                                </div>
                                <span><?=$car['price']?></span>
                            </div>   
                        </div> 
                    </article>
                    <?php endforeach;?> 
                </div>
            </article>
        </section>
        <section class="col-12 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="h4 card-text text-uppercase">resumé du panier</h2>    
                </div>
                <div class="card-body">
                    <div class="d-flex  align-items-center justify-content-between mb-2">
                        <span>Total</span>
                        <?php //dd($CartRepository->getTotal())?>
                        <span class="fw-bold"><?=$CartRepository->getTotal()?>Dhs</span>
                    </div>
                    <small class="form-text">La livraison de votre véhicule est gratuit
                    <div><a href="<?=$router->url('paymentPayPal')?>"  class="col-12 btn btn-primary text-uppercase" type="submit">payer</a></div>
                </div>
            </div>
        </section>
    </section>
</main>