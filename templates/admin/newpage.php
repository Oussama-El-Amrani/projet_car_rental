<h1>Ajouter une voiture</h1>
<?php

use App\HTML\Form;

 if($success): ?>
    <div class="succes">
    Les nouveaux changements ont bien été appliqué
    </div>
<?php endif;?>
<?php
$form = new Form();
?> 
<form action="" method="POST" class="form" enctype="multipart/form-data">
    <?=$form->input('id','#id','', 'text');?>
    <?=$form->input('modele','modele','', 'text');?>
    <?=$form->input('marque','marque','', 'text');?>
    <?=$form->input('daily_price','prix par jour','', 'text');?>
    <?=$form->input('available','available','', 'number');?>
    <?=$form->input('car_picture','photo','', 'file');?>

    <button class="btn">Ajouter</button>
</form>