<h1>Se connecter</h1>

<?php 
if(isset($_GET['forbidden'])):
?>
    <div class="errors">
        Vous ne pouvez pas accéder a cette page
    </div>
<?php endif;?>

<?php foreach($errors as $error):?>
    <div class='errors'>
        <?=$error;?>
    </div>
<?php endforeach;?>


<form action="<?= $router->url('login') ?>" method='POST'>
    <?=$form->input('email', 'Email', '', 'text')?>
    <?=$form->input('password', 'password', '', 'password')?>
    <button class="btn">Se connecter</button>
</form>
    
    <?php
        // dd($errors)
    ?>
