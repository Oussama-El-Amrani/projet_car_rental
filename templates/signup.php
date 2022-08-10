<?php //if(!$ok):?>
    <!-- <div class="bg-errors">
        Veuillez reeasayer
    </div> -->
<?php //endif;?>    
<main class="container-fluid my-3">
    <section class="row">
        <section class="col-12 d-none d-lg-block col-md-6 mb3">
            <img src="/imgs/img_site/singup.jpg" alt="" class="img-fluid">
        </section>
        <section class="col-12 col-lg-6">
            <form action="" method="POST" enctype="multipart/form-data">
                <h1 class="text-uppercase">Vous avez déja un compte ?</h1>
                <h3 class="h4 text-uppercase">Créer un compte</h3>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('first_name', 'Votre prénom', '', 'text')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('last_name', 'Votre nom de famille', '', 'text')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('email', 'Votre email', '', 'text')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('cin', 'Votre code cin', '', 'text')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('phone_num', 'Votre numéro de téléphone', '', 'number')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3">
                            <?=$form->input('user_picture', 'Votre photo de profile', '', 'file')?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3 form-floating">
                            <?=$form->input('city', "L'adresse de livraison de le voiture", '', 'text')?>
                            <small class="form-text">Vous pouvez la modifier à tout moment</small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('password', 'Mot de passe', '', 'password')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('passwordConf', 'Confirmer le mot de passe', '', 'password')?>
                        </div>
                    </div>
                    <div><button class="col-12 btn btn-primary text-uppercase" type="submit">créer un compte</button></div>
                </div>
            </form>
        </section>
    </section>
</main>