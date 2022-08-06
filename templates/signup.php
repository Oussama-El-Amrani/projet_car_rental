<?php //if(!$ok):?>
    <div class="errors">
        Veuillez reeasayer
    </div>
<?php //endif;?>    
<h1>Inscription</h1>

<form action="" method="POST" enctype="multipart/form-data">
    <?=$form->input('last_name', 'Nom', '', 'text')?>
    <?=$form->input('first_name', 'Prenom', '', 'text')?>
    <?=$form->input('email', 'Email', '', 'text')?>
    <?=$form->input('phone_num', 'numéro de telephone', '', 'text')?>
    <?=$form->input('city', 'Ville', '', 'text')?>
    <?=$form->input('cin', 'cin', '', 'text')?>
    <?=$form->input('password', 'mot de passe', '', 'password')?>
    <?=$form->input('user_picture', 'photo de profile', '', 'file')?>
    <button class="btn">S'inscrire</button>
</form>