<?php if(isset($_GET['forbidden'])):?>
<div class="toast position-absolute end-0 bg-danger" data-bs-autohide="false" style="z-index: 10000;">
    <div class="toast-body text-white toast-body text-white d-flex justify-content-between">
        <span>Vous ne pouvez pas accéder a cette page</span> 
        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
</div>
<?php endif;?>

<?php foreach($errors as $error):?>
<div class="toast position-absolute end-0 bg-danger" data-bs-autohide="false" style="z-index: 10000;">
    <div class="toast-body text-white toast-body text-white d-flex justify-content-between">
        <span><?=$error;?></span> 
        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
</div>
<?php endforeach;?>

<main class="container-fluid my-3">
    <section class="row">
        <section class="col-12 d-none d-lg-block col-md-6 col-lg-8 mb3">
            <img src="imgs/img_site/bg-cars.webp" alt="" class="img-fluid">
        </section>
        <section class="col-12 col-lg-4">
            <form action="<?= $router->url('login') ?>" method='POST'>
                <h1 class="text-uppercase mt-5">Vous avez déja un compte ?</h1>
                <h3 class="h4 text-uppercase">Connexion</h3>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="mb-3 form-floating">
                            <?=$form->input('email', 'Votre email', '', 'email')?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="mb-3 form-floating">
                            <?=$form->input('password', 'Mot de passe', '', 'password')?>
                        </div>
                    </div>
                    <div><button class="col-12 btn btn-primary text-uppercase" type="submit">Connexion</button></div>
                </div>
            </form>
        </section>
    </section>            
</main>
