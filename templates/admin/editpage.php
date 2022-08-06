<h1>Edit</h1>
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
<form action="" method="POST" enctype="multipart/form-data" class="form">
    <?=$form->input('modele','modele',$car->getModele(), 'text');?>
    <?=$form->input('marque','marque',$car->getMarque(), 'text');?>
    <?=$form->input('daily_price','prix par jour',$car->getDaily_price(), 'text');?>
    <?=$form->input('available','available',$car->getAvailable(), 'number');?>
    <?//=$form->input('car_picture','photo',$car->getCar_picture(), 'text');?>
    <?=$form->input('car_picture','photo','', 'file');?>
    <button class="btn">Modifier</button>
</form>